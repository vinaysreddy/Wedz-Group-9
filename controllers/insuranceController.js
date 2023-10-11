const Insurance = require('../models/insurance');

exports.getAllInsuranceOptions = (req, res) => {
    Insurance.find()
        .then(insuranceOptions => res.json(insuranceOptions))
        .catch(err => res.status(400).json('Error: ' + err));
}
