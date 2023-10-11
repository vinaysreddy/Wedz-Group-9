import React, { useState, useEffect } from 'react';
import axios from 'axios';

function ThemeSelection() {
    const [themes, setThemes] = useState([]);

    useEffect(() => {
        axios.get('/api/themes')
            .then(response => {
                setThemes(response.data);
            })
            .catch(err => console.error(err));
    }, []);

    return (
        <div>
            <h2>Select Your Wedding Theme</h2>
            <div className="themes-list">
                {themes.map(theme => (
                    <div key={theme._id} className="theme-card">
                        <img src={theme.imageUrl} alt={theme.name} />
                        <h3>{theme.name}</h3>
                        <p>{theme.description}</p>
                        <button>Select this theme</button>
                    </div>
                ))}
            </div>
        </div>
    );
}

export default ThemeSelection;
