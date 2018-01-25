const express = require('express');
const router = express.Router();

const Product = require('../models/product');
const Cart = require('../models/cart');
const Order = require('../models/order');
const User = require('../models/user');

/* GET home page. */
router.get('/', function(req, res, next) {
  let successMsg = req.flash('success')[0];
  Product.find((err, docs) => {
    let productChunks = [];
    let chunksSize = 3;
    for (let i = 0; i < docs.length; i += chunksSize) {
      productChunks.push(docs.slice(i, i+chunksSize));
    }
    res.render('shop/index', { title: 'WD6-International', products: productChunks, successMsg: successMsg, noMessages: !successMsg });
  });
});

router.get('/add-to-cart/:id', (req, res, next) => {
  let productId = req.params.id;
  let cart; 
  
  if (req.user) {
    cart = new Cart(req.user.cart ? req.user.cart : {});
  } else {
    cart = new Cart(req.session.cart ? req.session.cart : {});
  }

  Product.findById(productId, (err, product) => {
    if (err) {
      return res.redirect('/');
    }
    cart.add(product, product.id);
    req.session.cart = cart;
    if (req.user) {
      req.user.cart = cart;
      User.findByIdAndUpdate(req.user._id, req.user, err => {
        if (err) throw err;
      });
    }
    res.redirect('/');
  });
});

router.get('/shopping-cart', (req, res, next) => {
  if (req.user) {
    if (!req.user.cart) {
      console.log('this should not fire')
      return res.render('shop/shopping-cart', { title: 'Cart', products: null });      
    }
  }
  else if (!req.user) {
    if(!req.session.cart) {
      return res.render('shop/shopping-cart', {title: 'Cart', products:null});
    } 
  } 
  
  let cart = {}
  if (req.user) {
    cart = new Cart(req.user.cart);    
  } else {
    cart = new Cart(req.session.cart);
  }
  res.render('shop/shopping-cart', {title: 'Cart', products: cart.generateArray(), totalPrice: cart.totalPrice});
});

router.get('/checkout', isLoggedIn, (req, res, next) => {
  let cart = {}
  if (req.user) {
    if (!req.user.cart) {
      console.log('this should not fire')
      return res.render('shop/shopping-cart', { title: 'Cart', products: null });
    }

    cart = new Cart(req.user.cart)

  }
  else if (!req.user) {
    if (!req.session.cart) {
      return res.render('shop/shopping-cart', { title: 'Cart', products: null });
    }
    cart = new Cart(req.session.cart);
  } 
  let errMsg = req.flash('error')[0];

  res.render('shop/checkout', {title: 'Checkout', total: cart.totalPrice, errMsg: errMsg, noErrors: !errMsg});
});

router.post('/checkout', isLoggedIn, (req, res, next) => {
  let cart = {}
  if (req.user) {
    if (!req.user.cart) {
      console.log('this should not fire')
      return res.render('shop/shopping-cart', { title: 'Cart', products: null });
    }
    cart = new Cart(req.user.cart)
  }
  else if (!req.user) {
    if (!req.session.cart) {
      return res.render('shop/shopping-cart', { title: 'Cart', products: null });
    }
    cart = new Cart(req.session.cart);
  } 

  var stripe = require("stripe")(
    "sk_test_hrVmI2rAz4b5buom4u8QZVxz"
  );

  stripe.charges.create({
    amount: cart.totalPrice * 100,
    currency: "usd",
    source: req.body.stripeToken, // obtained with Stripe.js
    description: "Test Charge"
  }, function (err, charge) {
    if (err) {
      req.flash('error', err.message);
      return res.redirect('/checkout');
    }
    let newOrder = new Order({
      user: req.user,
      cart: cart,
      address: req.body.address,
      name: req.body.name,
      paymentId: charge.id
    });
    newOrder.save((err, result) => {
      req.flash('success', 'Successfully bought product!');
      req.session.cart = null;

      User.findById(req.user._id, (err, user) => {
        if (err) throw err;
        user.cart = null;
        user.save((err, u) => {
          if (err) throw err;
        })
      })

      res.redirect('/');
    });
  });
});

module.exports = router;

function isLoggedIn(req, res, next) {
  if (req.isAuthenticated()) {
    return next();
  }
  req.session.oldUrl = req.url;
  res.redirect('/user/signin');
}