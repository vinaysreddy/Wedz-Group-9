const router = require('express').Router();
const feedbackController = require('../controllers/feedbackController');

router.route('/create').post(feedbackController.createFeedback);
router.route('/all').get(feedbackController.getAllFeedback);

module.exports = router;
