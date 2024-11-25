<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $order_id = uniqid(); // Generate a unique order ID

    // Insert order details into the database
    $conn->query("INSERT INTO orders (id, name, address, phone) VALUES ('$order_id', '$name', '$address', '$phone')");

    // Insert each cart item into the order_items table
    foreach ($_SESSION['cart'] as $id => $item) {
        $product_id = $id;
        $quantity = $item['quantity'];
        $price = $item['price'];
        $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')");
    }

    // Clear the cart
    unset($_SESSION['cart']);

    // Redirect to a confirmation page
    header("Location: confirmation.php");
    exit;
}
?>
