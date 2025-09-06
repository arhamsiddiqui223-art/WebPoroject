<?php
$conn = mysqli_connect("localhost", "root", "", "hospital_db");

if (!$conn) {
    http_response_code(500);
    echo "DB connection failed";
    exit;
}

// ID check
if (!isset($_POST['id'])) {
    http_response_code(400);
    echo "Missing doctor ID";
    exit;
}

$id = intval($_POST['id']); // sanitize

// 🔍 Debug Logs
file_put_contents("log.txt", "Deleting ID: " . $id);
file_put_contents("debug.txt", print_r($_POST, true));

// Delete query
$query = "DELETE FROM doctors WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "success";
} else {
    http_response_code(500);
    echo "fail";
}

mysqli_close($conn);
?>
