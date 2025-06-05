<?php
include('config/db.php');

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    if (isset($_POST['product_ids'])) {
        // Check if JavaScript confirmation is received
        if (isset($_POST['confirm_delete'])) {
            if ($_POST['confirm_delete'] == 'yes') {
                foreach ($_POST['product_ids'] as $product_id) {
                    $product_id = mysqli_real_escape_string($conn, $product_id);
                    $sql = "DELETE FROM product WHERE ProductCode = '$product_id'";
                    if (!mysqli_query($conn, $sql)) {
                        // Error occurred
                        echo "console.log('Error deleting product with ID: $product_id');";
                    }
                }
                // Redirect back to the previous page after deletion
                header("Location: table.php");
                exit();
            } else {
                // User canceled, go back to table.php
                header("Location: table.php");
                exit();
            }
        }
?>
<!-- HTML form to display confirmation popup -->
<script>
    // JavaScript function to display confirmation popup
    function confirmDelete() {
        var result = confirm("Are you sure you want to delete this data?");
        if (result) {
            // If user confirms, submit the form with confirmation flag
            document.getElementById('delete_form').submit();
        } else {
            // If user cancels, redirect to table.php
            window.location.href = 'table.php';
        }
    }
</script>

<!-- Display form for delete confirmation -->
<form id="delete_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!-- Pass the selected product IDs for deletion -->
    <input type="hidden" name="product_ids[]" value="<?php echo implode(',', $_POST['product_ids']); ?>">
    <!-- Pass action as delete -->
    <input type="hidden" name="action" value="delete">
    <!-- Pass a flag for confirmation -->
    <input type="hidden" name="confirm_delete" value="yes">
</form>

<!-- Display the confirmation popup when the page loads -->
<script>
    window.onload = function() {
        confirmDelete();
    };
</script>
<?php
    } else {
        echo "No products selected for deletion.";
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>




