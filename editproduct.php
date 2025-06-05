<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
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

        .container {
            width: auto;
            margin-top: 40px; /* Adjust margin to create space for fixed navigation */
            padding: 20px;
            background-color: #cbc1b8;
            border: solid 0px #000;
        }

        .header {
            background-color: #edeae8;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            border: solid 0px #000;
            border-radius: 20px 20px 5px 5px;
            margin-top: 30px;
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
            padding: 20px;
            border: solid 0px #000;
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

        .editproduct-form input[type="text"],
        .editproduct-form input[type="number"] {
            margin-bottom: 20px; /* This will add a 20px gap below each input field in a form with class 'staff-form' */
        }

        .table1 tr td select {
            width: 95%;
            height: 50px; /* Adjust the height as needed */
            font-size: 20px; /* Adjust the font size as needed */
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            vertical-align: middle;
        }

        .file-upload input[type='file'] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            font-size: 30px; /* Adjust font size as needed */
        }

        .file-upload label {
            display: inline-block;
            background: #3498db;
            color: #fff;
            padding: 5px 5px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 20px;
        }

        .image-preview {
            display: inline-block;
            margin-left: 10px;
            vertical-align: middle;
        }

        .image-preview img {
            max-width: 100px;
            max-height: 100px;
        }
    .arrow-icon {
        color: blue; /* Change color as needed */
        margin-left: 0;  /* Adjust margin as needed */
        margin-right: 5px
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
        <a href="editproduct.php" class="edit-link"><span class="arrow-icon">&#9658;</span> EDIT Product <span class="arrow-icon">&#9664</span>
        <a href="productin.php">NEW INVENTORY</a>
        <a href="productout.php">PRODUCT OUT</a>
        <a href="formstaff.php">EDIT STAFF</a>
    </nav>
    <div class="container">
        <div class="header">Edit Product</div>
        <form method="post" action="insertproduct.php" enctype="multipart/form-data">
            <table class="table1">
                <tr>
                    <td>Current Date:</td>
                    <td><input type="date" name="date" placeholder="YYYY/MM/DD"></td>
                    <td></td>
                    <td>
                        <div class="button-container">
                            <button type="submit" class="save-button">Save</button>
                            <button type="reset" class="reset-button">Reset</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="transactionID"> Transaction ID: </label></td>
                    <td><input type="text" name="transactionID"></td>
                    <td>Image:</td>
                    <td>
                        <div class="file-upload">
                            <input type="file" name="image" id="imageUpload" onchange="previewImage(event)">
                            <label for="imageUpload">Choose Image</label>
                        </div>
                        <div class="image-preview" id="imagePreview">
                            <img src="#" alt="Image Preview" style="display: none;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Product Barcode:</td>
                    <td><input type="text" name="barcode"></td>
                    <td>Standard Cost:</td>
                    <td><input type="text" name="cost"></td>
                </tr>
                <tr>
                    <td>Product Code:</td>
                    <td><input type="text" name="code"></td>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <option value="Frozen Food">Frozen Food</option>
                            <option value="Instant Food">Instant Food</option>
                            <option value="Convenience Food">Convenience Food</option>
                            <option value="Bakery Product">Bakery Product</option>
                            <option value="Snack">Snack</option>
                            <option value="Daily Necessity">Daily Necessity</option>
                            <option value="Soda">Soda</option>
                            <option value="Alcoholic Drink">Alcoholic Drink</option>
                            <option value="Other Drink">Other Drink</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description"></td>
                    <td>Unit Price:</td>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <td>Quantity:</td>
                    <td><input type="number" name="quantity"></td>
                    <td>Supplier ID:</td>
                    <td><input type="text" name="supplierId"></td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewImg = imagePreview.querySelector('img');

            reader.onload = function() {
                imagePreviewImg.src = reader.result;
                imagePreviewImg.style.display = 'block';
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>