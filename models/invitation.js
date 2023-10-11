const mongoose = require('mongoose');

const invitationSchema = new mongoose.Schema({
    sender: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
    recipientEmail: String,
    invitationMessage: String,
    RSVP: Boolean,
    // ... other invitation details
});

module.exports = mongoose.model('Invitation', invitationSchema);
