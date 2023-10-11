const router = require('express').Router();
const invitationController = require('../controllers/invitationController');

router.route('/send').post(invitationController.sendInvitation);
// ... other routes like GET for retrieving invitations

module.exports = router;
