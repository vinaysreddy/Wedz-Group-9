const router = require('express').Router();
const insuranceController = require('../controllers/insuranceController');

router.route('/all').get(insuranceController.getAllInsuranceOptions);

module.exports = router;
