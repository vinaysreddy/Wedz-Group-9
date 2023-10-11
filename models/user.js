const mongoose = require('mongoose');

const userSchema = new mongoose.Schema({
    username: { type: String, required: true, unique: true },
    password: { type: String, required: true },
    email: { type: String, required: true, unique: true },
    weddingDate: Date,
    preferences: Object
    // ... other user profile fields
});

module.exports = mongoose.model('User', userSchema);
