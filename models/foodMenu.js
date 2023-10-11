const mongoose = require('mongoose');

const foodMenuSchema = new mongoose.Schema({
    user: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
    starters: [String],
    mainCourse: [String],
    desserts: [String],
    beverages: [String],
    // ... other menu categories
});

module.exports = mongoose.model('FoodMenu', foodMenuSchema);
