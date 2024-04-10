php
<?php
// Check if user is logged in as admin
session_start();
// if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
//   header('Location: login.php');
//   exit;
// }

// Connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user ID from URL parameter
if (!isset($_GET['user_id'])) {
  echo "User ID not specified.";
  exit;
}
$user_id = $_GET['user_id'];

// Update user in database to set banned flag
$sql = "UPDATE users SET is_banned=1 WHERE id={$user_id}";
if ($conn->query($sql) === TRUE) {
  echo "User banned successfully.";
} else {
  echo "Error banning user: " . $conn->error;
}

$conn->close();
?>
