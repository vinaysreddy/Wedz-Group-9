import React, { useState } from 'react';
import axios from 'axios';

function FoodMenu() {
    const [starters, setStarters] = useState([]);
    const [mainCourse, setMainCourse] = useState([]);
    const [desserts, setDesserts] = useState([]);
    const [beverages, setBeverages] = useState([]);

    const handleSaveMenu = () => {
        axios.post('/api/menu/create', { starters, mainCourse, desserts, beverages })
            .then(() => alert('Menu saved!'))
            .catch(err => console.error(err));
    }

    return (
        <div>
            {/* You'd likely have some form elements here to build the menu,
                 like multi-select dropdowns or input fields for each category */}
            <button onClick={handleSaveMenu}>Save Menu</button>
        </div>
    );
}

export default FoodMenu;
