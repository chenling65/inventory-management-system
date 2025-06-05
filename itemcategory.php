<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


    <style>
        body {
            font-family: Garet;
            margin: 0; /* Remove default margin */
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
            background-color: #cbc1b8;
        }

        .header {
            background-color: #edeae8;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            border: solid 0px #000;
            border-radius: 20px 20px 5px 5px;
            margin-top: 50px;
            margin-left: 75px;
            width: 88%;
        }
    .arrow-icon {
        color: blue; /* Change color as needed */
        margin-left: 0; /* Adjust margin as needed */
        margin-right: 5px;
    }

    .edit-link {
        color: blue; /* Change color as needed */
    }

        .table1 {
            width: 90%;
            height: 500px;
            border: solid 0px #000;
            background-color: #ffffff;
            border-radius: 5px 5px 20px 20px;
        }

        .table1 td {
            font-size: 25px;
            text-align: center;
            font-weight: bold;
        }

        .categories-container {
            display: flex;
            flex-direction: column;
            gap: 10px; 
            align-items: center;
        }

        .categories-container button {
            width: 50%;
            height: 35%;
            padding: 15px; /* Adjust padding as needed */
            border: none;
            background-color: #ffffff;
            cursor: pointer;
            font-size: 18px; /* Adjust font size as needed */
            border-radius: 30px;
            transition: background-color 0.3s, color 0.3s; /* Add smooth transition effects */
            border: 6px solid #edeae8;
            font-weight: bold;
        }

        .categories-container button:hover {
            background-color: #e0e0e0; /* Change background color on hover */
            color: #333; /* Change text color on hover */
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
        <div class="header">ITEM CATEGORY</div>
        <div class="categories-container">
        <table class='table1'>        
            <tr>
                <td><a href="table.php"><button><i class="fas fa-ice-cream" style="font-size: 24px;"></i> Frozen Food</button></a></td>
                <td><a href="table.php"><button><i class="fas fa-utensils" style="font-size: 24px;"></i> Instant Food</button></a></td>
                <td><a href="table.php"><button><i class="fas fa-box-open" style="font-size: 24px;"></i> Convenience Food</button></a></td>

            </tr>
            <tr>
                <td><a href="table.php"><button><i class="fas fa-cookie" style="font-size: 24px;"></i> Snack</button></a></td>
                <td><a href="table.php"><button><i class="fas fa-glass-whiskey" style="font-size: 24px;"></i> Soda</button></a></td>
               <td><a href="table.php"><button><i class="fas fa-umbrella" style="font-size: 24px;"></i> Daily Necessity</button></a></td>

            </tr>
            <tr>
                <td><a href="table.php"><button><i class="fas fa-bread-slice" style="font-size: 24px;"></i> Bakery Product</button></a></td>
                <td><a href="table.php"><button><i class="fas fa-wine-glass-alt" style="font-size: 24px;"></i> Alcoholic Drink</button></a></td>
                <td><a href="table.php"><button><i class="fas fa-cocktail" style="font-size: 24px;"></i> Other Drink</button></a></td>

            </tr>
        </table>
    </div>
</body>
</html>
