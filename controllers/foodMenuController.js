const FoodMenu = require('../models/foodMenu');

exports.createMenu = (req, res) => {
    const newMenu = new FoodMenu({
        user: req.user._id,
        starters: req.body.starters,
        mainCourse: req.body.mainCourse,
        desserts: req.body.desserts,
        beverages: req.body.beverages,
    });
    newMenu.save()
        .then(() => res.json('Menu saved!'))
        .catch(err => res.status(400).json('Error: ' + err));
}

// ... other controller methods like getMenus, updateMenu
