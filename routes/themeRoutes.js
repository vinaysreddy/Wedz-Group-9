const router = require('express').Router();
const themeController = require('../controllers/themeController');

router.route('/').get(themeController.getAllThemes);

module.exports = router;
