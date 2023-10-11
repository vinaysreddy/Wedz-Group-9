const mongoose = require('mongoose');

const feedbackSchema = new mongoose.Schema({
    user: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
    type: String, // 'guest' or 'vendor'
    content: String,
    date: { type: Date, default: Date.now },
});

module.exports = mongoose.model('Feedback', feedbackSchema);
