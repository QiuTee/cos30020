<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <title>Assigmnet 1</title>
</head>
<body>
    
    <?php 
        $page = 'indexpage'; 
        include('include/header.php');
    ?>
<section>   
    <div class ="info">
        <h2>Job Vacancy Posting System</h2>
        <p><strong>Name:</strong> Nguyen Quoc Thang</p>
        <p><strong>Student ID:</strong> 104193360</p>
        <p><strong>Email:</strong> <a class ="link" href="104193360@student.swin.edu.au"> 104193360@student.swin.edu.au</a></p>
        <p><i>I declare that this assignment is my individual work. I have not worked collaboratively nor have I copied
from any other student’s work or from any other source</i></p>
        <div class="contain">
            <a href="postjobform.php"> Post a job vacancy</a>
            <a href="searchjobform.php"> Search for a job vacancy</a>
            <a href="about.php"> About this assignment</a>
        </div>
    </div>   
</section>
<?php 
    include_once('include/footer.php')
?>
</body>
</html>