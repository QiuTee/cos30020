<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/f30e8be6f4.js" crossorigin="anonymous"></script>
    <title>About</title>
</head>
<body>
    <?php 
        $version = phpversion();
        $page = 'about';
        include_once ('include/header.php');
    ?>
    <div class="about">
       <div class="qna">
            <h2>What is the PHP version installed in mercury?</h2>
            <p><i>The PHP version installed in mercury is: <?php echo $version ?></i><p>
            <br />
            <h2>What tasks you have not attempted or not completed? </h2>
            <ul>
            <li><i>Task 8 - I cannot sort the time of the title form the most future closing date until today's date.</i>  </li>
            </ul>
            <br />
            <h2>What special features have you done, or attempted, in creating the site that we should know about? </h2>
            <ul>
                <li>Separate header.php and footer.php for common site use.</li>
                <li>Using nav.php to display result. </li>
                <li>Using $errMsg to contain and manage error. </li>
                <li>Change button position on page change</li>
            </ul>
            <br />
            <h2>What discussion points did you participated on in the unit’s discussion board for Assignment 1? If you did not participate, state your reason</h2>
            <ul>
            <li>I joined discusion with the instructor in <span> <a href='https://swinburne.instructure.com/courses/52562/discussion_topics/1116908'> Canvas </a> <span>by answering questions the teacher posed </li>
            </ul>
            <img src="image/screenshot.png" style=“width:400px;height:300px;” >
            <div class = "about2">
            <p><a  href=index.php> Home Page</a></p>
            </div>

       </div>
       
    </div>
    <?php 
        include_once ('include/footer.php');
    ?>
</body>
</html>