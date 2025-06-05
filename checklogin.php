<?php
include("config/db.php");

if(isset($_POST['staffName']) && isset($_POST['staffID']) && isset($_POST['password']))
{
    $staffName = $_POST['staffName'];
    $staffID = $_POST['staffID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM staff WHERE staffName = '$staffName' AND staffID = '$staffID' AND password = '$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows ($result);

    if ($count==1)
    {
        // Start session if login is successful
        session_start();
        $_SESSION['staffName'] = $staffName;
        $_SESSION['staffID'] = $staffID;

        // Redirect to appropriate page based on status (you can customize this logic)
        if($row['Type'] == 'Admin')
        {
            header('Location: dashboard.php');
            exit(); // Terminate script execution after redirection
        }
    }
    else
    {
        // Display pop-up notification for invalid credentials using JavaScript
        echo "<script>alert('Invalid credentials! Please enter valid information.');";
        // Redirect back to the login page after displaying the alert
        echo "window.location='login.php';</script>";
    }
}
?>


