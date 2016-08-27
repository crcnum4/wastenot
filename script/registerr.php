<?php
    //check if logged in and redirect if not.
    if (!$_SESSION['id']) header("location:../index.php?login=1");


    //if the submit button is clicked process info
    if ($_POST['submit']) {
        //clear out the error variable in case this is user's second plus attempt to submit.
        $error = '';
        echo $_POST['checkboxes'];
        
        //validat the fields have something in them.
        if (!$_POST['income']) $error.="Please enter your Income. ";
        
        
        if (!$_POST['zipcode']) $error.="Please enter your zip. ";
        elseif (!preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$_POST['zipcode'])) $error.= "Please enter valid US Zipcode. ";
        
        //if the $error variable is blank then the form was validated! add data to DB
        if (!$error) {
            
            //first step create the Filter string. a 9 character item of 0 and 1's
            
            $filters='';
            
            for ($i = 0; $i < 9; $i++) {
                $filterKey = 'checkboxes-'.$i;
                
                if ($_POST[$filterKey]) {
                    $filters.='1';
                } else {
                    $filters.='0';
                }
            }
            $depend = intval($_POST['depend']);
            
            
            //all system checks have cleared! enter the user into the DB now! 
            $query = "INSERT INTO `recipients` (`userID`, `income`, `zipcode`, `dependents`, `filters`, `bclaims`, `lclaims`, `dclaims`) VALUES (".$_SESSION['id'].", ".intval(mysqli_real_escape_string($link, $_POST['income'])).", '".mysqli_real_escape_string($link, $_POST['zipcode'])."', ".$depend.", ".$filters.", ".$depend.", ".$depend.", ".$depend.");";
            echo $query;

            //run query against DB
            mysqli_query($link, $query);

            //log in the user info into the Session ID.                
            $_SESSION['userID']=mysqli_insert_id($link);

            //header("location:donate.php");
        }
    }
?>
