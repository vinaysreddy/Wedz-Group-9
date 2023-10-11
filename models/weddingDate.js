const mongoose = require('mongoose');

const weddingDateSchema = new mongoose.Schema({
    user: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
    date: Date,
    milestones: [{
        name: String,
        date: Date,
        completed: { type: Boolean, default: false }
    }],
});

module.exports = mongoose.model('WeddingDate', weddingDateSchema);
