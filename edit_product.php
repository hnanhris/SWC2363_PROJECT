<?php
session_start();
include('db.php');

$product_id = $_GET['product_id'];  // Get product ID from the URL
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");  // Use 'id' instead of 'product_id'
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // If a new image is uploaded, update it
    if ($image) {
        move_uploaded_file($image_tmp, "assets/images/" . $image);
        // Update the product record in the database
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");  // Use 'id' instead of 'product_id'
        $stmt->execute([$name, $description, $price, $image, $product_id]);
    } else {
        // If no new image is uploaded, just update other fields
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");  // Use 'id' instead of 'product_id'
        $stmt->execute([$name, $description, $price, $product_id]);
    }

    // Redirect to admin dashboard after update
    header("Location: admin_dashboard.php");
    exit;
}
?>

<?php include 'header.php'; ?>

<h1>Edit Product</h1>
<form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

    <label for="description">Description</label>
    <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>

    <label for="price">Price</label>
    <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br><br>

    <label for="image">Product Image</label>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit">Update Product</button>
</form>


<style>
/* Edit Product Page */

/* Main Container */
h1 {
    text-align: center;
    color: black; /* Hijab theme green */
    margin-bottom: 20px;
}

form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    display: flex;
    flex-direction: column;
}

/* Form Labels */
label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

/* Form Inputs */
input[type="text"],
input[type="number"],
input[type="file"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

/* Button Styling */
button {
    background-color: black; /* Hijab theme green */
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    align-self: center;
    width: 100%;
}

button:hover {
    background-color: #45a049; /* Slightly darker green */
}

/* Responsive Design */
@media (max-width: 600px) {
    form {
        padding: 15px;
    }

    button {
        font-size: 14px;
    }
}

</style>