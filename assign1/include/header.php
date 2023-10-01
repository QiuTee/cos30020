<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/f30e8be6f4.js" crossorigin="anonymous"></script>
    <title>Job Vancancy Posting System</title>
</head>
<body>
    <header>
        <nav>
        
        <div class="main-logo">
        <a href="index.php"><span class="logo">J</span>POS</a>
       </div>
       <div class="page">
            <ul>
                <li><a href="index.php"<?php echo ($page == "indexpage") ? "class='selected'" : ""; ?>>Home</a></li>
                <li><a href="postjobform.php"<?php echo ($page == "postjob") ? "class='selected'" : ""; ?>>Post job </a></li>
                <li><a href="searchjobform.php"<?php echo ($page == "searchjob") ? "class='selected'" : ""; ?>> Search </a></li>
                <li><a href="about.php"<?php echo ($page == "about") ? "class='selected'" : ""; ?>> About </a></li>
            </ul>
       </div>
        <div class="click">
                <ul>
                    <li><a href="https://www.facebook.com/thang.nguyenquoc.9883739/"><i class="fa-brands fa-facebook"></a></i></li>
                    <li><a href="https://www.instagram.com/nqthang13/"><i class="fa-brands fa-instagram"></a></i></li>
                    <li><i class="fa-solid fa-phone"></i> Hotline: 0913833508</li>
                </ul>
        </div>
        </nav>
       
    </header>
</body>
</html>