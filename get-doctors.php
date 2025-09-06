<?php
$conn = mysqli_connect("localhost", "root", "", "hospital_db");

if (!$conn) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

$sql = "SELECT name, timings FROM doctors";
$result = mysqli_query($conn, $sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Query failed"]);
    exit;
}

$doctors = [];

while ($row = mysqli_fetch_assoc($result)) {
    $doctors[] = $row;
}

header('Content-Type: application/json');
echo json_encode($doctors, JSON_PRETTY_PRINT); // for easier debugging (optional)

mysqli_close($conn);
?>
