<?php
// This script generates a hashed version of your password
$password = '12345678'; // Replace with the plain-text password you want to hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Display the hashed password
echo "Hashed Password: " . $hashed_password;
?>
