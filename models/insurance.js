const mongoose = require('mongoose');

const insuranceSchema = new mongoose.Schema({
    type: String, // Type of insurance, e.g., "Basic," "Premium," etc.
    coverage: String, // Details of coverage
    price: Number, // Price of the insurance
});

module.exports = mongoose.model('Insurance', insuranceSchema);
