const mongoose = require('mongoose');

// mongodb://username:password@hostname:port/database
mongoose.connect(`mongodb://${process.env.MONGO_HOST}/${process.env.MONGO_DATABASE}`);

let db = mongoose.connection;
db.on('error', err => {
  console.error(err);
});
db.once('open', () => {
  console.log('DATABASE CONNECTION');
})

mongoose.Promise = global.Promise;

module.exports = db;