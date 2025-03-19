<!DOCTYPE html> 
<html lang="en">
<!-- head -->
<head>
	<title>TechCareers Position Descriptions</title>
	<meta charset="utf-8">
	<meta name="description" content="job description">
	<meta name="keywords" content="jobs, frontend, ai">
	<meta name="author" content="Nguyen Xuan Nang Mai"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS style file -->
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/responsive.css" rel="stylesheet">
</head>
<!-- body -->
<body>
    <?php
        include("menu.inc");
        require_once("settings.php");
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        $sql = "SELECT job_name, job_reference, job_description, salary, report_to, responsibilities, essential, preferable FROM jobs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ( $row = $result->fetch_assoc()){
                echo "<div class='job-listing'>";
                echo "<h2>" . htmlspecialchars($row["job_name"]) . " (Reference number: " . htmlspecialchars($row["job_reference"]) . ")</h2>";
                echo "<p><strong>Brief Description:</strong> " . htmlspecialchars($row["job_description"]) . "</p>";
                echo "<p><strong>Salary Range:</strong> " . htmlspecialchars($row["salary"]) . "</p>";
                echo "<p><strong>Reporting To:</strong> " . htmlspecialchars($row["report_to"]) . "</p>";
                echo "<p><strong>Key Responsibilities:</strong></p>";
        echo "<ul>";
        $responsibilities = explode(",", $row["responsibilities"]);
        foreach ($responsibilities as $responsibility) {
            echo "<li>" . htmlspecialchars(trim($responsibility)) . "</li>";
        }
        echo "</ul>";

        echo "<p><strong>Essential:</strong> " . htmlspecialchars($row["essential"]) . "</p>";
        echo "<p><strong>Preferable:</strong> " . htmlspecialchars($row["preferable"]) . "</p>";

        echo "</div>";
        }
    } else {
        echo "<p>No jobs found.</p>";
    }

$conn->close();
    ?>
    <aside>
        <h3>BENEFITS</h3>
        <p><em>What&#39;s attractive about working at TechCareers?</em></p>
        <h3>Health care, insurance</h3>
        <p>We offer comprehensive health insurance policies, work insurance packages, accident insurance, and regular health check-ups to our employees.</p>
        <h3>Creative workspace</h3>                    
        <p>We offers a modern and comfortable workspace for Starters to foster creativity and enhance productivity.</p>
        <h3>Participate in company cultural events</h3>
        <p>We regularly organize bonding activities, entertainment programs and gives gifts and lucky money to employees on holidays/Lunar New Year and special events of the company.</p>
        <h3>Lunch and travel allowances</h3>
        <p>We support monthly lunch money for all employees along with full allowances for travel and business-related expenses.</p>
    </aside>
    <?php
        include("footer.inc");
    ?>
</body>
</html>
