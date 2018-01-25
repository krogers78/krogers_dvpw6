const express = require('express');
const router = express.Router();
const mongoose = require('mongoose');
// Define the model with mongoose
const Grades = mongoose.model('Grades');

module.exports = app => {
  app.use('/', router);
}
// Home route to load everything
router.get('/', (req, res, next) => {
  // Find all the grades from the database
  Grades.find({}, (err, grades) => {
    if (err) throw err;
    res.render('index', {grades: grades});
  });
});
// Saving a new grade
router.post('/newgrade', (req, res, next) => {
  // Validate the inputs on submit
  req.checkBody('spercent', 'Grade percent cannot be empty').notEmpty();
  req.checkBody('spercent', 'Grade percent is not valid').isFloat().not();
  req.checkBody('sname', 'Name cannot be empty').notEmpty();
  // save the errors to a variable
  const errors = req.validationErrors();

  if (errors) {
    // To save the names of the lists
    Grades.find({}, (err, grades) => {
      if (err) throw err;
      // render the form with errors
      res.render('index', { errors: errors, text: req.body, grades: grades });
    })
  } else {
    let letterG;
    if (req.body.spercent >= 90) {
      letterG = 'A';
    } else if (req.body.spercent >= 80) {
      letterG = 'B';
    } else if (req.body.spercent >= 70) {
      letterG = 'C';
    } else if (req.body.spercent >= 60) {
      letterG = 'D';
    } else {
      letterG = 'F';
    }
    let newGrade = new Grades({
      studentname: req.body.sname,
      studentpercent: req.body.spercent,
      studentlettergrade: letterG
    });
    newGrade.save(err => {
      if (err) throw err;
      res.redirect('/');
    })
  }

});
// Deleting a grade
router.get('/delete-grade/:id', (req, res, next) => {
  Grades.findByIdAndRemove(req.params.id, err => {
    if (err) throw err;
    res.redirect('/');
  });
});
router.get('/edit-form/:id', (req, res, next) => {
  Grades.findById(req.params.id, (err, grade) => {
    if (err) throw err;
    res.render('editForm', { grade: grade });
  });
});
// Save the edited grade
router.post('/edit-grade', (req, res, next) => {
  const responseBody = req.body;
  if (responseBody.studentpercent >= 90) {
    responseBody.studentlettergrade = 'A';
  } else if (responseBody.studentpercent >= 80) {
    responseBody.studentlettergrade = 'B';
  } else if (responseBody.studentpercent >= 70) {
    responseBody.studentlettergrade = 'C';
  } else if (responseBody.studentpercent >= 60) {
    responseBody.studentlettergrade = 'D';
  } else {
    responseBody.studentlettergrade = 'F';
  }
  Grades.findByIdAndUpdate(req.body.sid, responseBody, err => {
    if (err) throw err;
    res.redirect('/');
  });
});