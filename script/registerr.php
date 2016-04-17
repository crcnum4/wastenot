<?php
    //check if logged in and redirect if not.
    if (!$_SESSION['id']) header("location:../index.php?login=1");


    //if the submit button is clicked process info
    if ($_POST['submit']) {
        //clear out the error variable in case this is user's second plus attempt to submit.
        $error = '';
        
        //validat the fields have something in them.
        if (!$_POST['street']) $error.="Please enter street address. ";
        
        if (!$_POST['city']) $error.="Please enter your city. ";
        
        if (!$_POST['state']) $error.="Please enter your state. ";
        
        if (!$_POST['zipcode']) $error.="Please enter your zip. ";
        elseif (!preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$_POST['zipcode'])) $error.= "Please enter valid US Zipcode. ";
        
        if (!$_POST['description']) $error.="Please enter something for description. ";
        
        if (!$_POST['long'] || !$_POST['lat']) $error.= "Your geolocation data was not pulled. Please press F5 on keyboard and try again. Contact support if you have problems.";
        
        //if the $error variable is blank then the form was validated! move on to adding the data to the SQL database and redirect to the secondary registration page.
        if (!$error) {
            //all system checks have cleared! enter the user into the DB now! 
            $query = "INSERT INTO `donors` (`userID`, `totalDonations`, `street`, `state`, `city`, `zip`, `desc`, `long`, `lat`) VALUES (".$_SESSION['id'].", 0, '".mysqli_real_escape_string($link, $_POST['street'])."', '".mysqli_real_escape_string($link, $_POST['state'])."', '".mysqli_real_escape_string($link, $_POST['city'])."', '".mysqli_real_escape_string($link, $_POST['zipcode'])."', '".mysqli_real_escape_string($link, $_POST['description'])."', '".$_POST['long']."', '".$_POST['lat']."');";
            echo $query;

            //run query against DB
            mysqli_query($link, $query);

            //log in the user info into the Session ID.                
            $_SESSION['userID']=mysqli_insert_id($link);

            //header("location:donate.php");
        }
    }
?>
