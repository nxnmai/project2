<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <title>About us</title>
</head>
<body class="about_page">
    <div id="banner">
    <?php
        include("menu.inc");
    ?>
    </div>
    
    <div class="about">
        <dl>
            <dt id="tutor">Tutor: Tristan</dt>
            <dt>Nguyen Xuan Nang Mai --- s105549980 --- 105549980@student.swin.edu.au</dt> 
                <dd>Team captain, working on job-descriptions page</dd>
            <dt>Le Quang Dinh --- s105543296 --- 105543296@student.swin.edu.au</dt>  
                <dd>Team member, working on application form</dd>
            <dt>Bui Minh Duc --- s105691917 --- 105691917@student.swin.edu.au</dt> 
                <dd>Team member, working on index and about pages</dd>       
        </dl>
        <table class="timetable">
            <caption>Days and session times</caption>
                <tr>
                    <td>Class</td>
                    <td>Day</td>
                    <td>Time</td>
                </tr>
                <tr>
                    <td>COS10026: Web Technology Project</td>
                    <td>Monday</td>
                    <td>13:00pm - 17:00pm</td>
                </tr>
                <tr>
                    <td>TNE10006: Networks and Switching</td>
                    <td>Wednesday</td>
                    <td>13:00pm - 17:00pm</td>
                </tr>
    
        </table> <!--No idea what to do with this-->
    </div>
    <dl id="add">   <!--add-->
        <dt>Additional skills</dt>
        <dt>Nguyen Xuan Nang Mai:</dt>
            <dd>I am a freshman at Swinburne University in Ho Chi Minh City, currently pursuing a degree in Artificial Intelligence. With a strong passion for AI, math, and logical problem-solving, I am dedicated to developing my programming skills, particularly in languages like Ruby and Python. My interests extend beyond academics to sports and fitness, which help me maintain a balanced lifestyle. I am currently working on improving my analytical and problem-solving skills to excel as an AI engineer and aim to secure a part-time job in IT, preferably in AI or machine learning. My learning approach involves self-study, online resources, and AI tools, as I navigate the challenges of time management with university coursework and personal responsibilities.</dd>
        <dt>Le Quang Dinh</dt>
            <dd>I am a first year student at Swinburne University in Ho Chi Minh City, and my major is Data Science. I’m currently working on defining myself and improving thinking skills to look for better approaches in studying unique perspectives and in life.</dd>
        <dt>Bui Minh Duc</dt>
            <dd>As a freshman in the IoT program at Swinburne, I'm thrilled to be part of such a dynamic and forward-thinking community.  I've always been fascinated by how technology can connect us and improve our lives, and I'm eager to learn the skills needed to bring my own ideas to life. For coding, I have earned the knowledge of basic coding language such as HTML, CSS and PHP. </dd>        
    </dl>
    

    <div class="contributions">
        <img src="images/group-photo.jpg" id="group-photo" alt="group photo"> <!--group photo-->
        <section>
            <h2>Contributions</h2>
            <p>Nguyen Xuan Nang Mai: Database Connection (setting.php), HR Management Page (manage.php) and Finalizing &#38; Uploading.</p>
            <p>Le Quang Dinh: Create the EOI table in MySQL (eoi table), Implement process_eoi.php and Disable client-side validation (novalidate) in forms.</p>
            <p>Bui Minh Duc: Convert existing HTML to PHP and implement include statements, Update the 'About' page (about.php), Style the website (CSS updates for job.php and manage.php) and Jobs Description Page (jobs.php) supported by Captain Nang Mai</p>
            <h2>Shared responsibilities</h2>
            <p>Enhancements (phpenhancements.html / phpenhancements.php), Group Presentation (Week 12) and Testing &#38; Debugging before submission.</p>
        </section>
    </div>
    
    <?php
        include("footer.inc");
    ?>
</body>
</html>