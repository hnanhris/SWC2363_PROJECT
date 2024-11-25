<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Register - Hijab Store</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Register</h1>
        <form method="post" action="register_process.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>

         <!-- Add Sign In Link -->
         <p>Already have an account? <a href="login.php">Login</a></p>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>

<style>


/* Registration Page */

/* Main Content */
main {
    padding: 20px;
    max-width: 400px;
    margin: 50px auto;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
}

main h1 {
    margin-bottom: 20px;
    color: black; /* Hijab theme green */
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    width: 100%;
    text-align: left;
    color: #333;
}

input[type="text"], 
input[type="email"], 
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
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
    width: 100%;
}

button:hover {
    background-color:black; /* Slightly darker green */
}

/* SignIn Link */
main p a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
}

main p a:hover {
    text-decoration: underline;
}

</style>
