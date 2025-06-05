

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>

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
            border: solid 1px #000;
            border-radius: 20px 20px 5px 5px;
            margin-top: 40px;

        }
        .table1 {
            width: 100%;
            height: 75%;
            border: solid 1px #000;
            background-color: #f3f3f3;
            border-radius: 5px 5px 20px 20px;
        }

        .table1 td {
            font-size: 25px;
            text-align: center;
            font-weight: bold;
        }

        .table1 tr td input {
            width: 500px;
            height: 50px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .table1 tr td button {
            width: 100px;
            height: 40px;
            font-size: large;
            margin-right: 10px; /* Add right margin between buttons */
        }

        .staff-form input[type="text"],
        .staff-form input[type="number"] {
            margin-bottom: 20px; /* This will add a 20px gap below each input field in a form with class 'staff-form' */
        }

        .button-container {
            text-align: center; /* Center the content horizontally */
            margin-top: 20px; /* Add margin to separate from the input fields */
        }

        .save-button {
            background-color: green;
            color: white;
        }

        .delete-button {
            background-color: red;
            color: white;
        }
    .arrow-icon {
        color: blue; /* Change color as needed */
        margin-left: 0; /* Adjust margin as needed */
        margin-right: 5px;
    }

    .edit-link {
        color: blue; /* Change color as needed */
    }
    </style>
</head>
<body>
    <nav>
        <a href="dashboard.php">DASHBOARD</a>
        <a href="itemcategory.php">ITEM CATEGORY</a>
        <a href="editproduct.php">EDIT PRODUCT</a>
        <a href="productin.php">NEW INVENTORY</a>
        <a href="productout.php">PRODUCT OUT</a>
        <a href="formstaff.php"class="edit-link"><span class="arrow-icon">&#9658;</span> EDIT STAFF <span class="arrow-icon">&#9664</span></a>
    </nav>
    <div class="container">
        <div class="header">Edit Staff</div>
        <?php
            include('config/db.php');

            if (isset($_GET['id'])) {
                $staffid = mysqli_real_escape_string($conn, $_GET['id']);

                // Make SQL
                $sql = "SELECT * FROM staff WHERE StaffID = $staffid";

                // Get the query result
                $result = mysqli_query($conn, $sql);

                // Fetch result in array format
                $staffid = mysqli_fetch_assoc($result);

                // Display the form for updating staff information
                if ($staffid) {
                    echo "<form action='updatestaff.php' method='post'>";
                    echo "<table class='table1'>";
                    echo "<tr><td>Staff Name:</td><td><input type='text' name='staffName' value='" . htmlspecialchars($staffid['StaffName']) . "'></td>";
                    echo "<td>Contact No:</td><td><input type='text' name='contact' value='" . htmlspecialchars($staffid['ContactNo']) . "'></td></tr>";
                    echo "<tr><td>Staff ID:</td><td><input type='text' name='staffID' value='" . htmlspecialchars($staffid['StaffID']) . "'></td>";
                    echo "<td>DOB:</td><td><input type='date' name='dob' value='" . htmlspecialchars($staffid['DOB']) . "'></td></tr>";
                    echo "<tr><td>Password:</td><td><input type='text' name='password' value='" . htmlspecialchars($staffid['Password']) . "'></td>";
                    echo "<td>Email:</td><td><input type='text' name='email' value='" . htmlspecialchars($staffid['Email']) . "'></td></tr>";
                    echo "<tr><td>Type:</td><td><input type='text' name='type' value='" . htmlspecialchars($staffid['Type']) . "'></td>";

                    echo "<td colspan='4' class='button-container'>";
                    echo "<button type='submit' class='save-button'>Update</button>";
                    echo "<button type='button' class='delete-button' onclick=\"window.location.href='deletestaff.php?id=" . $staffid['StaffID'] . "'\">Delete</button>";
                    echo "</td></tr>";

                    echo "</table>";
                    echo "</form>";
                } else {
                    echo "<p>No staff found with the given ID.</p>";
                }
            } else {
                echo "<p>No staff ID provided.</p>";
            }

            mysqli_close($conn);
        ?>
    </div>
</body>
</html>


