<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include ID so we can delete specific records
$sql = "SELECT id, name, doctor, date, day, time, notes FROM appointments ORDER BY date DESC";
$result = $conn->query($sql);

// Build JSON response
$patients = array();
while ($row = $result->fetch_assoc()) {
    $patients[] = $row;
}

// Return response
header('Content-Type: application/json');
echo json_encode($patients);

$conn->close();
?>
