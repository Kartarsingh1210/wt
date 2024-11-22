<?php
include 'db.php';

// Fetch products
$result = $conn->query("SELECT * FROM products WHERE quantity > 0");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $buyer_name = $_POST['buyer_name'];
    $buyer_contact = $_POST['buyer_contact'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (product_id, buyer_name, buyer_contact, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $product_id, $buyer_name, $buyer_contact, $quantity);

    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<h3>Shop Products</h3>
<table border="1">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Available Quantity</th>
        <th>Order</th>
    </tr>
    <?php while ($product = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['quantity']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    Name: <input type="text" name="buyer_name" required><br>
                    Contact: <input type="text" name="buyer_contact" required><br>
                    Quantity: <input type="number" name="quantity" max="<?php echo $product['quantity']; ?>" required><br>
                    <button type="submit">Order</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
