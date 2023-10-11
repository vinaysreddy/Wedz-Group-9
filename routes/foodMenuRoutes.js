const router = require('express').Router();
const foodMenuController = require('../controllers/foodMenuController');

router.route('/create').post(foodMenuController.createMenu);
// ... other routes like GET for retrieving menus, PUT for updates

module.exports = router;
