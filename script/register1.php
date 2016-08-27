<?php
    
        
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
?>
