const Feedback = require('../models/feedback');

exports.createFeedback = (req, res) => {
    const newFeedback = new Feedback({
        user: req.user._id,
        type: req.body.type,
        content: req.body.content
    });
    newFeedback.save()
        .then(() => res.json('Feedback saved!'))
        .catch(err => res.status(400).json('Error: ' + err));
}

exports.getAllFeedback = (req, res) => {
    Feedback.find()
        .then(feedback => res.json(feedback))
        .catch(err => res.status(400).json('Error: ' + err));
}
