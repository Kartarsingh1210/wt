<?php
// Hardcoded exchange rate: 1 USD = 82.50 INR
$exchangeRate = 82.50;

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];

    // Validate if input is numeric
    if (is_numeric($amount)) {
        $convertedAmount = $amount * $exchangeRate;
        $result = "<div class='result'>Converted Amount: ₹" . number_format($convertedAmount, 2) . "</div>";
    } else {
        $result = "<div class='result error'>Error: Please enter a valid number.</div>";
    }
} else {
    $result = "<div class='result error'>Error: Invalid request.</div>";
}
?>
