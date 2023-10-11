const WeddingDate = require('../models/weddingDate');

exports.setDate = (req, res) => {
    const newDate = new WeddingDate({
        user: req.user._id,
        date: req.body.date,
        milestones: req.body.milestones
    });
    newDate.save()
        .then(() => res.json('Date and milestones saved!'))
        .catch(err => res.status(400).json('Error: ' + err));
}

// ... other controller methods to get the date, update milestones, etc.
