const router = require('express').Router();
const weddingDateController = require('../controllers/weddingDateController');

router.route('/set').post(weddingDateController.setDate);
// ... other routes to GET the date, PUT for updates

module.exports = router;
