<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed");

$id = $_POST['id'];
$name = $_POST['name'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$day = $_POST['day'];
$time = $_POST['time'];
$notes = $_POST['notes'];

if (!empty($id)) {
  $stmt = $conn->prepare("UPDATE appointments SET name=?, doctor=?, date=?, day=?, time=?, notes=? WHERE id=?");
  $stmt->bind_param("ssssssi", $name, $doctor, $date, $day, $time, $notes, $id);
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