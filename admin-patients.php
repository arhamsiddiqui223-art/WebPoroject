<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed");

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
$appointments = [];

while ($row = $result->fetch_assoc()) {
  $appointments[] = $row;
}
header('Content-Type: application/json');
echo json_encode($appointments);
$conn->close();
?>