<?php
//start session:
session_start();
include('../script/connection.php');
include('../script/register1.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>WasteNot</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="author" content="Clifton Choiniere, Daniel Goris, JoJo Lu, Kamala Alexander, Matthew Connors, Brian Hogue" />
    <meta name="description" content="HackPVD project that allows users to easily find donated food." />
    <meta name="keywords" content="web developer, coding, javascript, php, software developer, Clifton Choiniere, 3cs, 3csonline, 3cs online" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- bootstrap links -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../style/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!--pages css-->
    <link rel="stylesheet" href="../style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--BOOTSTRAP form builder http://bootsnipp.com/forms -->
</head>
<body>
    <div class='navbar navbar-default'>
        <div class='container'>
            <div class='navbar-header'>
                <a class='navbar-brand pull-left'>WasteNot</a>
                <button class='navbar-toggle collapsed pull-right' data-target='#collapse' data-toggle='collapse' type='button'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
            </div>

            <div id='collapse' class='collapse navbar-collapse pull-right'>
                <form class='navbar-form navbar-right' method="post">
                    <div class='form-group'>
                        <input class='form-control' type='email' name='loginuserid' id='loginemail' placeholder='email' />
                        <input class='form-control' type='password' name='loginpassword' id='loginpassword' placeholder='password' />
                    </div>
                    <input class='btn btn-default' type="submit" name='submit' value="Login" />
                </form>
            </div>
        </div>
    </div>

    <div class='container' id='body'>
        <div class='row'>
            <div class='col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
                <form class="form-horizontal" method="post" >
                    <fieldset><!-- Form Name -->
                        <legend>Registration</legend>
                        <!-- Text input-->
                         <?php
                            if ($error) {
                                echo "<div class='alert alert-danger' id='error'>".addslashes($error)."</div>";
                            }

                            if ($message) {
                                echo "<div class='alert alert-success' id='error'>".addslashes($message)."</div>";
                            }

                        ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name/Organization</label>  
                            <div class="col-md-4">
                                <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div><!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email</label>  
                            <div class="col-md-4">
                                <input id="email" name="email" type="email" placeholder="email@gmail.com" class="form-control input-md" required="">
                            </div>
                        </div><!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="userID">UserID</label>  
                            <div class="col-md-4">
                                <input id="userID" name="userID" type="text" placeholder="" class="form-control input-md" required="">
                            </div>
                        </div><!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password</label>
                            <div class="col-md-4">
                                <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
                                <span class="help-block">Requires: 1 capital letter, 1 number, minimum 7 characters.</span>
                            </div>
                        </div><!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="passwordConfirm">Confirm Password</label>
                            <div class="col-md-4">
                                <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div><!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cell">Mobile Number</label>  
                            <div class="col-md-4">
                                <input id="cell" name="cell" type="text" placeholder="555-111-1111" class="form-control input-md">
                                <span class="help-block">Optional</span>  
                            </div>
                        </div><!-- Multiple Radios (inline) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="userType">User Type</label>
                            <div class="col-md-4">
                                <label class="radio-inline" for="userType-0">
                                    <input type="radio" name="userType" id="userType-0" value="d" checked="checked">
                                    Donor
                                </label>
                                <label class="radio-inline" for="userType-1">
                                    <input type="radio" name="userType" id="userType-1" value="r">
                                    Recipient
                                </label>
                            </div>
                        </div><!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="submit" name="submit" class="btn btn-primary" value='submit'>Submit</button>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>

            <div class='container-fluid' id='footer'>
                <div class='container'>
                    <!--link to github, social media, free code camp providence page. -->
                    <div class='row'>
                        <div class='col-md-3 col-sm-3 col-md-offset-1 col-sm-offset-1'>
                            <h3 class='navbar-brand'>WasteNot</h3>
                        </div>
                    </div>

                    <div class='row' id='links'>

                    </div>
                </div>

            </div>
        </body>
        </html>