<?php
session_start();
include('db.php'); // Include your database connection file

// Check if the order ID is set in the session or URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
} else {
    // If no order ID is found, redirect to homepage
    header("Location: home.php");
    exit;
}

// Query to fetch order details from the database
$query = "SELECT * FROM orders WHERE order_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Query to fetch order items associated with this order
$query_items = "SELECT * FROM order_items WHERE order_id = ?";
$stmt_items = $pdo->prepare($query_items);
$stmt_items->execute([$order_id]);
$order_items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="confirmation-container">
        <h1>Thank you for your order, <?php echo htmlspecialchars($order['customer_name']); ?>!</h1>
        
        <p>Your order ID is <strong>#<?php echo $order['order_id']; ?></strong>.</p>
        
        <h3>Order Summary</h3>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php
            $total = 0;
            foreach ($order_items as $item) {
                $total += $item['price'] * $item['quantity'];
                echo "<tr>";
                echo "<td>" . htmlspecialchars($item['product_name']) . "</td>";
                echo "<td>" . htmlspecialchars($item['quantity']) . "</td>";
                echo "<td>" . number_format($item['price'], 2) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <p><strong>Total Amount:</strong> RM <?php echo number_format($total, 2); ?></p>
        
        <h3>Shipping Details</h3>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($order['shipping_address']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
        
        <p>We will send a confirmation email to <?php echo htmlspecialchars($order['email']); ?>.</p>
        
        <p>Thank you for shopping with us!</p>
    </div>
</body>
</html>
