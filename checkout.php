<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Checkout - Hijab Store</title>
</head>

<body>
    <?php include 'header.php'; ?>

    
    <?php
session_start();

// Check if cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Get total price from cart
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Get payment method from the form submission
    if (isset($_POST['payment_method'])) {
        $payment_method = $_POST['payment_method'];
    } else {
        // Redirect back to cart if no payment method was selected
        header("Location: cart.php");
        exit;
    }

    // Display receipt
    echo "<h1>Receipt</h1>";
    echo "<p><strong>Products Purchased:</strong></p>";
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>";
    
    foreach ($_SESSION['cart'] as $item) {
        echo "
        <tr>
            <td>{$item['name']}</td>
            <td>{$item['quantity']}</td>
            <td>RM{$item['price']}</td>
            <td>RM" . ($item['price'] * $item['quantity']) . "</td>
        </tr>";
    }
    
    echo "</tbody>
          </table>";

    // Display total and payment method
    echo "<p><strong>Total:</strong> RM$total</p>";
    echo "<p><strong>Payment Method:</strong> $payment_method</p>";

    // Clear the cart after checkout
    unset($_SESSION['cart']);

    echo "<p>Thank you for your purchase!</p>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

    <?php include 'footer.php'; ?>
</body>
</html>

<style>

    /* General Body Styling */
body {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
}

/* Header Style */
h1 {
    text-align: center;
    color: black;
    margin-top: 30px;
}

/* Paragraph Styling */
p {
    font-size: 20px;
    line-height: 1.6;
    margin: 15px 0;
    text-align: center;
}

/* Table Styling */
table {
    width: 70%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Table Header Styling */
th {
    background-color: #f2f2f2;
    padding: 12px;
    font-size: 16px;
    text-align: left;
}

/* Table Cell Styling */
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Styling for the Total Section */
p strong {
    font-weight: bold;
    color: #333;
}

/* Styling the table rows */
tr:nth-child(even) {
    background-color: #f9f9f9;
}


</style>
