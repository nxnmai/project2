<!DOCTYPE html> 
<html lang="en">
<!-- head -->
<head>
	<title>PHP Enhancements</title>
	<meta charset="utf-8">
	<meta name="description" content="list and describe the php enhancements that have been made to the manage.php webpage.">
	<meta name="keywords" content="techniques, enhancements, sort, features, implement, eois, ,table, database">
	<meta name="author" content="Bui Minh Duc, Le Quang Dinh, Nguyen Xuan Nang Mai"> 
	<!-- CSS style file -->
	<link rel="stylesheet" href="styles/style.css">
</head>
<!-- body -->
<body>
	<!-- Animation Container -->
	<section class="animation">

		<!-- borrow css styles from job descriptions page -->
		<section class="jobs">

			<!-- borrow css styles from main content of job descriptions page -->
			<section class="jobs-content">
				<h1>PHP Enhancements</h1>
				<!-- PHP enhancements made on page manage.php -->
				<h2>Select a field to sort the order in which all EOI records are displayed</h2>
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
						// Get sort field from form, default to EOInumber if not set
						$sort_field = isset($_POST['sort_field']) ? $conn->real_escape_string($_POST['sort_field']) : 'EOInumber';  // sanitized user input to prevent SQL injection
						// Validate sort field to prevent SQL injection
						$valid_sort_fields = ['EOInumber', 'job_reference', 'first_name', 'last_name', 'status'];
						if (!in_array($sort_field, $valid_sort_fields)) {
							$sort_field = 'EOInumber'; // Default fallback
						}
						// List all EOIs in order of sort_field
						$query = "SELECT * FROM eoi ORDER BY $sort_field ASC";
						$result = $conn->query($query);
					}
				}
				?>

				<!-- Form for listing all EOIs with sorting -->
				<h3><em>List All EOIs</em></h3>
				<form method="post">
					<label class="label" for="sort_field">Sort by:</label>
					<select id="sort_field" name="sort_field">
						<option value="EOInumber">EOI Number</option>
						<option value="job_reference">Job Reference</option>
						<option value="first_name">First Name</option>
						<option value="last_name">Last Name</option>
						<option value="status">Status</option>
					</select>
					<br>
					<br>
					<input type="hidden" name="action" value="list_all">
					<input type="submit" value="Show All EOIs">
				</form>
			</section>
		</section>

				<!-- Display results -->
				<?php if (is_object($result) && $result->num_rows > 0) { ?>
				<h3><em>Results</em></h3>
				<div class="table-container">
					<table class="manage_table">
						<tr>
							<th>EOI Number</th>
							<th>Job Reference</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Birthday</th>
							<th>Gender</th>
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
								<td><?php echo $row['birthday']; ?></td>
								<td><?php echo $row['gender']; ?></td>
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
				<?php }
				// Close the database connection
				$conn->close();
				?>

		<!-- borrow css styles from job descriptions page -->
		<section class="jobs">

			<!-- borrow css styles from main content of job descriptions page -->
			<section class="jobs-content">	
				<h3><em>PHP code for processing:</em></h3>
				<pre><code>
		if ($action === 'list_all') {
			// Get sort field from form, default to EOInumber if not set
			$sort_field = isset($_POST['sort_field']) ? $conn->real_escape_string($_POST['sort_field']) : 'EOInumber';  // sanitized user input to prevent SQL injection
			
			// Validate sort field to prevent SQL injection
			$valid_sort_fields = ['EOInumber', 'job_reference', 'first_name', 'last_name', 'status'];
			
			if (!in_array($sort_field, $valid_sort_fields)) {
				$sort_field = 'EOInumber'; // Default fallback
			}

			// List all EOIs in order of sort_field
			$query = "SELECT * FROM eoi ORDER BY $sort_field ASC";
			$result = $conn->query($query);		
		}				
				</code></pre>

				<h3><em>HTML code of the form to select which field to sort in ascending order:</em></h3>
				<pre><code>
		&lt;!-- Form for listing all EOIs with sorting --&gt;
		&lt;h2 class=&quot;manage&quot;&gt;List All EOIs&lt;/h2&gt;
		&lt;form method=&quot;post&quot;&gt;
			&lt;label class=&quot;label&quot; for=&quot;sort_field&quot;&gt;Sort by:&lt;/label&gt;
			&lt;select id=&quot;sort_field&quot; name=&quot;sort_field&quot;&gt;
				&lt;option value=&quot;EOInumber&quot;&gt;EOI Number&lt;/option&gt;
				&lt;option value=&quot;job_reference&quot;&gt;Job Reference&lt;/option&gt;
				&lt;option value=&quot;first_name&quot;&gt;First Name&lt;/option&gt;
				&lt;option value=&quot;last_name&quot;&gt;Last Name&lt;/option&gt;
				&lt;option value=&quot;status&quot;&gt;Status&lt;/option&gt;
			&lt;/select&gt;
			&lt;br&gt;
			&lt;br&gt;
			&lt;input type=&quot;hidden&quot; name=&quot;action&quot; value=&quot;list_all&quot;&gt;
			&lt;input type=&quot;submit&quot; value=&quot;Show All EOIs&quot;&gt;
		&lt;/form&gt;
				</code></pre>

				<!-- description for the sorting enhancement -->
				<p><em><strong>Feature:</strong></em> Added ability for HR manager to sort EOI records by different fields</p>
				<p><em><strong>Implementation:</strong></em></p>
				<ul>
					<li>Added dropdown menu to "List All EOIs" form with options to sort: EOI Number, Job Reference, First Name, Last Name, and Status</li>
					<li>Modified PHP logic to handle sort field selection safely using <em>real_escape_string</em></li>
					<li>Validated <em>$sort_field</em> against an array of allowed values <em>$valid_sort_fields</em> to prevent SQL injection</li>
					<li>Added <em>ORDER BY</em> clause to the SQL query with the selected sort field with a specified ascending order <em>ASC</em></li>
				</ul>
				<p><em><strong>Benefit:</strong></em> Allows HR manager to view EOI records in their preferred order, improving usability and data analysis</p>
				<p><em><strong>References:</strong></em> <a href="https://www.w3schools.com/sql/sql_orderby.asp">sort the fields in ascending order</a>.</p>
			</section>
		</section>
	</section>
</body>
</html>