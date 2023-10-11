const router = require('express').Router();
const venueController = require('../controllers/venueController');

router.route('/all').get(venueController.getAllVenues);

module.exports = router;
