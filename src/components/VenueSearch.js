import React, { useState, useEffect } from 'react';
import axios from 'axios';

function VenueSearch() {
    const [venues, setVenues] = useState([]);

    useEffect(() => {
        axios.get('/api/venues/all')
            .then(response => {
                setVenues(response.data);
            })
            .catch(err => console.error(err));
    }, []);

    return (
        <div>
            <h2>Search and Compare Wedding Venues</h2>
            <ul>
                {venues.map(venue => (
                    <li key={venue._id}>
                        <h3>{venue.name}</h3>
                        <p>Location: {venue.location}</p>
                        <p>Description: {venue.description}</p>
                        <p>Price: ${venue.price}</p>
                        <img src={venue.imageUrl} alt={venue.name} />
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default VenueSearch;
