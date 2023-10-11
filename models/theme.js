const mongoose = require('mongoose');

const themeSchema = new mongoose.Schema({
    name: String,
    description: String,
    imageUrl: String, // path to the theme's main image or thumbnail
});

module.exports = mongoose.model('Theme', themeSchema);
