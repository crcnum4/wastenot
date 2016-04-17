<?php
    //check if user clicked logout button -probably need to move this to home page (index.php)
    if ($_GET['logout']=='1' AND $_SESSION['id']) {
        //this distroys the session and logs out the user so they can sign back in.
        session_destroy();
        $message = "You have been logged out.";
    }
    //check if the user got redirected to this page. again this will probably need to be migrated to the home page (index.php)
    if ($_GET['login'] == '1' AND !$_POST['submit']) {
        $error = "You must be logged in to access that page!";
    }
        
    //if the submit button is clicked process info
    if ($_POST['submit']) {
        //clear out the error variable in case this is user's second plus attempt to submit.
        $error = '';
        
        //see if anything was typed into name. May be redundant thanks to boot strap requirement field.
        if (!$_POST['name']) $error.="Please enter your name. ";
        
        //built in php email validation to confirm email. First line checks that email was entered. (might be redundant thanks to bootstrap email input type) second line verifies its a valid email format.
        if (!$_POST['email']) $error.="Please enter your email. ";
        else if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) $error.="Please enter a valid email address. ";

        //verify a password was entered
        if (!$_POST['password']) $error.="Please enter a password.\n";
        else {
            //validate that the password is at least 7 characters long and has at least 1 capital letter - might want to add a number requirement later.
            if (strlen($_POST['password']) < 7 ) $error.= "Please enter at least 7 characters for your password. ";
            if (!preg_match('`[A-Z]`', $_POST['password'])) $error.="Your password should have at least 1 capital letter. ";
        }
        
        //validate that password entered matches the confirm field.
        if ($_POST['password'] != $_POST['passwordConfirm']) $error.= "Your passwords do not match. ";
        
        //if the $error variable is blank then the form was validated! move on to adding the data to the SQL database and redirect to the secondary registration page.
        if (!$error) {
            //first check if this user exists already
            //first create the sql query, be sure to use the Real_escape system to ensure user hasn't entered any sql scripting in the field to try and hack the db.
            $query = "SELECT * FROM users WHERE userID = '".mysqli_real_escape_string($link, $_POST['userID'])."'";
            
            //run qury against the db $link is defined in the connection.php file.
            $result = mysqli_query($link, $query);
            
            //get number of rows to see if anything was found. if 1 then user exists. if 0 then does not.
            $results = mysqli_num_rows($result);

            if ($results) {
                $error = "You are already registered. Please login above.";
            } else {
                //all system checks have cleared! enter the user into the DB now! 
                $userType = $_POST['userType'];
                $query = "INSERT INTO `users` (`Name`, `userID`, `pass`, `userType`, `email`, `cell`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."','".mysqli_real_escape_string($link, $_POST['userID'])."','".md5(md5($_POST['userID']).$_POST['password'])."', '".$userType."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['cell'])."');";
                
                //run query against DB
                mysqli_query($link, $query);
                
                //log in the user info into the Session ID.                
                $_SESSION['id']=mysqli_insert_id($link);
                
                if ($userType === 'r') header("location:registrationr.php");
                if ($userType === 'd') header("location:registrationd.php");
            }
        }
    }
        
    if ($_POST['submit'] == 'Login') {
        /*login button was selected. May want to migrate this to a login php file and include this on the index.html page.
        clear out any error messages*/
        $loginError = '';
        
        /*validators*/
        if (!$_POST['loginemail']) $loginError.="Please enter your email. ";
        else if (!(filter_var($_POST['loginemail'], FILTER_VALIDATE_EMAIL))) $loginError.="Please enter a valid email address. ";

        if (!$_POST['loginpassword']) $loginError.="Please enter a password.\n";
        else {
            if (strlen($_POST['loginpassword']) < 7 ) $loginError.= "We require a minimum 7 character password. ";
            if (!preg_match('`[A-Z]`', $_POST['loginpassword'])) $loginError.="We require at least 1 capital letter in your password. ";
        }

         if (!$loginError) {
            //create query to find the user account and ensure the password hash matches the hased password online.
            $query = "SELECT * FROM users WHERE userID = '".mysqli_real_escape_string($link, $_POST['loginuserid'])."' AND password='".md5(md5($_POST['loginuserid']).$_POST['loginpassword'])."' LIMIT 1";
            //run query and store the result.
            $result = mysqli_query($link, $query);
            //store number of rows to ensure the user was found or that the password was wrong.
            $row = mysqli_fetch_array($result);

            if ($row) {
                //success log the user in.
                $_SESSION['id'] = $row['id'];
                $userType = $row['userType'];
                //redirect to logged in page for that user.
                if ($userType === 'r') header("location:loggedinr.php");
                if ($userType === 'd') header("location:loggedind.php");
            } else {
                //display that either the username or the password was incorrect as no account match was made.
                $loginError = "We can not find that email and password combination. If you need help resetting your password please email cliffc@3csonline.com";
            }
        }
    }
?>
