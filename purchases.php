<?php
session_start();
include 'db.php'; // Include DB connection file

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Get user data from session
$username = $_SESSION['username'];
$payment_method = $_POST['payment_method']; // e.g., 'Credit Card', 'PayPal'

// Loop through products in the shopping cart (assuming a session variable holds the cart items)
foreach ($_SESSION['cart'] as $product) {
    $product_id = $product['id'];
    $product_name = $product['name'];
    $quantity = $product['quantity'];
    $total_price = $product['price'] * $quantity;

    try {
        // Insert purchase data into the 'purchases' table
        $query = "INSERT INTO purchases (username, product_id, product_name, quantity, total_price, payment_method) 
                  VALUES (:username, :product_id, :product_name, :quantity, :total_price, :payment_method)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'username' => $username,
            'product_id' => $product_id,
            'product_name' => $product_name,
            'quantity' => $quantity,
            'total_price' => $total_price,
            'payment_method' => $payment_method
        ]);
    } catch (Exception $e) {
        // Handle error
        echo "Error saving purchase data: " . $e->getMessage();
    }
}

// After successful purchase, show receipt
echo "Thank you for your purchase, $username! Your receipt is displayed below.";
?>
