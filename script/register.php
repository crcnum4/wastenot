<?php

    if ($_GET['logout']=='1' AND $_SESSION['id']) {
        session_destroy();
        $message = "You have been logged out.";
    }

    if ($_GET['login'] == '1' AND !$_POST['submit']) {
        $error = "You must be logged in to access that page!";
    }
        
    if ($_POST['submit'] == 'Register') {
        echo "test";
        $error = '';

        if (!$_POST['name']) $error.="Please enter your name. ";

        if (!$_POST['email']) $error.="Please enter your email. ";
        else if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) $error.="Please enter a valid email address. ";

        if (!$_POST['password']) $error.="Please enter a password.\n";
        else {
            if (strlen($_POST['password']) < 7 ) $error.= "Please enter at least 7 characters for your password. ";
            if (!preg_match('`[A-Z]`', $_POST['password'])) $error.="Your password should have at least 1 capital letter. ";
        }

        if ($_POST['password'] != $_POST['confirm']) $error.= "Your passwords do not match. ";

        if (!$error) {

            $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

            echo $query;

            $result = mysqli_query($link, $query);

            $results = mysqli_num_rows($result);

            print_r($result);
            echo $results;

            if ($results) {
                $error = "You are already registered. Please click sign in above.";
            } else {
                $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."','".mysqli_real_escape_string($link, $_POST['email'])."','".md5(md5($_POST['email']).$_POST['password'])."')";

                mysqli_query($link, $query);
                
                //create new user database
                
                $dbname = "journal".mysqli_insert_id($link);
                
                $_SESSION['id']=mysqli_insert_id($link);
                
                $query = "CREATE TABLE ".$dbname."(DATE TEXT NOT NULL, ENTRY TEXT, ID INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (ID))";
                
                mysqli_query($link, $query);
                
                header("Location:loggedin.php");

            }
        }
    }
        
    if ($_POST['submit'] == 'Login') {

        $error = '';

        if (!$_POST['loginemail']) $error.="Please enter your email. ";
        else if (!(filter_var($_POST['loginemail'], FILTER_VALIDATE_EMAIL))) $error.="Please enter a valid email address. ";

        if (!$_POST['loginpassword']) $error.="Please enter a password.\n";
        else {
            if (strlen($_POST['loginpassword']) < 7 ) $error.= "We require a minimum 7 character password. ";
            if (!preg_match('`[A-Z]`', $_POST['loginpassword'])) $error.="We require at least 1 capital letter in your password. ";
        }

         if (!$error) {

            $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_array($result);

            if ($row) {
                $_SESSION['id'] = $row['id'];

                //redirect to logged in.
                header("Location:loggedin.php");
            } else {
                $error = "We can not find that email and password combination. If you need help resetting your password please use the contact form by clicking the contact link above.";
            }
        }
    }
?>
