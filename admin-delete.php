<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed");

$id = $_POST['id'];
if (!empty($id)) {
  $stmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
  $stmt->bind_param("i", $id);
  if ($stmt->execute()) {
    echo "success";
  } else {
    echo "error";
  }
  $stmt->close();
} else {
  echo "invalid";
}
$conn->close();
?>