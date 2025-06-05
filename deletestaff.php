<?php
include ('config/db.php');

if (isset($_GET['id']))
{
    $staffid = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "DELETE  FROM staff WHERE StaffID = '$staffid'";
}
    // Save to the database
    if(mysqli_query($conn, $sql)) {
        // Success
        // Redirect to formstaff.php
        header("Location: formstaff.php");
        exit(); // Ensure script stops executing after redirect
    } else {
        // Error
        echo "Query error: " . mysqli_error($conn);
    }







