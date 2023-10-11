const mongoose = require('mongoose');

const venueSchema = new mongoose.Schema({
    name: String,
    description: String,
    location: String,
    price: Number,
    imageUrl: String, // path to the venue's image
});

module.exports = mongoose.model('Venue', venueSchema);
