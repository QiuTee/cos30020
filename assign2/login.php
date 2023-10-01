<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <title>Assignment2</title>
</head>
<body>
    <?php
        $page = 'login';
        include('functions/header.php');
    ?>
        
        <div class = "login_form">
            <img src="images/loin.png">
            <h2>Login From</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class = "input-field" >
                        <input class ="input-form"type="email" name="email" id = "email" placeholder = "Email">
                        
                    </div>
</br>
                    <div class = "input-field">
                        <input class ="input-form" type="password" name="password" id = "conf_pass" placeholder ="Password">
                       
                    </div>
</br>
                   
                    <input class= "loginBtn" type="submit" value="Register">
                    <input class= "loginBtn1" type="reset" value="Clear">
                    <p><a href="index.php">Return HomePage</a></p>

            </form>
        </div>
<?php

require_once('functions/function.php');
require_once('functions/settings.php');
?>
<?php
    session_start();

    function sanitize($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $errMsg = "";
        $email = isset($_POST['email']) ? sanitize($_POST['email']) : "";
        $password = isset($_POST['password']) ? sanitize($_POST['password']) : "";
        $sql = "SELECT * FROM `friends` WHERE `friend_email` = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_array($result);
            if ($row['password'] == $password) 
            {
                $state = "success";
                $_SESSION['login'] = "success";
                $_SESSION['email'] = $email;
                $_SESSION['num_of_friends'] = $row['num_of_friends'];
                $_SESSION['friend_id'] = $row['friend_id'];
                $_SESSION['profile_name'] = $row['profile_name'];
                header('Location: friendlist.php');
                exit();
            } 
            else 
            {
                $errMsg .= 'Wrong password, please try again';
            }
        } 
        else 
        {
            $errMsg .= 'Wrong email, please try again';
        }

        // if (!empty($errMsg)) 
        // {
        //     echo '<div class="alerts">'; 
        //     echo '<h2><span>Error!!!!!<span></h2>';
        //     $errors = explode("<br>", $errMsg);
        //     foreach ($errors as $error) {
        //         if (!empty($error)) 
        //         {
        //             echo '<li>' . $error . '</li>';
        //         }
        //     }
        //     echo '</div>';
        // }
        require_once('functions/nav.php');
        mysqli_close($conn);
    }
?>


</body>
</html>