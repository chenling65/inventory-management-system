<?php
    include ('config/db.php');

    $staffname = mysqli_escape_string($conn, $_POST['staffName']);
    $staffid = mysqli_escape_string($conn, $_POST['staffID']);
    $dob = mysqli_escape_string($conn, $_POST['dob']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $contact = mysqli_escape_string($conn, $_POST['contact']); 
    $email = mysqli_escape_string($conn, $_POST['email']);
    $type = mysqli_escape_string($conn, $_POST['type']);

    // Use UPDATE query instead of INSERT
    $sql = "UPDATE staff SET 
            StaffName = '$staffname', 
            DOB = '$dob', 
            Password = '$password', 
            ContactNo = '$contact', 
            Email = '$email', 
            Type = '$type' 
            WHERE StaffID = '$staffid'";

    // Update the database
    if(mysqli_query($conn, $sql)) {
        // Success
        // Redirect to formstaff.php
        header("Location: formstaff.php");
        exit(); // Ensure script stops executing after redirect
    } else {
        // Error
        echo "Query error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>

