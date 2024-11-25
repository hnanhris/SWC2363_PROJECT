<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $productId = $_POST['id']; // Get the product ID from the form

    // Check if the product exists in the cart
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // Remove the product from the cart
    }

    // Redirect back to the cart page
    header("Location: cart.php");
    exit;
}
?>
