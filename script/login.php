<?php

    if ($_GET['logout']=='1' AND $_SESSION['id']) {
        //this distroys the session and logs out the user so they can sign back in.
        session_destroy();
        $message = "You have been logged out.";
    }

    if ($_SESSION['userID']) {
        if($_SESSION['userType'] == 'r') header('location:recieverpage.php');
        if ($_SESSION['userType'] == 'd'); //reroute to post food or profile page.
    }


    if ($_POST['login']) {
        /*login button was selected. May want to migrate this to a login php file and include this on the index.html page.
        clear out any error messages*/
        $loginError = '';
        
        /*validators*/
        if (!$_POST['username']) $loginError.="Please enter your email. ";

        if (!$_POST['password']) $loginError.="Please enter a password.\n";
        else {
            if (strlen($_POST['password']) < 7 ) $loginError.= "We require a minimum 7 character password. ";
            if (!preg_match('`[A-Z]`', $_POST['password'])) $loginError.="We require at least 1 capital letter in your password. ";
        }

         if (!$loginError) {
            //create query to find the user account and ensure the password hash matches the hased password online.
            $query = "SELECT * FROM users WHERE userID = '".mysqli_real_escape_string($link, $_POST['username'])."' AND pass='".md5(md5($_POST['username']).$_POST['password'])."' LIMIT 1";
             echo $query;
            //run query and store the result.
            $result = mysqli_query($link, $query);
            //store number of rows to ensure the user was found or that the password was wrong.
            $row = mysqli_fetch_array($result);

            if ($row) {
                //success log the user in.
                $_SESSION['id'] = $row['id'];
                $userType = $row['userType'];
                $_SESSION['userType'] = $userType;
                
                //redirect to logged in page for that user.
                if ($userType === 'r') header("location:pages/reciverpage.php");
                if ($userType === 'd') header("location:loggedind.php");
            } else {
                //display that either the username or the password was incorrect as no account match was made.
                $loginError = "We can not find that email and password combination. If you need help resetting your password please email cliffc@3csonline.com";
            }
        }
    }
?>