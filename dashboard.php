<?php
    // Include your database connection file
    include ('config/db.php');

    // Fetch total quantity for this month from the recordout table
    $sql_monthly_quantity = "SELECT SUM(Quantity) AS total_monthly_quantity FROM recordout WHERE MONTH(Date) = MONTH(NOW())";
    $result_monthly_quantity = mysqli_query($conn, $sql_monthly_quantity);

    // Check if the query executed successfully
    if (!$result_monthly_quantity) {
        // Display error message and terminate execution
        die('Error: ' . mysqli_error($conn));
    }

    // Check if there are any results
    if (mysqli_num_rows($result_monthly_quantity) > 0) {
        // Fetch the row containing the total quantity
        $row_monthly_quantity = mysqli_fetch_assoc($result_monthly_quantity);
        $total_monthly_quantity = $row_monthly_quantity['total_monthly_quantity'];
    } else {
        $total_monthly_quantity = 0; // Set default value if no records found
    }

    // Fetch the top seller from the recordout table with product description
    $sql_top_seller = "SELECT ro.ProductCode, p.Description, SUM(ro.Quantity) AS total_quantity 
                       FROM recordout ro 
                       JOIN product p ON ro.ProductCode = p.ProductCode 
                       GROUP BY ro.ProductCode 
                       ORDER BY total_quantity DESC 
                       LIMIT 1";
    $result_top_seller = mysqli_query($conn, $sql_top_seller);

    // Check if the query executed successfully
    if (!$result_top_seller) {
        // Display error message and terminate execution
        die('Error: ' . mysqli_error($conn));
    }

    // Check if there are any results
    if (mysqli_num_rows($result_top_seller) > 0) {
        // Fetch the row containing the top seller
        $row_top_seller = mysqli_fetch_assoc($result_top_seller);
        $top_seller_product_code = $row_top_seller['ProductCode'];
        $top_seller_quantity = $row_top_seller['total_quantity'];
        $top_seller_description = $row_top_seller['Description'];
    } else {
        $top_seller_product_code = "N/A"; // Set default value if no records found
        $top_seller_quantity = 0;
        $top_seller_description = "N/A";
    }

    // Fetch the lower seller from the recordout table with product description
    $sql_lower_seller = "SELECT ro.ProductCode, p.Description, SUM(ro.Quantity) AS total_quantity 
                         FROM recordout ro 
                         JOIN product p ON ro.ProductCode = p.ProductCode 
                         GROUP BY ro.ProductCode 
                         ORDER BY total_quantity ASC 
                         LIMIT 1";
    $result_lower_seller = mysqli_query($conn, $sql_lower_seller);

    // Check if the query executed successfully
    if (!$result_lower_seller) {
        // Display error message and terminate execution
        die('Error: ' . mysqli_error($conn));
    }

    // Check if there are any results
    if (mysqli_num_rows($result_lower_seller) > 0) {
        // Fetch the row containing the lower seller
        $row_lower_seller = mysqli_fetch_assoc($result_lower_seller);
        $lower_seller_product_code = $row_lower_seller['ProductCode'];
        $lower_seller_quantity = $row_lower_seller['total_quantity'];
        $lower_seller_description = $row_lower_seller['Description'];
    } else {
        $lower_seller_product_code = "N/A"; // Set default value if no records found
        $lower_seller_quantity = 0;
        $lower_seller_description = "N/A";
    }

    // Close the connection
    mysqli_close($conn);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script>
    function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            // If the user confirms, proceed with the logout action
            window.location.href = "logout.php";
        } else {
            // If the user cancels, do nothing
            return false;
        }
    }
</script>

    <style>
        body {
            font-family: Garet;
            margin-left: 5%; 
            margin-right: 5%; 
            background-color: #cbc1b8;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #edeae8;
            display: flex;
            align-items: center;
            height: 50px; /* Increase the height for better visibility */
            justify-content: space-between; /* Spread the links evenly */
            z-index: 1000;
        }

        nav a {
            text-decoration: none;
            color: #000;
            font-size: 16px; /* Adjust font size */
            font-weight: bold;
            padding: 15px 50px; /* Add more padding for better spacing */
            position: relative;
            font-family: Arial, sans-serif;
            transition: color 0.3s; /* Smooth color transition */
        }

        nav a:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 50%;
            right: -10px;
            width: 2px;
            height: 30px;
            background-color: white;
            transform: translateY(-50%);
        }

        nav a:hover {
            color: red;
        }

        .container {
            width: auto;
            margin-top: 40px; /* Adjust margin to create space for fixed navigation */
            padding: 20px;
        }

        .header {
            width: 96.5%;
            background-color: #ccc;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border: solid 1px #ccc;
            border-radius: 20px 20px 5px 5px;
            font-size: 25px;
        }

        table {
            width: 50%; /* Adjust the width as needed */
            margin-right: 20px; /* Space between tables, if needed */

        }
        .table1{
            width: 98%;
            border: solid 1px #ccc;
            border-radius: 0px 0px 20px 20px;
            background-color: #ffffff;
        }
        .table1 img{
            width: 250px;
            height: 200px;
            margin-left: 50px;
        }
        label[for="WEEK"] {
            font-size: 50px; /* Larger font size for emphasis */
            color: #28a745; /* Green color for visibility */
            font-weight: bold; /* Bold font weight */
        }
        label[for="MONTH"] {
            font-size: 50px;
            color: #FF0000; /* Red color for a different emphasis */
            font-weight: bold;
        }

        .container2{
            display: flex;
        }
        .table2{
            border: solid 1px #ccc;
            border-radius: 20px 20px 20px 20px;
            background-color: #ffffff;
            width: 40%;


        }
        .table2 th{
            border: solid 1px #ccc;
            width: 100px;
            height: 50px;
            text-align: center;
            background-color: #ccc;
            border-radius: 20px 20px 5px 5px;
            font-size: 25px;
        }
    .table2 tr {
        height: 50px; /* Set the height for table rows */
    }
        .table2 td{
            font-size: 50px;
            color: #FF0000;
            font-weight: bold;
        }
        .table2 img{
            margin-right: -8%;
            margin-left: -8%;
        }
        .table3{
            border: solid 1px #ccc;
            border-radius: 20px 20px 20px 20px;
            background-color: #ffffff;
            width: 60%;

        }
        .table3 th{
            border: solid 1px #ccc;
            text-align: center;
            background-color: #ccc;
            border-radius: 20px 20px 5px 5px;
            font-size: 25px;
            height: 55px;
        }
        .table3 td{
            font-size: 25px;
            color: #28a745;
            font-weight: bold;
        }
        .table3 .combined-cell {
            display: flex;
            margin-left: 0%;
            margin-top: 0%;
            gap: 10%;
            align-items: center; 
            text-align: center;
            
        }
        .image-and-text {
            display: flex; /* Use flexbox to position the image and text side by side */
            align-items: center; /* Align the items vertically in the center */
            width: 200px;
            height: 200px;
            margin-left: 70px;
            margin-top: 0px;
        }
        .text-container {
            display: block; /* This makes the container a block-level element */
            text-align: center; /* Center the text horizontally */
            margin-left: 80px; /* Add some space between the image and the text */
        }
    .arrow-icon {
        color: blue; /* Change color as needed */
        margin-left: 0; /* Adjust margin as needed */
        margin-right: 5px;
    }

    .edit-link {
        color: blue; /* Change color as needed */
    }

.item {
    /* Define common styles for the item container */
}

.top-seller ,
.lower-seller{
    font-size: 30px; /* Adjust the font size as needed */

}


.quantity {
    font-size: 40px; /* Adjust the font size as needed */

}

.description {
    font-size: 35px; /* Adjust the font size as needed */

}



    </style>
</head>
<body>
    <nav>
        <a href="dashboard.php"class="edit-link"><span class="arrow-icon">&#9658;</span>DASHBOARD <span class="arrow-icon">&#9664</span></a></a>
        <a href="itemcategory.php">ITEM CATEGORY</a>
        <a href="editproduct.php">EDIT PRODUCT</a>
        <a href="productin.php">NEW INVENTORY</a>
        <a href="productout.php">PRODUCT OUT</a>
        <a href="formstaff.php">EDIT STAFF</a>
        <a href="#" onclick="confirmLogout()" class="logout-link"><i class="fas fa-sign-out-alt" style="font-size: 24px; "></i></a>


    </nav><br>
    <div class="container">
        <div class="header">TOTAL PRICE ITEM OUT</div>
        <?php
            // Include your database connection file
            include ('config/db.php');

            // Fetch total value for this week from the recordout table
            $sql_weekly = "SELECT SUM(total) AS total_weekly_value FROM recordout WHERE WEEK(date) = WEEK(NOW())";
            $result_weekly = mysqli_query($conn, $sql_weekly);

            // Check if the query executed successfully
            if (!$result_weekly) {
                // Display error message and terminate execution
                die('Error: ' . mysqli_error($conn));
            }

            // Check if there are any results
            if (mysqli_num_rows($result_weekly) > 0) {
                // Fetch the row containing the total value
                $row_weekly = mysqli_fetch_assoc($result_weekly);
                $total_weekly_value = $row_weekly['total_weekly_value'];
            } else {
                $total_weekly_value = 0; // Set default value if no records found
            }

            // Fetch total value for this month from the recordout table
            $sql_monthly = "SELECT SUM(total) AS total_monthly_value FROM recordout WHERE MONTH(date) = MONTH(NOW())";
            $result_monthly = mysqli_query($conn, $sql_monthly);

            // Check if the query executed successfully
            if (!$result_monthly) {
                // Display error message and terminate execution
                die('Error: ' . mysqli_error($conn));
            }

            // Check if there are any results
            if (mysqli_num_rows($result_monthly) > 0) {
                // Fetch the row containing the total value
                $row_monthly = mysqli_fetch_assoc($result_monthly);
                $total_monthly_value = $row_monthly['total_monthly_value'];
            } else {
                $total_monthly_value = 0; // Set default value if no records found
            }

            // Close the connection
            mysqli_close($conn);
        ?>
        <table class="table1">
            <tr>
                <td><img src="d1.png" alt="" class=""></td>
                <td><label for="WEEK">WEEK<br> RM <?php echo number_format($total_weekly_value, 2); ?></label></td>
                <td><label for="MONTH">MONTH<br> RM <?php echo number_format($total_monthly_value, 2); ?></label></td>
            </tr>
        </table>


        <br><br><br>

        <div class="container2">
            <table class="table2">
                <tr>
                    <th>TOTAL QUANTITIES SELL</th>
                </tr>
                <tr>
                    <td class="image-and-text">
                        <img src="d2.png" alt="" style="vertical-align: middle;">
                        <div class="text-container">
                            <div>MONTH</div>
                            <div><?php echo $total_monthly_quantity; ?></div>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table3">
                <tr>
                    <th>RANKING</th>
                </tr>
                <td colspan="2" class="combined-cell"> <!-- Use colspan="2" to span across two columns -->
                    <div class="image-and-text">
                    <img src="top.png" alt="Top Seller Image" width="130px" height="140px">
                    <span class="item">
                        <span class="top-seller"  style=" color: #db9b39;  margin-left: 42%; ">BEST</span>
                        <span class="top-seller"  style="  color: #db9b39; margin-left: 30%;">SELLER:</span>
                        <span class="quantity"  style=" color: #db9b39;  margin-left: 30%;"><?php echo $top_seller_quantity; ?></span><br>
                        <span class="description"  style=" color: #db9b39;  margin-left: 30%;"><?php echo $top_seller_description; ?></span>
</span>
</div>
 
                    <div class="image-and-text">
                    <img src="low.png" alt="Top Seller Image" width="120px" height="120px">
                    <span class="item">
                        <span class="lower-seller" style="color: black; margin-left: 30%;">LOWER</span> 
                        <span class="lower-seller" style="color: black;margin-left: 30%;">SELLER:</span>                      <span class="quantity" style="color: black;margin-left: 50%;"><?php echo $lower_seller_quantity; ?></span><br>
                        <span class="description" style="color: black; margin-left: 30%;"><?php echo $lower_seller_description; ?></span>
</span>
</div>
                </td>
            </table>
        </div>
    </div>
</body>
</html>