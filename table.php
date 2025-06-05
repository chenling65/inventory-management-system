<?php
    // Include your database connection file
    include ('config/db.php');

    // Fetch product data from the database with the latest date
    $search = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search query
    $status = isset($_GET['status']) ? $_GET['status'] : 'all'; // Get the selected status
    $status_condition = '';

    if ($status === 'in_stock') {
        $status_condition = "AND p.Quantity > 30";
    } elseif ($status === 'out_of_stock') {
        $status_condition = "AND p.Quantity <= 10";
    } elseif ($status === 'on_order') {
        $status_condition = "AND p.Quantity > 10 AND p.Quantity <= 30";
    }

    $sql = "SELECT p.ProductCode, p.Image, p.Description, p.UnitPrice, p.Quantity, p.SupplierID, r.Date 
            FROM product p
            LEFT JOIN (
                SELECT ProductCode, MAX(Date) AS Date FROM recordin GROUP BY ProductCode
            ) r ON p.ProductCode = r.ProductCode
            WHERE (p.Description LIKE '%$search%' OR p.ProductCode LIKE '%$search%'
            OR p.SupplierID LIKE '%$search%' OR r.Date LIKE '%$search%' OR p.UnitPrice LIKE '%$search%') $status_condition
            ORDER BY p.ProductCode"; 




    $result = mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Table</title>
    <style>
    /* CSS styles */
    body {
        font-family: Garet;
        margin: 0; 
        background-color: #cbc1b8;
        border: solid 0px #000;
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


    .arrow-icon {
        color: blue; /* Change color as needed */
        margin-left: 0; /* Adjust margin as needed */
        margin-right: 5px;
    }

    .edit-link {
        color: blue; /* Change color as needed */
    }


    .container {
        width: 80%;
        margin: 100px auto; /* Center the container */
        padding: 20px;
        background-color: #cbc1b8;
    }

    table {
        width: 100%;
        border: solid 0px #000;
        margin-top: 20px;
        background-color: #ffffff;
        border-collapse: separate; /* Separate borders for cells */
        border-spacing: 0; /* Set spacing between cells to zero */
    }

    th, td {
        padding: 10px; /* Adjust padding for better spacing */
        text-align: center;

    }

    th {
        background-color: #edeae8;
    }

    td {
        background-color: #ffffff;
    }

    .status-dot {
        height: 10px;
        width: 10px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    .in-stock {
        background-color: #28a745;
    }

    .out-of-stock {
        background-color: #dc3545;
    }

    .on-order {
        background-color: #ffc107;
    }

    .button-container {
        text-align: center; /* Center the content horizontally */
        margin-top: 20px; /* Add margin to separate from the input fields */

    }

    .refresh-button {
        background-color: green;
        color: white;
        width: 100px;
        height: 40px;
        font-size: large;
        margin-left: 10px;
    }

    .delete-button {
        background-color: red;
        color: white;
        width: 100px;
        height: 40px;
        font-size: large;
        margin-right: 10px;
    }

    .header {
        background-color: #cbc1b8;
        text-align: center;
        font-weight: bold;
        font-size: 25px;
        border: solid 0px #000;

    }
    .header span {
        font-size: 50px; /* Increase font size */
        font-weight: bold; /* Make the text bold */

    }


    #searchForm input[type="text"]{
        padding: 10px; 
        font-size: 16px; 
        width: 200px;
        height: 40px; 
        border-radius: 20px; 
    }


    #searchForm select {
        padding: 10px; 
        font-size: 16px; 
        width: 150px;
        height: 40px; 
        border-radius: 20px; 
    }

    #searchForm button[type="submit"] {
        padding: 12px; /* Increase padding */
        border: none;
        background: none;
        cursor: pointer;


    }

    #searchForm button[type="submit"] i {
        font-size: 20px; /* Increase the font size of the icon */
    }

    #searchForm button[type="submit"]:hover {
        color: red;
    }
    </style>
</head>
<body>
    <nav>
        <a href="dashboard.php">DASHBOARD</a>
        <a href="itemcategory.php"class="edit-link"><span class="arrow-icon">&#9658;</span> ITEM CATEGORY<span class="arrow-icon">&#9664</span></a>
        <a href="editproduct.php">EDIT PRODUCT</a>
        <a href="productin.php">NEW INVENTORY</a>
        <a href="productout.php">PRODUCT OUT</a>
        <a href="formstaff.php">EDIT STAFF</a>

    </nav>
    <div class="container">
        <div class="header" style="text-align: left;">
            <span style="float: left;">In Stock</span>
            <div style="float: right;"> 
                <form id="searchForm" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="text" name="search" placeholder="Quick Search">
                    <select name="status">
                        <option value="all">All</option>
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                        <option value="on_order">On Order</option>
                    </select>
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div style="clear: both;"></div> 
        </div>

        <form id="deleteForm" method="POST" action="deleteproduct.php">
            <input type="hidden" name="action" value="delete">
            <table id="productTable">
                <tr>
                    <th></th>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th> 
                    <th>Newest Update</th> 
                    <th>Quantity</th>
                    <th>SupplierID</th>
                </tr>
                <?php
                    // Check if there are any results
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Calculate status based on quantity
                            $status = '';
                            if ($row["Quantity"] <= 10) {
                                $status = '<span class="status-dot out-of-stock"></span> Out of Stock'; // Out of Stock
                            } elseif ($row["Quantity"] <= 30) {
                                $status = '<span class="status-dot on-order"></span> On Order'; // On Order
                            } else {
                                $status = '<span class="status-dot in-stock"></span> In Stock'; // In Stock
                            }

                            echo "<tr>";
                            echo "<td><input type='checkbox' name='product_ids[]' value='" . $row["ProductCode"] . "'></td>"; // Checkbox for product ID
                            echo "<td>" . $row["ProductCode"] . "</td>";
                            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Image']) . "' alt='Product Image' style='width: 35px; height: 60px;'></td>";
                            echo "<td>" . $row["Description"] . "</td>";
                            echo "<td>" . $row["UnitPrice"] . "</td>";
                            echo "<td>" . $status . "</td>"; // Display status dot with text
                            echo "<td>" . $row["Date"] . "</td>"; // Display date value
                            echo "<td>" . $row["Quantity"] . "</td>";
                            echo "<td>" . $row["SupplierID"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>0 results</td></tr>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                ?>
            </table>
            <div class="button-container">
                <button type='submit' name="delete-button" class='delete-button'>Delete</button>
                <button type='button' class='refresh-button' onclick="refreshTable()">Refresh</button>
            </div>
        </form>
    </div>

    <script>
        function refreshTable() {
            // Submit the search form to refresh the table
            document.getElementById("searchForm").submit();
        }
    </script>
</body>
</html>
