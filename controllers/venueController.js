const Venue = require('../models/venue');

exports.getAllVenues = (req, res) => {
    Venue.find()
        .then(venues => res.json(venues))
        .catch(err => res.status(400).json('Error: ' + err));
}
