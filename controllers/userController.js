const User = require('../models/user');

exports.getUserProfile = (req, res) => {
    const userId = req.params.id;
    User.findById(userId)
        .then(user => res.json(user))
        .catch(err => res.status(400).json('Error: ' + err));
}

// ... other controller methods like createUserProfile, updateUserProfile
