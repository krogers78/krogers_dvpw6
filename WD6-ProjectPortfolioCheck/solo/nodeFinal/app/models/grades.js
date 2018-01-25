const mongoose = require('mongoose');

const gradesSchema = mongoose.Schema({
  studentname: {type: String, required: true},
  studentpercent: {type: String, required: true},
  studentlettergrade: {type: String, required: true}
});

module.exports = mongoose.model('Grades', gradesSchema);