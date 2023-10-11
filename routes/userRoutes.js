const router = require('express').Router();
const userController = require('../controllers/userController');

router.route('/:id').get(userController.getUserProfile);
// ... other routes like POST for creating, PUT for updating

module.exports = router;
