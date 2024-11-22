<?php
session_start();
include 'db.php';

if (!isset($_SESSION['farmer_id'])) {
    header("Location: login_farmer.php");
    exit();
}

$farmer_id = $_SESSION['farmer_id'];

// Handle product addition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO products (farmer_id, name, price, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isdi", $farmer_id, $name, $price, $quantity);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch farmer's products
$result = $conn->query("SELECT * FROM products WHERE farmer_id = $farmer_id");
?>

<h3>Farmer Dashboard</h3>
<h4>Add Product</h4>
<form method="POST">
    Name: <input type="text" name="name" required><br>
    Price: <input type="number" name="price" step="0.01" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    <button type="submit">Add Product</button>
</form>

<h4>Your Products</h4>
<table border="1">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php while ($product = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['quantity']; ?></td>
        </tr>
    <?php } ?>
</table>
