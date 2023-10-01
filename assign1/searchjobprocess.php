<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <title>Search Job </title>
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
        include_once('include/logo.php');  
        $file = '../../data/jobposts/jobs.txt';
        $dir =  '../../data/jobposts';
    
        $errMsg = '';
        $return = false; 
        $match = 0;
        if (isset($_GET['submit']))
        {
            $title = isset($_GET['title']) ? sanitize($_GET['title']) :"";
            $pos = isset($_GET['position']) ? sanitize($_GET['position']) : "";
            $contacts = isset($_GET['contact']) ? sanitize($_GET['contact']) : "";
            $apps = isset($_GET['apps']) ? implode(";",$_GET['apps']) : '';
            $loc = isset($_GET['loc']) ? sanitize($_GET['loc']) : '';
            if(!empty($title))
            {
                if (file_exists($file) && is_readable($file)) 
                {
                    if(filesize($file) > 0 )
                        {
                            $openfile = fopen($file, 'r');
                            $content = fread($openfile, filesize($file));
                            $lines = file($file, FILE_IGNORE_NEW_LINES );
                            $list = array();
                            $currentday = date('d-m-Y');
                            // echo $apps;
                            echo '<br />';
                            function sortbydate($a,$b)
                                {
                                    $a = strtotime($a['date']);
                                    $b = strtotime($b['date']);
                                    if($a === $b)
                                    {
                                    return 0;
                                    }
                                    return $a < $b ? -1 : 1;
                                }
                            //----------each loop it assigns the value of the current element in the array to the variable $line ---//
                            foreach($lines as $key => $line)
                            {
                                
                                $arrays = explode("\t",$line);
                                $description = $arrays[0];
                                $array = $arrays[1];
                                $array1 = $arrays[2];
                                $date = $arrays[3];
                                $position = $arrays[4];
                                $contact = $arrays[5];
                                $select = explode(',', $arrays[6]);
                                $select = implode(',', $select);
                                $location = $arrays[7];
                                //print_r($arrays);
                                // print_r($arrays); 
                                // echo "<br>";
                                // print($array);
                                // print $title;
                                $lists = ['description' => $description , 
                                'array' => $array ,
                                'array1' => $array1, 
                                'date' => $date,
                                'position' => $position,
                                'contact' => $contact,
                                'select' => $select,
                                'location' => $location

                                ];
                                $list[] = $lists;
                                usort($list, 'sortbydate');
                                
                                //-----------display all value when value is empty------------//
                                // echo $select;
                                // echo "<br>";
                                
                                // echo $apps;
                                
                                    //-------------display value which we select -----------//
                                if(stripos($array, $title) !== false )
                                {
                                    if(empty($pos) || $pos === $position )
                                    {      
                                        if(empty($contacts) || $contact === $contacts || empty($title))
                                        {
                                            if (empty($apps) || stripos($select, $apps) !== false)
                                            {
                                                if(empty($loc) || $loc === $location)
                                                {    
                                                    if($lists['date'] >= $currentday)
                                                    {
                                                             
                                                        echo '<div class="format">';
                                                        echo '<ul>';
                                                        
                                                            // echo $array ;
                                                            // echo $array1;
                                                            //$display_result = explode("<br>",$array);
                                                        foreach($list as $display)
                                                        {
                                                            if(!empty($display))
                                                            {
                                                                include('include/nav.php');
                                                                $match ++;  
                                                                break;
                                                                        
                                                            }
                                                        } 
                                                        echo '</ul>';
                                                        echo '</div>';
                                                    }
                                                }
                                            }
                                                    
                                        } 
                                    }
                                }

                            }
                                
                                
                        fclose($openfile);
                        }
                }
                else 
                {
                    //display when file not exist
                    $errMsg .= 'File not exist !';
                }
            }
            else
            {
                $errMsg .= 'Tittle cannot be empty. Please enter the tittle !';
            }
        }
        if($match == 0)
        {
            $errMsg .= 'Cannot find suitable job ';
        }
            
            

        //-------display error message------//
        if(!empty($errMsg))
        {
            include_once('include/logo.php');
            echo '<div class="alert">'; 
            echo '<ul>';
            $errors = explode("<br>",$errMsg);
            foreach($errors as $error)
            {
                if(!empty($error))
                {
                echo '<li>' . $error . '</li>';
                
                }
            }
            echo '</ul>';
            echo "</div>";
            echo '<div class=" rt-pst">';
            echo "<a href=searchjobform.php> Search Job Vacancy page </a>";
            echo "<a href=index.php> Return to Home Page</a>";
            echo "</div>";
        }else
        {
            echo '<div class="return-search">';
            echo "<a href=searchjobform.php> Search for anothher job vacancy</a>";
            echo "<a href=index.php> Return to Home Page</a>";
            echo '</div>';
                                      
        }
        

    ?> 
</body>
</html>