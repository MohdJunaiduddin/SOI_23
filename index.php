<html>
<body>

<?php
if (session_status() === PHP_SESSION_ACTIVE)
	session_destroy();
	
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS authentication";
if ($conn->multi_query($sql) !== TRUE) {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

// Create connection
$dbname = "authentication";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS credentials (
username VARCHAR(30) PRIMARY KEY,
password VARCHAR(30) NOT NULL
);";

if ($conn->multi_query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<form method="post">
Username: <input type="text" name="username" placeholder="username" required><br>
Password: <input type="password" name="password" placeholder="password" required><br>
<input type="submit" formaction="signup.php" value="Sign Up">
<input type="submit" formaction="signin.php" value="Sign In">
</form>

</body>
</html>