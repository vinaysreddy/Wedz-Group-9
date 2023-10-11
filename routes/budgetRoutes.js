const router = require('express').Router();
const budgetController = require('../controllers/budgetController');

router.route('/create').post(budgetController.createBudget);
// ... other routes like GET for retrieving budget, PUT for updates

module.exports = router;
