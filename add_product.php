<?php
session_start();
include('db.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Set the upload directory
    $upload_dir = __DIR__ . "/upload/images/";
    
    // Ensure the directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
    }

    // Generate a unique name for the uploaded image
    $image_name = time() . "_" . basename($_FILES['image']['name']);
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = $upload_dir . $image_name;

    // Move the uploaded file
    if (move_uploaded_file($image_tmp, $image_path)) {
        echo "Image uploaded successfully!";
        
        // Save product information to the database
        $query = "INSERT INTO products (name, description, price, image) VALUES (:name, :description, :price, :image)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':image' => $image_name,
        ]);

        echo "Product added successfully!";
        header('Location: admin_dashboard.php'); // Redirect to the admin dashboard
        exit;
    } else {
        echo "Error uploading image.";
    }
}
?>


<?php include 'header.php'; ?>

<h1>Add New Product</h1>
<form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name</label>
    <input type="text" name="name" required><br><br>

    <label for="description">Description</label>
    <textarea name="description" required></textarea><br><br>

    <label for="price">Price</label>
    <input type="number" name="price" step="0.01" required><br><br>

    <label for="image">Product Image</label>
    <input type="file" name="image" accept="image/*" required><br><br>

    <button type="submit">Add Product</button>
</form>



<style>

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
    background-color:black; /* Hijab theme green */
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 16px;
    align-self: center;
    width: 100%;
}

button:hover {
    background-color: #45a049; /* Slightly darker green */
}

/* Responsive Design */
@media (max-width: 500px) {
    form {
        padding: 15px;
    }

    button {
        font-size: 14px;
    }
}

</style>