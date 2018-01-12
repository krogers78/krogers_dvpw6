const express = require('express');
const router = express.Router();

const Product = require('../models/product');
/* GET home page. */
router.get('/', function(req, res, next) {
  Product.find((err, docs) => {
    let productChunks = [];
    let chunksSize = 3;
    for (let i = 0; i < docs.length; i += chunksSize) {
      productChunks.push(docs.slice(i, i+chunksSize));
    }
    res.render('shop/index', { title: 'WD6-International', products: productChunks });
  });
});



module.exports = router;