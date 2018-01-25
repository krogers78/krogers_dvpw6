const glob = require('glob');
const bodyParser = require('body-parser');
const db = require('./db');
const validator = require('express-validator');

module.exports = app => {
  app.use(bodyParser.json());
  app.use(bodyParser.urlencoded({ extended: true }));
  app.use(validator());

  // require all the models
  const modelFileNames = glob.sync(`${__dirname}/models/*.js`);
  modelFileNames.forEach(modelFileName => {
    require(modelFileName);
  })

  // require all the controllers
  const controllerFileNames = glob.sync(`${__dirname}/controllers/*.js`);
  controllerFileNames.forEach(controllerFileName => {
    require(controllerFileName)(app);
  })
}