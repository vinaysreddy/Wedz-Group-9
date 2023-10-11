import React, { useState, useEffect } from 'react';
import axios from 'axios';

function UserProfile(props) {
    const [user, setUser] = useState({});

    useEffect(() => {
        const fetchUser = async () => {
            try {
                const response = await axios.get(`/api/user/${props.userId}`);
                setUser(response.data);
            } catch (error) {
                console.error("Error fetching user data: ", error);
            }
        };

        fetchUser();
    }, [props.userId]);

    return (
        <div>
            <h1>{user.username}'s Profile</h1>
            <p>Email: {user.email}</p>
            {/* Render other user details here */}
        </div>
    );
}

export default UserProfile;
