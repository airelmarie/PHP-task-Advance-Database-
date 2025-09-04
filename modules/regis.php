<?php
// DATABASE CONNECTION
$servername = "localhost";
$username = "root";   // default for XAMPP
$password = "";       // default password is empty
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if database connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// HANDLE FORM SUBMISSION
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form action="" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
