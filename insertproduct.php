<?php
include('config/db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $transactionID = mysqli_real_escape_string($conn, $_POST['transactionID']);
    $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $supplierId = mysqli_real_escape_string($conn, $_POST['supplierId']);


   // File upload handling
    $image = $_FILES['image']['tmp_name']; // Temporary location of the file
    $imageContent = mysqli_real_escape_string($conn, file_get_contents($image)); // Read the file content

// Attempt to insert data into the database
    $sql = "INSERT INTO product (CurrentDate, TransactionID, ProductBarcode, StandardCost, ProductCode, Category, Description, UnitPrice, Quantity, SupplierID, Image) 
            VALUES ('$date', '$transactionID', '$barcode', '$cost', '$code', '$category', '$description', '$price', '$quantity', '$supplierId', '$imageContent' )";


    if (mysqli_query($conn, $sql)) {
        // Success
        echo '<script>alert("Data saved successfully!");';
        echo 'window.location.href = "editproduct.php";</script>';
    } else {
        // Error
        echo '<script>alert("Error! Please Check !");';
        echo 'window.location.href = "editproduct.php";</script>';
    }

    // Close the connection
    mysqli_close($conn);
}
?>

