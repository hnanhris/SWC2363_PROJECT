<?php
include 'db.php'; // Include DB connection file

try {
    // Fetch products from the database
    $query = "SELECT * FROM products";
    $stmt = $pdo->query($query);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Shop - Hijab Store</title>
</head>


<?php include 'header.php'; ?>
<body>

    <div class="products">
        <?php foreach ($products as $product): 
            $imagePath = 'upload/images/' . htmlspecialchars($product['image']);
            $productName = htmlspecialchars($product['name']);
            $description = htmlspecialchars($product['description']);
            $productPrice = number_format($product['price'], 2);
        ?>
        <div class="product">

            <img src="<?php echo $imagePath; ?>" alt="<?php echo $productName; ?>">
            <h3><?php echo $productName; ?></h3>
            <p><?php echo $description; ?></p>
            <p>RM<?php echo $productPrice; ?></p>

            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit">Add to Cart</button>
            </form>


        </div>
        <?php endforeach; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>


<style>

/* General Styles */

body {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    margin: 0;
    padding-left: 20px;
    background-color: #f9f9f9;
}

h3 {
    margin: 0;
    font-size: 20px;
    color: #333;
}

p {
    
    font-size: 16px;
    color: #555;
}

/* Product Section */
.product {
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    margin-left: 60px;
    margin-top: 30px;
    margin-bottom: 30px;
    text-align: center;
    max-width: 300px;
    display: inline-block;
    transition: transform 0.2s, box-shadow 0.2s;
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

/* Product Image */
.product img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Product Details */
.product h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.product p {
    font-size: 16px;
    font-weight: bold;
    color: #e63946;
    margin-bottom: 15px;
}

/* Add to Cart Button */
.product form button {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    background-color: black;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.product form button:hover {
    background-color: #e63946;
}






.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    width: 250px;
    text-align: center;
    background-color: #fff;
}

.product img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.product h3 {
    font-size: 18px;
    margin: 10px 0;
}

.product p {
    font-size: 16px;
    color: #555;
}





</style>


