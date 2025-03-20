<?php
    // Include database connection settings
    require_once "settings.php";

    // Establish database connection using mysqli (oop)
    $conn = new mysqli($host, $user, $pwd, $sql_db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submissions
    $action = isset($_POST['action']) ? $_POST['action'] : '';  // to determine which query the manager wants to run
    $result = '';   // store the outcome of database operations

    // Perform actions based on user input
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($action === 'list_all') {
            // List all EOIs
            $query = "SELECT * FROM eoi";
            $result = $conn->query($query);
        } elseif ($action === 'list_by_job') {
            // List EOIs by job reference
            $job_ref = $conn->real_escape_string($_POST['job_ref']);    // sanitized user input to prevent SQL injection
            $query = "SELECT * FROM eoi WHERE job_reference = '$job_ref'";
            $result = $conn->query($query);
        } elseif ($action === 'list_by_name') {
            // List EOIs by applicant name
            $firstname = $conn->real_escape_string($_POST['first_name']);  // sanitized user input to prevent SQL injection
            $lastname = $conn->real_escape_string($_POST['last_name']);    // sanitized user input to prevent SQL injection
            $query = "SELECT * FROM eoi WHERE first_name LIKE '%$firstname%' AND last_name LIKE '%$lastname%'";
            $result = $conn->query($query);
        } elseif ($action === 'delete_by_job') {
            // Delete EOIs by job reference number
            $job_ref = $conn->real_escape_string($_POST['job_ref_delete']); // sanitized user input to prevent SQL injection
            $query = "DELETE FROM eoi WHERE job_reference = '$job_ref'";
            if ($conn->query($query) === TRUE) {
                $result = "EOIs with Job Reference Number '$job_ref' deleted successfully.";
            } else {
                $result = "Error deleting EOIs: " . $conn->error;
            }
        } elseif ($action === 'update_status') {
            // Change the status of an EOI
            $eoi_number = $conn->real_escape_string($_POST['eoi_number']);  // sanitized user input to prevent SQL injection
            $new_status = $conn->real_escape_string($_POST['status']);  // sanitized user input to prevent SQL injection
            $query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = '$eoi_number'";
            if ($conn->query($query) === TRUE) {
                $result = "Status of EOI #$eoi_number updated to '$new_status'.";
            } else {
                $result = "Error updating status: " . $conn->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="HR Manager Queries">
	<meta name="keywords"    content="hr, manager, queries">
	<meta name="author"      content="Grilled Octopus">
    <title>HR Manager - Manage EOIs</title>
    <!-- CSS style file -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'menu.inc'; ?>

    <h1 class="manage_title">HR Manager - Manage Expressions of Interest</h1>
    
    <!-- Form for listing all EOIs -->
    <h2 class="manage">List All EOIs</h2>
    <form method="post">
        <input type="hidden" name="action" value="list_all">
        <input type="submit" value="Show All EOIs">
    </form>

    <!-- Form for listing EOIs by job reference -->
    <h2 class="manage">List EOIs by Job Reference Number</h2>
    <form method="post">
        <label class="label" for="job_ref">Job Reference Number:</label>
        <input type="text" id="job_ref" name="job_ref" required> <br> <br>
        <input type="hidden" name="action" value="list_by_job">
        <input type="submit" value="Search">
    </form>

    <!-- Form for listing EOIs by applicant name -->
    <h2 class="manage">List EOIs by Applicant Name</h2>
    <form method="post">
        <label class="label" for="first_name">First Name:</label>
        <input class="name" type="text" id="first_name" name="first_name"> <br>
        <label class="label" for="last_name">Last Name:</label>
        <input class="name" type="text" id="last_name" name="last_name">
        <input type="hidden" name="action" value="list_by_name"> <br>
        <input type="submit" value="Search">
    </form>

    <!-- Form for deleting EOIs by job reference -->
    <h2 class="manage">Delete EOIs by Job Reference Number</h2>
    <form method="post">
        <label class="label" for="job_ref_delete">Job Reference Number:</label>
        <input type="text" id="job_ref_delete" name="job_ref_delete" required> <br> <br>
        <input type="hidden" name="action" value="delete_by_job">
        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete all EOIs for this job reference?');">
    </form>

    <!-- Form for updating EOI status -->
    <h2 class="manage">Change EOI Status</h2>
    <form method="post">
        <label class="label" for="eoi_number">EOI Number:</label>
        <input class="name" type="number" id="eoi_number" name="eoi_number" required> <br>
        <label class="label" for="status">New Status:</label>
        <select id="status" name="status" required>
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select> <br> <br>
        <input type="hidden" name="action" value="update_status">
        <input type="submit" value="Update Status">
    </form>

    <!-- Display results -->
    <?php if (is_object($result) && $result->num_rows > 0) { ?>
        <h2 class="manage">Results</h2>
        <div class="table-container">
            <table class="manage_table">
                <tr>
                    <th>EOI Number</th>
                    <th>Job Reference</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Street Address</th>
                    <th>Suburb/town</th>
                    <th>State</th>
                    <th>Postcode</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of Frontend Developer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Skill of AI Engineer</th>
                    <th>Other skills</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['EOInumber']; ?></td>
                        <td><?php echo $row['job_reference']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['street_address']; ?></td>
                        <td><?php echo $row['suburb']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['postcode']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['FTD23_skill1']; ?></td>
                        <td><?php echo $row['FTD23_skill2']; ?></td>
                        <td><?php echo $row['FTD23_skill3']; ?></td>
                        <td><?php echo $row['FTD23_skill4']; ?></td>
                        <td><?php echo $row['FTD23_skill5']; ?></td>
                        <td><?php echo $row['FTD23_skill6']; ?></td>
                        <td><?php echo $row['FTD23_skill7']; ?></td>
                        <td><?php echo $row['FTD23_skill8']; ?></td>
                        <td><?php echo $row['FTD23_skill9']; ?></td>
                        <td><?php echo $row['AIE45_skill1']; ?></td>
                        <td><?php echo $row['AIE45_skill2']; ?></td>
                        <td><?php echo $row['AIE45_skill3']; ?></td>
                        <td><?php echo $row['AIE45_skill4']; ?></td>
                        <td><?php echo $row['AIE45_skill5']; ?></td>
                        <td><?php echo $row['AIE45_skill6']; ?></td>
                        <td><?php echo $row['AIE45_skill7']; ?></td>
                        <td><?php echo $row['other_skills']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <br>
    <?php } elseif (is_string($result) && !empty($result)) { ?>
        <p><?php echo $result; ?></p>
    <?php } elseif (is_object($result) && $result->num_rows === 0) { ?>
        <p>No records found.</p>
    <?php } ?>

    <?php include 'footer.inc'; ?>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>