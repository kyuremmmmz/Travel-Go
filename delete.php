<?php
include("connection.php");

// Check if the form is submitted
if(isset($_POST['delete'])) {
    // Check if any checkboxes are selected
    if(isset($_POST['delete_checkbox'])) {
        // Loop through the selected checkboxes
        foreach($_POST['delete_checkbox'] as $selected_id) {
            // Sanitize the ID to prevent SQL injection
            $id = mysqli_real_escape_string($conn, $selected_id);

            // Construct the DELETE query
            $query = "DELETE FROM booking_tracker WHERE id = '$id'";

            // Execute the DELETE query
            if (mysqli_query($conn, $query)) {
                // Record deleted successfully
            } else {
                // Handle errors if deletion fails
                echo "Error deleting record with ID $id: " . mysqli_error($conn) . "<br>";
            }
        }
    } else {
        echo "No records selected for deletion.";
    }
}

// Fetch all bookings from the database
$query = "SELECT * FROM booking_tracker";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .container {
            max-width: 800px;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .btn-danger {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Records</h2>
        <form method="post" action="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <!-- Add other table headers as needed -->
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <!-- Add other table data as needed -->
                        <td><input type="checkbox" name="delete_checkbox[]" value="<?php echo $row['id']; ?>"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger" name="delete">Delete Selected Records</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

