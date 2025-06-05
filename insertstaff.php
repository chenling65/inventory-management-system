<?php
include ('config/db.php');

$staffname = mysqli_escape_string($conn, $_POST['staffName']);
$staffid = mysqli_escape_string($conn, $_POST['staffID']);
$dob = mysqli_escape_string($conn, $_POST['dob']);
$password = mysqli_escape_string($conn, $_POST['password']);
$contact = mysqli_escape_string($conn, $_POST['contact']); 
$email = mysqli_escape_string($conn, $_POST['email']);
$type = mysqli_escape_string($conn, $_POST['type']);

$sql = "INSERT INTO staff (StaffName, StaffID, DOB, Password, ContactNo, Email, Type) 
        VALUES ('$staffname', '$staffid', '$dob', '$password', '$contact', '$email', '$type')";

// Save to the database
if(mysqli_query($conn, $sql)) {
    // Success
    echo '<script>alert("Data saved successfully!");';
    echo 'window.location.href = "formstaff.php";</script>';
} else {
    echo '<script>alert("Error! Please Check !");';
    echo 'window.location.href = "formstaff.php";</script>';
}
?>

