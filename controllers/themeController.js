const Theme = require('../models/theme');

exports.getAllThemes = (req, res) => {
    Theme.find()
        .then(themes => res.json(themes))
        .catch(err => res.status(400).json('Error: ' + err));
}
