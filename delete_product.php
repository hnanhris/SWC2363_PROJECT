<?php
include 'db.php'; // Include DB connection file

// Check if product_id is provided in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    try {
        // Prepare and execute the DELETE query
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $product_id]);

        // Redirect back to the admin dashboard if successful
        header('Location: admin_dashboard.php');
        exit();
    } catch (Exception $e) {
        // Handle and display error
        echo "Error deleting product: " . $e->getMessage();
    }
} else {
    // Display message if product_id is missing
    echo "Invalid product ID. Please try again.";
}
