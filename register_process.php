<?php
include 'db.php'; // Include DB connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the registration form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Plain text password, no hashing

    // Insert the new user into the database with the plain text password
    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password' => $password // Store plain text password
    ]);

    // Redirect to login page after successful registration
    header("Location: login.php?success=1"); // Add a success message indicator
    exit();
}
?>
