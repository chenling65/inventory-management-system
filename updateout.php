<?php
include('config/db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for inserting into recordout table
    $selectedProductCode = mysqli_real_escape_string($conn, $_POST['selectedItem']);
    $total = mysqli_real_escape_string($conn, $_POST['total']); // Retrieve the total cost
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    // Ensure that quantity is properly retrieved for the selected product
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity' . $selectedProductCode]);

    // Prepare SQL statement to insert data into the recordout table
    $insertSql = "INSERT INTO recordout (ProductCode, Total, Date, Remarks, Quantity) 
                  VALUES ('$selectedProductCode', '$total', '$date', '$remarks', '$quantity')";

    // Save data to the recordout table
    if(mysqli_query($conn, $insertSql)) {
        echo "Data saved!";
    } else {
        echo "Query error: " . mysqli_error($conn);
    }

    // Loop through each product code to update quantities
    $productSql = "SELECT ProductCode FROM product";
    $productResult = mysqli_query($conn, $productSql);

    while ($row = mysqli_fetch_assoc($productResult)) {
        $productCodeFromDatabase = $row['ProductCode'];
        // Check if a quantity is submitted for this product code
        if (isset($_POST['quantity' . $productCodeFromDatabase])) {
            // Retrieve the new quantity from the form
            $newQuantity = intval($_POST['quantity' . $productCodeFromDatabase]); // Convert to integer

            // Fetch the original quantity from the database
            $originalQuantitySql = "SELECT Quantity FROM product WHERE ProductCode = '$productCodeFromDatabase'";
            $originalResult = mysqli_query($conn, $originalQuantitySql);
            $originalQuantityRow = mysqli_fetch_assoc($originalResult);
            $originalQuantity = intval($originalQuantityRow['Quantity']); // Convert to integer

            // Calculate the new quantity
            $updatedQuantity = $originalQuantity - $newQuantity;

            // Update the database with the new quantity
            $updateSql = "UPDATE product SET Quantity = '$updatedQuantity' WHERE ProductCode = '$productCodeFromDatabase'";
            mysqli_query($conn, $updateSql);
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Echo JavaScript for showing pop-up notification and redirecting
    echo '<script>alert("Quantities updated successfully!");';
    echo 'window.location.href = "productout.php";</script>';

}
?>
