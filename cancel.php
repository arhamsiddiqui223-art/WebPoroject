<?php
// Database connection (update as per your config)
$conn = new mysqli("localhost", "root", "", "hospital"); // Use your actual DB details

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);

$name = $conn->real_escape_string($data['name']);
$date = $conn->real_escape_string($data['date']);
$time = $conn->real_escape_string($data['time']);

// Delete query (adjust table and column names if needed)
$sql = "DELETE FROM patients WHERE name='$name' AND date='$date' AND time='$time'";

if ($conn->query($sql)) {
  echo "success";
} else {
  echo "error";
}

$conn->close();
?>
