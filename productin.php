<?php
include('config/db.php');


// Fetch product codes from the database
$sql = "SELECT ProductCode, UnitPrice FROM product";
$result = mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>New Inventory</title>

  <script>
    function calculateTax() {
        var taxInput = document.querySelector('input[name="tax"]');
        var formula = taxInput.value.trim();

        // Check if the formula is not empty
        if (formula !== '') {
            try {
                // Use eval() to evaluate the formula and calculate the tax
                var tax = eval(formula);
                // Update the tax input field with the calculated tax value
                taxInput.value = 'RM ' + tax.toFixed(2);
            } catch (error) {
                // Handle any errors that occur during evaluation
                alert('Error: Invalid formula');
            }
        } else {
            alert('Error: Please enter a formula to calculate tax');
        }
    }
    function calculateSubtotal() {
        var subtotalInput = document.querySelector('input[name="subtotal"]');
        var formula = subtotalInput.value.trim();

        // Check if the formula is not empty
        if (formula !== '') {
            try {
                // Use eval() to evaluate the formula and calculate the subtotal
                var subtotal = eval(formula);
                // Update the subtotal input field with the calculated subtotal value
                subtotalInput.value = 'RM ' + subtotal.toFixed(2);
            } catch (error) {
                // Handle any errors that occur during evaluation
                alert('Error: Invalid formula');
            }
        } else {
            alert('Error: Please enter a formula to calculate subtotal');
        }
    }
    function calculateTotal() {
        var subtotalInput = document.querySelector('input[name="standardcost"]');
        var formula = subtotalInput.value.trim();

        // Check if the formula is not empty
        if (formula !== '') {
            try {

                var total = eval(formula);

                subtotalInput.value =  total.toFixed(2);
            } catch (error) {
                // Handle any errors that occur during evaluation
                alert('Error: Invalid formula');
            }
        } else {
            alert('Error: Please enter a formula to calculate total');
        }
    }

</script>
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
    .arrow-icon {
        color: blue; /* Change color as needed */
        margin-left: 0; /* Adjust margin as needed */
        margin-right: 5px;
    }

    .edit-link {
        color: blue; /* Change color as needed */
    }

    .container {
      width: 100%;
      height: 100vh;
      padding: 20px;
      border: solid 2px #ccc;
      background-color: #cbc1b8;
      box-sizing: border-box;
    }
    .columns-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }
    .column {
      flex: 1;
      padding: 20px;
      border: solid 2px #ccc;
      background-color: #fff;
      box-sizing: border-box;

    }


    .categories-container {
      display: flex;
      flex-direction: column;
      gap: 10px; /* Adjust the gap between buttons */
      align-items: center;

      
    }

    .categories-container button {
      width: 50%;
      padding: 15px ; /* Adjust padding as needed */
      border: none;
      background-color: #cfcfcd;
      cursor: pointer;
      font-size: 18px; /* Adjust font size as needed */
      border-radius: 30px;
      transition: background-color 0.3s, color 0.3s; /* Add smooth transition effects */
      border: 2px solid black;
      font-weight: bold;
    }


    .categories-container button:hover {
      background-color: #e0e0e0; /* Change background color on hover */
      color: #333; /* Change text color on hover */
    }

    .inventory-table,
    .cost-receipt-table {
      width: 100%;
    }
.inventory-table input[type="text"] {
    width: 50%;
    padding: 10px;
    font-size: 18px;
    margin: 0 auto; /* Add this line to center the input box horizontally */
    display: block; /* Add this line to ensure the input box takes up the full width */
}


    .cost-receipt-table input[type="text"] {
      width: calc(100% - 40px);
      padding: 10px;
      font-size: 20px;
    }
    .button-container {
      margin-top: 40px;
      text-align: left;
    }
    .button-container button {
      padding: 8px 16px;
      margin-left: 40px;
      border: 2px solid black;
      cursor: pointer;
      font-size: 20px;
    }
    .save-button {
      background-color: green;
      color: white;
    }
    .reset-button {
      background-color: red;
      color: white;
    }
    .header {
      margin-top: 30px;
      padding: 20px;
      text-align: center;
      font-weight: bold;
      font-size: 30px;
        }
    .h1 {
      margin-bottom: 20px;
      padding: 20px;
      text-align: center;
      font-weight: bold;
      font-size: 50px;
    }

  </style>
</head>
<body>
    <nav>
        <a href="dashboard.php">DASHBOARD</a>
        <a href="itemcategory.php">ITEM CATEGORY</a>
        <a href="editproduct.php">EDIT PRODUCT</a>
        <a href="productin.php" class="edit-link"><span class="arrow-icon">&#9658;</span> NEW INVENTORY <span class="arrow-icon">&#9664</span></a>
        <a href="productout.php">PRODUCT OUT</a>
        <a href="formstaff.php">EDIT STAFF</a>

    </nav>
  <div class="container">
    <header class="header">New Inventory</header>
    <form action="updatequantities.php" method="POST">
        <div class="columns-container">
            <div class="column" id="categories-column">
                <h1><center>Categories</center></h1>
                <div class="categories-container">
                    <button>Frozen Food</button>
                    <button>Instant Food</button>
                    <button>Convenience Food</button>
                    <button>Snack</button>
                    <button>Soda</button>
                    <button>Daily Necessity</button>
                </div>
            </div>
            <div class="column" id="inventory-column">
                <h1><center>Inventory</center></h1>
                <table class="inventory-table">
                    <?php
                    // Check if there are any results
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $productCodeFromDatabase = $row['ProductCode'];
                            $unitPriceFromDatabase = $row['UnitPrice'];
                            // Here you can display the product code in the inventory table
                            echo "<tr>";
                           echo "<td><input type='radio' name='selectedItem' value='" . $productCodeFromDatabase . "'></td>";

                            echo "<td>" . $productCodeFromDatabase . "</td>";
                            echo "<td style='color: brown; padding-left: 10px;'>RM " . $unitPriceFromDatabase . "</td>";



                            echo "<td><input type='text' name='quantity" . $productCodeFromDatabase . "' placeholder='0'></td>";


                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>0 results</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="column" id="cost-receipt-column">
                <h1><center>Cost and Receipt</center></h1>
                <table class="cost-receipt-table">
                <tr>
                    <td>Date:</td>
                    <td>
                        <input type="date" name="date" placeholder="Enter Date" style="font-size: 15px;width: 88%; height: 45px;">
                    </td>
                </tr>
                <tr>
                    <td>Tax (6%):</td>
                    <td>
                        <input type="text" name="tax" placeholder="Sub Total * 0.06" style="font-size: 15px;">
                        <button type="button" onclick="calculateTax()">
                            <i class="fas fa-calculator"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Sub Total:</td>
                    <td>
                        <input type="text" name="subtotal" placeholder="Unit Price * Quantities" style="font-size: 15px;">
                        <button type="button" onclick="calculateSubtotal()">
                            <i class="fas fa-calculator"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Standard Cost:</td>
                    <td>
                        <input type="text" name="standardcost" placeholder="Sub Total - Tax" style="font-size: 15px;">
                        <button type="button" onclick="calculateTotal()">
                            <i class="fas fa-calculator"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Additional:</td>
                    <td>
                        <input type="text" name="remarks" placeholder="REMARKS" style="font-size: 15px; width: 305px; height: 200px; text-align: center;">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="button-container">
                            <button type="submit" class="save-button">Save</button>
                            <button type="reset" class="reset-button">Reset</button>
                        </div>
                    </td>
                </tr>
                </table>
            </div>
        </div>
    </form>
    
</body>
</html>