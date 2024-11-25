<?php
session_start();
include 'db.php'; // Include DB connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted form data
    $username = $_POST['username'];
    $password = $_POST['password']; // Plain text password

    // Query the database for the user
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and password matches
    if ($user && $password == $user['password']) { // Compare plain text passwords
        // Set session for authenticated user
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Check if the username is 'admin' and password is '12345678'
        if ($username == 'admin' && $password == '12345678') {
            // Redirect to dashboard.php if username and password match 'admin' and '12345678'
            header('Location: admin_dashboard.php');
        } else {
            // Redirect to home.php for any other user
            header('Location: home.php');
        }
        exit();
    } else {
        // If login failed
        echo "Invalid username or password.";
    }
}
?>



