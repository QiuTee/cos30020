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
        function sanitize($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }
    ?>
    <?php 
    //check if form is submitted
    $file = '../../data/jobposts/jobs.txt';
    $dir =  '../../data/jobposts';
    $errMsg = '';
    $checkduplicateid = false;
        if(isset($_POST['submit']))
        {
            
            //sanitize input data 
            $positionID = isset($_POST['posID']) ? sanitize($_POST['posID']) : "";
            $title = isset($_POST['title']) ? sanitize($_POST['title']) : "";
            $description = isset($_POST['description']) ? sanitize($_POST['description']) : "";
            $date = isset($_POST['date']) ? sanitize($_POST['date']) : "";
            $position = isset($_POST['position']) ? sanitize($_POST['position']) : "";
            $contact = isset($_POST['contact']) ? sanitize($_POST['contact']) : "";

            $location = isset($_POST['loc']) ? sanitize($_POST['loc']) : "";

            //requirement of input 
            //-----------------check position ID ------------------//
            if($positionID === "")
            {
                $errMsg .= 'Please enter an ID<br>';
            }elseif(!preg_match('/^P\d{4}$/',$positionID))
            {
                $errMsg .= 'Position ID must begin with P and followed by 4 digits';
            }
            //--------------------titles --------------------------------//

            if ($title === "")
            {
                $errMsg .= '<br>Please enter a title<br>';
            } elseif(!preg_match('/^[a-zA-Z0-9 ,.!]+$/', $title)  )
            {
                if( strlen($title) > 20)
                {
                    $errMsg .= 'Please check title, it must be at least 20 characters and include spaces, commas, periods (full stops), and exclamation 
                    points';
                }
            
            }
            //------------------------descriptions------------------------//
            if($description === "" )
            {
                $errMsg .= 'Please enter a description<br>';
            }
            else if (strlen($description) > 260)
            {
                $errMsg .= 'Description can only contain a maximum of 260 characters';
            }
            //------------------------date---------------------------------//
            if ($date === "" )
            {
                $errMsg .= 'Please enter a date<br>' ;
            }
            else if (!preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/',$date))
            {
                $errMsg .= 'Date is in the wrong format. Please enter it in the format dd/mm/yyyy';
            }
            //-----------------------position---------------------//
            if ($position === "" )
            {
                $errMsg .= 'Please choose a position<br> ' ;
            }
            if ($contact === "" )
            {
                $errMsg .= 'Contact cannot be empty.<br> ';
            }
            // if ($application ==="" )
            // {
            //     $errMsg .= 'Application cannot be empty.<br> ';
            // }
            if($location === "")
            {
                $errMsg .= 'Please select a location<br>';
            }
            if (empty($_POST['apps']))
            {
                $errMsg .= 'Please select an application';
            }
            else
            {
                $apps = $_POST['apps'];
                $select = '';
                foreach ($apps as $key => $app)
                {
                    
                    if ($key < count($apps)-1)
                    {
                        $select .= $app . ',';
                    }
                    else 
                    {
                        $select .= $app . '.';
                    }
                }
            
            }
            
            //----------------------check id duplicates--------------------//
            
            // if (file_exists($file)) {
            //     $openfile = fopen($file, 'r');
            //     if ($openfile) {
            //         while (($line = fgets($openfile)) !== false) {
            //             $fields = explode("\t", $line);
            //             $existingID = trim($fields[0]);
            //             if ($existingID === $positionID) {
            //                 $errMsg .= 'Position ID must be unique';
            //                 break;
            //             }
            //         }
            //         print_r($fields);
            //         fclose($openfile);
            //     }
            // }
            if(file_exists($file) && is_readable($file))
            {
                if(filesize($file) > 0 )
                {
                    $openfile = fopen($file, 'r');
                    $content = fread($openfile, filesize($file));
                    $lines = file($file, FILE_IGNORE_NEW_LINES );
                    
                    //create array
                    foreach($lines as $line)
                    {
                        if(empty($errMsg))
                        {
                            $arrays = explode("\t",$line);
                            $ids = $arrays[0];
                            // print($ids);
                            // print_r($arrays);   
                            if (in_array($positionID, $arrays))
                            {
                                $checkduplicateid = true;
                                $errMsg .= 'Position ID must be unique';
                                break;
                            }
                            
                        }
                    
                    }
                    fclose($openfile);
                
                }
            }
            if(!empty($errMsg))
            {

                //print error message when find errors
                include_once('include/logo.php');
                echo '<div class="alerts">'; 
                echo '<ul>';
                echo '<h2><span>Error!<span></h2>';
                $errors = explode("<br>",$errMsg);
                foreach($errors as $error)
                {
                    if(!empty($error))
                    {
                    echo '<li>' . $error . '</li>';
                    
                    }
                }
                echo '</ul>';
                echo '<button class="return-button" onclick="window.location.href=\'postjobform.php\'">Return to PostJob</button>';
                echo '<button class="return-home" onclick="window.location.href=\'index.php\'">Return to Homepage</button>';
                echo "</div>";
            }
            elseif(!$checkduplicateid)
            {
                //display if post job succeeded
                include_once('include/logo.php');
                echo '<div class="pst-job">';
                echo "<p><span>Post Job Successful</span></p>";
                echo '</div>';
                echo '<div class="display-post">';
                echo "<p><strong>Position ID: </strong> $positionID </p>";
                echo "<p><strong>Title: </strong> $title </p>";
                echo "<p><strong>Description: </strong> $description </p>";
                echo "<p><strong>Closing Date: </strong> $date </p>";
                echo "<p><strong>Position: </strong> $position </p>";
                echo "<p><strong>Contact: </strong> $contact </p>";
                echo "<p><strong>Application by: </strong> $select </p>";
                echo "<p><strong>Location: </strong> $location </p>";
                echo "<a href=postjobform.php> Return to PostForm</a>";
                echo "<a href=index.php> Return to HomePage</a>";
                echo "</div>";
                if(file_exists($file) && is_writable($file))
                {
                    // put job into jobs.txt when post job successfully
                    $postjob = $positionID . "\t" . $title . "\t" . $description . "\t" . $date . "\t" . $position . "\t" . $contact . "\t" . $select . "\t" . $location . "\r\n"; 
                    $handle = fopen($file, 'a');
                    fwrite($handle, $postjob);
                    fclose($handle);
                }
                else 
                {
                    //creat directory when it doesn't exist
                    mkdir ($dir, 02770, recursive: true);
                    $postjob = $positionID . "\t" . $title . "\t" . $description . "\t" . $date . "\t" . $position . "\t" . $contact . "\t" . $select . "\t" . $location . "\r\n"; 
                    $handle = fopen($file, 'a');
                    fwrite($handle, $postjob);
                    fclose($handle);
                }
            }
           
        }

    
    ?> 
</body>
</html>