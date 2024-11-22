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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter - Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .converter-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
        .error {
            color: red;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="converter-container">
        <h2>Currency Converter</h2>
        <?php
        // Display the result
        echo $result;
        ?>
        <br>
        <a href="index.html"><button>Convert Again</button></a>
    </div>
</body>
</html>
