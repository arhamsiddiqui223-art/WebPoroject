<?php
$conn = mysqli_connect("localhost", "root", "", "hospital_db"); // Replace with your DB name

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'] ?? '';
$timings = $_POST['timings'] ?? '';

if ($name && $timings) {
    $stmt = mysqli_prepare($conn, "INSERT INTO doctors (name, timings) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $name, $timings);
    if (mysqli_stmt_execute($stmt)) {
        echo "success";
    } else {
        echo "error";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "invalid";
}

mysqli_close($conn);
?>
