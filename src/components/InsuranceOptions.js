import React, { useState, useEffect } from 'react';
import axios from 'axios';

function InsuranceOptions() {
    const [insuranceOptions, setInsuranceOptions] = useState([]);

    useEffect(() => {
        axios.get('/api/insurance/all')
            .then(response => {
                setInsuranceOptions(response.data);
            })
            .catch(err => console.error(err));
    }, []);

    return (
        <div>
            <h2>Wedding Insurance Options</h2>
            <ul>
                {insuranceOptions.map(insurance => (
                    <li key={insurance._id}>
                        <h3>{insurance.type}</h3>
                        <p>Coverage: {insurance.coverage}</p>
                        <p>Price: ${insurance.price}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default InsuranceOptions;
