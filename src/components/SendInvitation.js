import React, { useState } from 'react';
import axios from 'axios';

function SendInvitation() {
    const [recipientEmail, setRecipientEmail] = useState('');
    const [invitationMessage, setInvitationMessage] = useState('');

    const handleSend = () => {
        axios.post('/api/invitations/send', { recipientEmail, invitationMessage })
            .then(() => alert('Invitation sent!'))
            .catch(err => console.error(err));
    }

    return (
        <div>
            <input
                value={recipientEmail}
                onChange={(e) => setRecipientEmail(e.target.value)}
                placeholder="Recipient's Email"
            />
            <textarea
                value={invitationMessage}
                onChange={(e) => setInvitationMessage(e.target.value)}
                placeholder="Your Message"
            />
            <button onClick={handleSend}>Send Invitation</button>
        </div>
    );
}

export default SendInvitation;
