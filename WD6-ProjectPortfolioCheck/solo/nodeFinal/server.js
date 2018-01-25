let NODE_ENV = process.env.NODE_ENV || 'development';

if (NODE_ENV === 'development') {
  require('dotenv').load();
}
console.log(`NODE_ENV ${NODE_ENV}`);

const express = require('express');
const path = require('path')
const app = express();
// Set the view engine
app.set('views', path.join(__dirname, 'app/views'));
app.set('view engine', 'pug');
const port = 3000;

app.listen(port, () => {
  console.log(`Server running on port: ${port}`);
})

require('./app/app')(app);