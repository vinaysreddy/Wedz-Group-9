import React, { useState, useEffect } from 'react';
import axios from 'axios';

function WeddingTimer() {
    const [weddingDate, setWeddingDate] = useState(null);
    const [daysLeft, setDaysLeft] = useState(0);

    useEffect(() => {
        axios.get('/api/weddingDate')
            .then(response => {
                setWeddingDate(new Date(response.data.date));
            })
            .catch(err => console.error(err));
    }, []);

    useEffect(() => {
        if (weddingDate) {
            const interval = setInterval(() => {
                const now = new Date();
                const timeDiff = weddingDate - now;
                setDaysLeft(Math.ceil(timeDiff / (1000 * 60 * 60 * 24)));
            }, 1000);
            
            return () => clearInterval(interval);
        }
    }, [weddingDate]);

    return (
        <div>
            <h2>{daysLeft} days until your wedding!</h2>
            {/* Additional functionality to display milestones can be added here */}
        </div>
    );
}

export default WeddingTimer;
