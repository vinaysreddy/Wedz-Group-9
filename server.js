const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

// Middleware to serve static files
app.use(express.static(__dirname));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Endpoint to serve the HTML file
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

// Handle user profile submission
app.post('/backend-api/profile', (req, res) => {
    // Here you can handle the data and save it to a database
    // For this example, we'll just return a success message
    res.send("User profile data received successfully!");
});

// ... similar endpoints for other form actions ...

app.post('/backend-api/invitations', (req, res) => {
    res.send("Invitation data received successfully!");
});

app.post('/backend-api/food-menu', (req, res) => {
    res.send("Food menu data received successfully!");
});

app.post('/backend-api/budget', (req, res) => {
    res.send("Budget data received successfully!");
});

app.post('/backend-api/theme', (req, res) => {
    res.send("Theme data received successfully!");
});

app.post('/backend-api/feedback', (req, res) => {
    res.send("Feedback received successfully!");
});

app.post('/backend-api/venue-search', (req, res) => {
    res.send("Venue search data received successfully!");
});

app.post('/backend-api/insurance-options', (req, res) => {
    res.send("Insurance option data received successfully!");
});

app.post('/backend-api/payment', (req, res) => {
    res.send("Payment data received successfully!");
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
