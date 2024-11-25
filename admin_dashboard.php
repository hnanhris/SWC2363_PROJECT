<?php
session_start();
include('db.php'); // Include DB connection file

try {
    // Query to fetch products for the admin
    $query = "SELECT * FROM products";
    $stmt = $pdo->query($query);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>

<header>
		<span class="logo-text">HHA PRINTED</span>
		
        <div class="logo"> </div>
		
        <nav>
            <ul>
                <li><a href="admin_dashboard.php" >Management</a></li>
            </ul>
        </nav>
    </header>

<h1>Admin Dashboard</h1>

<a href="add_product.php">Add New Product</a>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): 
            $imagePath = 'upload/images/' . htmlspecialchars($product['image']); // Path to the product image
        ?>
        <tr>
            <td><img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 100px; height: auto;"></td>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td>RM <?php echo number_format($product['price'], 2); ?></td>
            <td>
                <a href="edit_product.php?product_id=<?php echo urlencode($product['id']); ?>">Edit</a> |
                <a href="delete_product.php?product_id=<?php echo urlencode($product['id']); ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>


<style> 

header {
    justify-content: space-between;
    background-color: black;
	display: grid;
    grid-template-columns: 1fr auto 1fr;  /* Three columns: left, center, and right */
    align-items: center;  /* Vertically center the content */
    padding: 20px;
}
	
.logo-text {
    font-size: 24px;             /* Makes the text bold */
    color: white;                  /* Choose the color for your logo text */
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    letter-spacing: 2px;          /* Adds spacing between letters */
    text-transform: uppercase;    /* Makes the text uppercase */
	padding-left: 30px;
	}
	
nav {
    display: flex;
    justify-content: space-between; /* Distribute the left and right navigation */
    width: 100%; /* Take full width of the header */
	margin-left: 400px;
}
	
nav ul {
    list-style: none;
    display: flex;
    gap: 7px;
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li a {
    text-decoration: none;
    color: white;
	font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
	font-size: 20px;
    margin-right: 50px;

}


/* Reset some default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    background-color: #f4f4f4;
    color: #333;
    padding: 20px;
}

/* Header Styling */
h1 {
    color: black;
    margin-top: 40px;
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    text-align: center;
    margin-bottom: 20px;
}

h2 {
    color: black;
    margin-top: 70px;
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    text-align: center;
    margin-bottom: 20px;
}

/* Links Styling */
a {
    color: black;
    text-decoration: none;
    font-weight: bold;
    text-align: center;
    font-size: 20px;
    margin-top: 30px;
}

a:hover {
    text-decoration: underline;
}

/* Table Styling */
table {
    width: 100%;
    margin-top: 20px;
    margin-bottom: 40px;
    border-collapse: collapse;
    background-color: #fff;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: black;
    color: white;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* Action buttons in the table */
td a {
    padding: 5px 5px;
    font-size: 15px;
    background-color: black;
    color: white;
    text-decoration: none;
}

td a:hover {
    background-color: #e67e22;
}

/* Add Product button styling */
a.add-product {
    display: inline-block;
    padding: 10px 20px;
    background-color: #2ecc71;
    color: #fff;
    border-radius: 5px;
    margin-bottom: 20px;
    text-decoration: none;
}

a.add-product:hover {
    background-color: #27ae60;
}


</style>