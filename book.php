<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$day = $_POST['day'];
$notes = $_POST['notes'];

if (empty($name) || empty($doctor) || empty($date) || empty($time) || empty($day)) {
    echo "<script>alert('All fields except notes are required.'); window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO appointments (name, doctor, date, time, day, notes) 
        VALUES ('$name', '$doctor', '$date', '$time', '$day', '$notes')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Appointment successfully booked.'); window.location.href='patients.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
