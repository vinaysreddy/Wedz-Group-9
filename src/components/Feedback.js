import React, { useState, useEffect } from 'react';
import axios from 'axios';

function Feedback() {
    const [feedbacks, setFeedbacks] = useState([]);
    const [feedbackContent, setFeedbackContent] = useState('');
    const [feedbackType, setFeedbackType] = useState('guest');

    useEffect(() => {
        axios.get('/api/feedback/all')
            .then(response => {
                setFeedbacks(response.data);
            })
            .catch(err => console.error(err));
    }, []);

    const handleSaveFeedback = () => {
        axios.post('/api/feedback/create', { type: feedbackType, content: feedbackContent })
            .then(() => {
                alert('Feedback saved!');
                setFeedbackContent('');
                setFeedbackType('guest');
            })
            .catch(err => console.error(err));
    }

    return (
        <div>
            <h2>Feedback</h2>
            <div>
                <label>Type:</label>
                <select value={feedbackType} onChange={(e) => setFeedbackType(e.target.value)}>
                    <option value="guest">Guest</option>
                    <option value="vendor">Vendor</option>
                </select>
            </div>
            <textarea
                value={feedbackContent}
                onChange={(e) => setFeedbackContent(e.target.value)}
                placeholder="Enter your feedback here"
            />
            <button onClick={handleSaveFeedback}>Submit Feedback</button>

            <h3>All Feedback</h3>
            <ul>
                {feedbacks.map((feedback, index) => (
                    <li key={index}>{feedback.content} ({feedback.type})</li>
                ))}
            </ul>
        </div>
    );
}

export default Feedback;
