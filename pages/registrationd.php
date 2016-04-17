<?php
//start session:
session_start();
include('../script/connection.php');
include('../script/registerd.php');
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!--pages css-->
    <link rel="stylesheet" href="../css/style.css">
    <script src='../script/registrationd.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--BOOTSTRAP form builder http://bootsnipp.com/forms -->
</head>
<body>
    <div class='navbar navbar-default'>
        <div class='container'>
            <div class='navbar-header'>
                <a class='navbar-brand pull-left' href='../index.html'>WasteNot</a>
            </div>
        </div>
    </div>

    <div class='container' id='body'>
        <div class='row'>
            <div class='col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Donor Registration</legend>

                        <?php
                                if ($error) {
                                    echo "<div class='alert alert-danger' id='error'>".addslashes($error)."</div>";
                                }

                                if ($message) {
                                    echo "<div class='alert alert-success' id='error'>".addslashes($message)."</div>";
                                }

                            ?>

                        <!-- Text input-->
                        <h4>Address used for map information. Business location grabbed from geolocation data.</h4>
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="street">Address Street</label>  
                          <div class="col-md-4">
                          <input id="street" name="street" type="text" placeholder="" class="form-control input-md" required="">

                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="city">City</label>  
                          <div class="col-md-4">
                          <input id="city" name="city" type="text" placeholder="" class="form-control input-md" required="">

                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="state">State</label>  
                          <div class="col-md-2">
                          <input id="state" name="state" type="text" placeholder="" class="form-control input-md" required="" maxlength="2">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="zipcode">Zipcode</label>  
                          <div class="col-md-3">
                          <input id="zipcode" name="zipcode" type="text" placeholder="" class="form-control input-md" required="" maxlength="5">

                          </div>
                        </div>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="description">Description</label>
                          <div class="col-md-4">                     
                            <textarea class="form-control" id="description" name="description" placeholder="500 Chars max please" maxlength="500"></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="long">longitude</label>  
                          <div class="col-md-4">
                          <input id="long" name="long" type="hidden" placeholder="" class="form-control input-md" required="">
                          <label class='control-label' id='longConfirm'></label>

                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="lat">latitude</label>  
                          <div class="col-md-4">
                          <input id="lat" name="lat" type="hidden" placeholder="" class="form-control input-md" required="">
                          <label class='control-label' id='latConfirm'></label>
                          </div>
                        </div>
                        
                        <!--button submit-->
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