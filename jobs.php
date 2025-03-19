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

        $sql = "SELECT job_name, job_reference, job_description, salary, report_to, responsibilities, res_details, essential, essential_details, preferable FROM jobs";
        $result = $conn->query($sql);
    ?>

    <!-- Animation Container -->
    <section class="animation">

        <!-- Jobs.html Page Container -->
        <section class="jobs">

            <!-- Main Content Container -->
            <section class="jobs-content">

    <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo "<h2>" . htmlspecialchars($row["job_name"]) . " (Reference number: " . htmlspecialchars($row["job_reference"]) . ")</h2>";
                echo "<p><strong>Brief Description:</strong> " . htmlspecialchars($row["job_description"]) . "</p>";
                echo "<p><strong>Salary Range:</strong> " . htmlspecialchars($row["salary"]) . "</p>";
                echo "<p><strong>Reporting To:</strong> " . htmlspecialchars($row["report_to"]) . "</p>";
                echo "<section class=\"responsibilities\">";
                echo "<p><strong>Key Responsibilities:</strong></p>";
                echo "<ul>";

                // Explode the responsibilities and sub-details
                $responsibilities = explode("{", $row["responsibilities"]);
                $responsibility_details = isset($row["res_details"]) ? explode("{", $row["res_details"]) : [];

                // Ensure both arrays have the same length to avoid undefined index errors
                $max = min(count($responsibilities), count($responsibility_details));

                // Loop through responsibilities and pair them with their corresponding sub-details
                for ($i = 0; $i < $max; $i++) {
                    // Print the main responsibility
                    $responsibility = trim($responsibilities[$i]);
                    if (!empty($responsibility)) {
                        echo "<li>" . htmlspecialchars($responsibility) . "</li>";
                        
                        // Print the corresponding sub-detail (if it exists)
                        if (isset($responsibility_details[$i])) {
                            $detail = trim($responsibility_details[$i]);
                            if (!empty($detail)) {
                                echo "<ul>";
                                echo "<li>" . htmlspecialchars($detail) . "</li>";
                                echo "</ul>";
                            }
                        }
                    }
                }
                echo "</ul>";
            
    ?>
        </section>

    <?php
        echo "<section class=\"essential\">";
        echo "<p><strong>Essential:</strong></p>";
                echo "<ul>";

                // Explode the responsibilities and sub-details
                $essentials = explode("{", $row["essential"]);
                $essential_details = isset($row["essential_details"]) ? explode("{", $row["essential_details"]) : [];

                // Ensure both arrays have the same length to avoid undefined index errors
                $max = min(count($essentials), count($essential_details));

                // Loop through responsibilities and pair them with their corresponding sub-details
                for ($i = 0; $i < $max; $i++) {
                    // Print the main responsibility
                    $essential = trim($responsibilities[$i]);
                    if (!empty($essential)) {
                        echo "<li>" . htmlspecialchars($essential) . "</li>";
                        
                        // Print the corresponding sub-detail (if it exists)
                        if (isset($essential_details[$i])) {
                            $detail = trim($essential_details[$i]);
                            if (!empty($detail)) {
                                echo "<ul>";
                                echo "<li>" . htmlspecialchars($detail) . "</li>";
                                echo "</ul>";
                            }
                        }
                    }
                }
                echo "</ul>";
        echo "</section>";
        echo "<section class=\"preferable\">";
        echo "<p><strong>Preferable:</strong></p>";

        echo "<ul>";
        $preferables = explode("{", $row["preferable"]);
        foreach ($preferables as $preferable) {
            echo "<li>" . htmlspecialchars(trim($preferable)) . "</li>";
        }
        echo "</ul>";
    }

    } else {
        echo "<p>No jobs found.</p>";
    }

    $conn->close();
    ?>
    </section>
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
        </section>
    </section>

    <?php
        include("footer.inc");
    ?>
</body>
</html>