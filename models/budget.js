const mongoose = require('mongoose');

const budgetSchema = new mongoose.Schema({
    user: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
    totalBudget: Number,
    spentAmount: Number,
    categories: [{
        name: String,
        allocatedAmount: Number,
        spentAmount: Number
    }],
});

module.exports = mongoose.model('Budget', budgetSchema);
