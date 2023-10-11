const Budget = require('../models/budget');

exports.createBudget = (req, res) => {
    const newBudget = new Budget({
        user: req.user._id,
        totalBudget: req.body.totalBudget,
        spentAmount: 0,
        categories: req.body.categories
    });
    newBudget.save()
        .then(() => res.json('Budget saved!'))
        .catch(err => res.status(400).json('Error: ' + err));
}

// ... other controller methods like updateBudget, getBudget
