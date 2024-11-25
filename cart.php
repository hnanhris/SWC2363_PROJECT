<?php
session_start(); // Start the session
include 'db.php'; // Include DB connection file

// Handle quantity update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $productId = $_POST['update_id']; // Get the product ID to update
    $newQuantity = intval($_POST['quantity']); // Ensure the quantity is an integer

    if ($newQuantity > 0) { // Ensure the quantity is greater than 0
        // Update the quantity if the product exists in the cart
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
        }
    } else {
        // Remove the product if the quantity is set to 0
        unset($_SESSION['cart'][$productId]);
    }
    header("Location: cart.php"); // Refresh the page to reflect changes
    exit();
}

// Handle item removal
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $productId = $_POST['remove_id']; // Get the product ID to remove from the cart
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // Remove the product from the cart
    }
    header("Location: cart.php"); // Refresh the page to reflect changes
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Shopping Cart - Hijab Store</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Your Cart</h1>

        <form method="post" action="cart.php">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        $total = 0;
                        foreach ($_SESSION['cart'] as $id => $item) {
                            $itemTotal = $item['price'] * $item['quantity'];
                            echo "
                            <tr>
                                <td>{$item['name']}</td>
                                <td>
                                    <form method='post' action='cart.php' style='display:inline;'>
                                        <input type='number' name='quantity' value='{$item['quantity']}' min='1' required>
                                        <input type='hidden' name='update_id' value='$id'>
                                        <button type='submit'>Update</button>
                                    </form>
                                </td>
                                <td>RM" . number_format($itemTotal, 2) . "</td>
                                <td>
                                    <form method='post' action='cart.php' style='display:inline;'>
                                        <button type='submit' name='remove_id' value='$id'>Remove</button>
                                    </form>
                                </td>
                            </tr>";
                            $total += $itemTotal;
                        }
                        echo "
                        <tr>
                            <td colspan='4'><strong>Total: RM" . number_format($total, 2) . "</strong></td>
                        </tr>";
                    } else {
                        echo "<tr><td colspan='4'>Your cart is empty.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
            <form method="post" action="checkout.php">
                <h2>Select Payment Method</h2>
                <label>
                    <input type="radio" name="payment_method" value="TNG" required> Touch 'n Go
                </label>
                <br>
                <label>
                    <input type="radio" name="payment_method" value="Card" required> Credit/Debit Card
                </label>
                <br>
                <label>
                    <input type="radio" name="payment_method" value="COD" required> Cash on Delivery
                </label>
                <br><br>
                <button type="submit" class="btn">Proceed to Checkout</button>
            </form>
        <?php } ?>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>





<style>

    /* Shopping Cart Page */

/* Main Content */
main {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    padding: 20px;
    max-width: 1000px;
    margin: 0 auto;
}

main h1 {
    text-align: center;
    margin-bottom: 20px;
    color: black; /* Hijab theme green */
}

/* Cart Table */
table {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    font-size: 16px;
    text-align: center;
}

thead th {
    background-color: black;
    color: white;
    padding: 10px;
    border: 1px solid #ddd;
}

tbody td {
    padding: 10px;
    border: 1px solid #ddd;
}

tbody tr:nth-child(even) {
    background-color: white;
}

tbody tr:hover {
    background-color: white;
}

/* Remove Button */
form button {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    background-color: balck; /* Red for remove action */
    color: white;
    border: none;
    padding: 6px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

form button:hover {
    background-color: black;
}

table td input[type="number"] {
        width: 70px;
    }

    button {
        padding: 6px 10px;
        font-size: 12px;
        background-color: black;
}
    

/* Total Row */
tbody tr:last-child td {
    font-weight: bold;
    background-color: #f1f1f1;
    text-align: right;
}

/* Checkout Button */
.btn {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    display: inline-block;
    background-color:black; /* Hijab theme green */
    color: white;
    text-decoration: none;
    text-align: center;
    padding: 10px 20px;
    font-size: 16px;
}

.btn:hover {
    background-color: #45a049; /* Slightly darker green */
}

</style>
