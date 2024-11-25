<?php
session_start(); // Start the session

include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];

    try {
        // Fetch product details from the database
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            // Initialize cart if not set
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Check if product is already in the cart
            if (isset($_SESSION['cart'][$productId])) {
                // Increment the quantity
                $_SESSION['cart'][$productId]['quantity'] += 1;
            } else {
                // Add product to the cart
                $_SESSION['cart'][$productId] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => 1,
                ];
            }
        } else {
            echo "Product not found.";
        }
    } catch (Exception $e) {
        die("Error adding product to cart: " . $e->getMessage());
    }
}

// Redirect back to the shop page
header("Location: shop.php");
exit;
