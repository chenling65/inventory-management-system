<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
        }

        .save-button {
            background-color: green;
            color: white;
        }

        .reset-button {
            background-color: red;
            color: white;
        }

        .table1 {
            width: 100%;
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
        }

        .staff-form input[type="text"],
        .staff-form input[type="email"],
        .staff-form input[type="number"] {
            margin-bottom: 20px; /* This will add a 20px gap below each input field in a form with class 'staff-form' */
        }

        .table1 tr td select {
            width: 100%;
            height: 50px; /* Adjust the height as needed */
            font-size: 20px; /* Adjust the font size as needed */
        }

        .staff-list {
            width: 100%;
            border-collapse: collapse;
            background-color: #f3f3f3;
        }

        .staff-list th {
            background-color: #edeae8;
            border: solid 1px #000;
            padding: 10px;
            text-align: left;
        }

        .staff-list td {
            border: solid 1px #000;
            padding: 10px;
            text-align: left;
        }

        .select-button {
            background-color: blue;
            color: white;
            padding: 5px 10px;
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
        <a href="formstaff.php" class="edit-link"><span class="arrow-icon">&#9658;</span> EDIT STAFF <span class="arrow-icon">&#9664</span></a>
    </nav>
    <div class="container">
        <div class="header">Edit Staff</div>
        <form method="post" action="insertstaff.php">
            <table class="table1">
                <tr>
                    <td><label for="staffName"> Staff Name: </label></td>
                    <td><input type="text" name="staffName" value=""></td>
                    <td><label for="contact"> ContactNo: </label></td>
                    <td><input type="text" name="contact" value=""></td>
                </tr>
                <tr>
                    <td><label for="staffID"> Staff ID: </label></td>
                    <td><input type="text" name="staffID"></td>
                    <td><label for="email"> Email: </label></td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="dob"> DOB: </label></td>
                    <td><input type="date" name="dob"></td>
                    <td><label for="type"> Type: </label></td>
                    <td><input type="text" name="type"></td>
                </tr>
                <tr>
                    <td><label for="password"> Password: </label></td>
                    <td>
                        <div style="position: relative;">
                            <input type="password" name="password" id="password">
                            <span id="togglePassword" style="position: absolute; top: 50%; right: 10px; cursor: pointer;">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div class="button-container">
                            <button type="submit" class="save-button">Save</button>
                            <button type="reset" class="reset-button">Reset</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
        <table class="staff-list">
            <tr>
                <th></th>
                <th>No</th>
                <th>Staff Name</th>
                <th>Staff ID</th>
                <th>Password</th>
                <th>Type</th>
                <th>Email ID</th>
                <th>Contact No</th>
                <th>DOB</th>
            </tr>
            <?php
                include('config/db.php');

                $sql = "SELECT * FROM staff";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><button class='select-button' onclick='redirectToFormStaff2(" . $row['StaffID'] . ")'>Select</button></td>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row['StaffName'] . "</td>";
                        echo "<td>" . $row['StaffID'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['ContactNo'] . "</td>";
                        echo "<td>" . $row['DOB'] . "</td>";
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </div>

    <script>
        function redirectToFormStaff2(staffID) {
            window.location.href = 'formstaff2.php?id=' + staffID;
        }

        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
