<?php
// 1. Connect to the database
$conn = mysqli_connect("localhost", "root", "", "hospital_db");

if (!$conn) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

// 2. Check if table exists
$tableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'doctors'");
if (mysqli_num_rows($tableCheck) == 0) {
    http_response_code(500);
    echo json_encode(["error" => "Doctors table not found"]);
    exit;
}

// 3. Get doctors from DB
$sql = "SELECT * FROM doctors";
$result = mysqli_query($conn, $sql);

$doctors = [];

while ($row = mysqli_fetch_assoc($result)) {
    $doctors[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'timings' => $row['timings'] 
    ];
}

// 4. Return JSON response
header('Content-Type: application/json');
echo json_encode($doctors);

mysqli_close($conn);
?>
