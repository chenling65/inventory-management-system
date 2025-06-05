<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Set background image */
            background-image: url('background.png'); /* Update with your image path */
            background-size: cover;
            background-position: center;
        }

        .login-box {
            width: 400px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 1); /* Change alpha value to 1 for full opacity */
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center align content */
            border: 4px solid black;
        }

        .login-box label {
            display: inline-block;
            width: 100px; /* Adjust width as needed */
            text-align: right;
            margin-right: 10px;
            font-size: 14px; /* Adjust font size */
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: calc(100% - 120px); /* Adjust width as needed */
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none; /* Remove outline */
            border: none; /* Remove border */
        }

        .login-box input[type="submit"],
        .login-box input[type="reset"] {
            width: 40%; /* Adjust width as needed */
            padding: 8px; /* Adjust padding */
            margin: 10px 5px; /* Add margin between buttons */
            cursor: pointer;
            display: inline-block; /* Make buttons inline elements */
            font-size: 16px; /* Adjust font size */
            font-weight: bold;
            background-color: #45a049; /* Set background color */
            transition: background-color 0.3s; /* Smooth color transition */

        }

        .login-box input[type="reset"] {
            background-color: #ffd300; /* Change to yellow */
        }

        .login-box input[type="submit"]:hover,
        .login-box input[type="reset"]:hover {
            background-color: red; /* Change hover background color */
        }
    </style>
</head>
<body>

    <div class="login-box">
        <form action="checklogin.php" method="POST">
            <label for="staffName"><b>STAFF NAME:</b></label>
            <input type="text" name="staffName" value=""><br>

            <label for="staffID"><b>STAFF ID:</b></label>
            <input type="text" name="staffID"><br>

            <label for="password"><b>STAFF PASSWORD:</b></label>
            <input type="password" name="password"><br>

            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </form>
    </div>

</body>
</html>



