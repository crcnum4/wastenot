<?php
    session_start();
    include('script/connection.php');
    include('script/login.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>NoThrow</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="author" content="Clifton Choiniere, Daniel Goris, JoJo Lu, Kamala Alexander, Matthew Connors, Brian Hogue" />
        <meta name="description" content="HackPVD project that allows users to easily find donated food." />
        <meta name="keywords" content="web developer, coding, javascript, php, software developer, Clifton Choiniere, 3cs, 3csonline, 3cs online" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- bootstrap links -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <!--pages css-->
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="script/index.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--BOOTSTRAP form builder http://bootsnipp.com/forms -->
    </head>
    <body>
      <div class='navbar navbar-default'>
            <div class='container'>
                <div class='navbar-header'>
                    <a class='navbar-brand pull-left' href='index.php'>NoThrow</a>
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
                            <input class='form-control' type='text' name='username' id='username' placeholder='username' />
                            <input class='form-control' type='password' name='password' id='password' placeholder='password' />
                        </div>
                        <input class='btn btn-default' type="submit" name='login' value="Login" />
                    </form>
                    <?php
                        if ($error) {
                            echo "<div class='alert alert-danger' id='error'>".addslashes($error)."</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    <div class='jumbotron-fluid'>
        <div class='row'>
            <div class='col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4'>
                <h3 id='jumbo-text'>Don't throw away your food! Donate it for tax write offs and to help your community!</h3>
                
            </div>
        </div>
        <div class='row'>
            <div class='col-md-2 col-sm-2 col-md-offset-5 col-sm-offset-5'>
                <button class='btn btn-success' id='jumbo-signup'>Sign Up Now!</button>
            </div>
        </div>
    </div>

      <div class='container' id='body'>
      </div>

      <div class='container-fluid' id='footer'>
        <div class='container'>
          <!--link to github, social media, free code camp providence page. -->
          <div class='row'>
            <div class='col-md-3 col-sm-3 col-md-offset-1 col-sm-offset-1'>
                <h3 class='navbar-brand'>NoThrow</h3>
            </div>
          </div>

          <div class='row' id='links'>

          </div>
        </div>
        
      </div>
    </body>
</html>