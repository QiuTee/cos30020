<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <title>PostJobForm</title>
   
</head>

<body>
    <?php 
        $page = 'postjob';
        include_once ('include/header.php');
    ?>
    <div class="pst-form">
        <h2><span>Job Vacancy Posting System</span></h2>
        <form action="postjobprocess.php" method="POST">
            <div class = "input-field" >
                <label for="posID">Position ID:</label> 
                <input type="text" name="posID" id = "posID">
            </div>
            <div class = "input-field">
                <label for="position-id">Tittle:</label> 
                <input type="text" name="title" id = "title">
            </div>
            <div class = "input-field">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="77" rows="5"></textarea>
            </div>
            <div class = "input-field1">
                <label for="dated">Closing Date:</label>
                <input type="text" name="date" id = "date" value ="<?php echo date('d/m/Y')?>">
            </div>
            <div class = "input-field">
                <label for="position">Position: </label>
                <input type="radio" name="position" value= "Full Time" id="position">Full Time
                <input type="radio" name="position" value="Part Time" id="position">Part Time
            </div>
            <div class = "input-field">
                <label for="contact">Contact:</label>
                <input type="radio" name="contact" value = "On-going" id="contact">On-going
                <input type="radio" name="contact" value="Fixed term" id="contact">Fixed Term
            </div>
            <div class = "input-field">
                <label for="app">Application by: </label>
                <input type="checkbox" name="apps[]" value="Post" id="post">Post
                <input type="checkbox" name="apps[]" value="Mail" id="mail">Mail
            </div>
            <div class = "input-field">
                
                Location:<select name="loc" id="loc">
                    <option value="">Please Select</option>
                    <option value="ACT">ACT</option>
                    <option value="NSW">NSW</option>
                    <option value="NT">NT</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="VIC">VIC</option>
                    <option value="WA">WA</option>
                </select>
            </div >
            <br/>
            <div class="btn">
            <input class="submit-btn" type="submit" value="Submit" name= "submit">
            <input class="reset-btn" type="reset" value="Reset" name="reset">
            </div>
            <br/>
            <div class="returns">
            <a href="index.php" class="return-btn"> Return to Home Page</a>
            </div>
        </form>


    </div>

    </div>
    <?php 
        include_once('include/footer.php')
    ?>
</body>

</html>