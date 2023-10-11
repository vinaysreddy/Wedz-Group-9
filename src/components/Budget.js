import React, { useState } from 'react';
import axios from 'axios';

function Budget() {
    const [totalBudget, setTotalBudget] = useState(0);
    const [categories, setCategories] = useState([]);

    const handleSaveBudget = () => {
        axios.post('/api/budget/create', { totalBudget, categories })
            .then(() => alert('Budget saved!'))
            .catch(err => console.error(err));
    }

    return (
        <div>
            <input 
                type="number"
                value={totalBudget}
                onChange={(e) => setTotalBudget(e.target.value)}
                placeholder="Total Budget"
            />
            {/* Dynamic form elements for budget categories can be added here */}
            <button onClick={handleSaveBudget}>Save Budget</button>
        </div>
    );
}

export default Budget;
