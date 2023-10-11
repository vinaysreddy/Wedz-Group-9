const Invitation = require('../models/invitation');

exports.sendInvitation = (req, res) => {
    const newInvitation = new Invitation({
        sender: req.user._id,
        recipientEmail: req.body.recipientEmail,
        invitationMessage: req.body.invitationMessage,
    });
    newInvitation.save()
        .then(() => res.json('Invitation sent!'))
        .catch(err => res.status(400).json('Error: ' + err));
}

// ... other controller methods like getInvitations, getRSVPs
