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
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!--pages css-->
    <link rel="stylesheet" href="../css/style.css">
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

                        <?php
                                if ($error) {
                                    echo "<div class='alert alert-danger' id='error'>".addslashes($error)."</div>";
                                }

                                if ($message) {
                                    echo "<div class='alert alert-success' id='error'>".addslashes($message)."</div>";
                                }

                            ?>

                        <form class="form-horizontal">
  <fieldset>

    <!-- Form Name -->
    <legend>Form Name</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="zipcode">Zipcode</label>  
      <div class="col-md-4">
        <input id="zipcode" name="zipcode" placeholder="" class="form-control input-md" required="" type="text" maxlength="5">
      </div>
    </div>

    <!-- Prepended text-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="income">Yearly Income</label>
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">$</span>
          <input id="income" name="income" class="form-control" placeholder="10000" required="" type="text">
            <span class="input-group-addon">.00</span>
        </div>
        <p class="help-block">Enter your yearly income that apply to the the dependents you select. Include the income of any dependents included on this profile.</p>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="depend">Dependants</label>
      <div class="col-md-4">
        <select id="depend" name="depend" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">5+</option>
        </select>
      </div>
    </div>

    <!-- Multiple Checkboxes (inline) -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="checkboxes">Filters</label>
      <div class="col-md-4">
          <div class='row'>
            <div class='col-md-4'>
                <label class="checkbox-inline" for="checkboxes-0">
                <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                  Dairy
                </label>
              </div>
          </div>
        
        <label class="checkbox-inline" for="checkboxes-1">
          <input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
          Eggs
        </label>
        <label class="checkbox-inline" for="checkboxes-2">
          <input name="checkboxes" id="checkboxes-2" value="3" type="checkbox">
          Fish (non-shellfish)
        </label>
        <label class="checkbox-inline" for="checkboxes-3">
          <input name="checkboxes" id="checkboxes-3" value="4" type="checkbox">
          Shellfish
        </label>
        <label class="checkbox-inline" for="checkboxes-4">
          <input name="checkboxes" id="checkboxes-4" value="5" type="checkbox">
          TreeNuts
        </label>
        <label class="checkbox-inline" for="checkboxes-5">
          <input name="checkboxes" id="checkboxes-5" value="6" type="checkbox">
          Peanuts
        </label>
        <label class="checkbox-inline" for="checkboxes-6">
          <input name="checkboxes" id="checkboxes-6" value="7" type="checkbox">
          Gluten-free
        </label>
        <label class="checkbox-inline" for="checkboxes-7">
          <input name="checkboxes" id="checkboxes-7" value="8" type="checkbox">
          Soybean
        </label>
        <label class="checkbox-inline" for="checkboxes-8">
          <input name="checkboxes" id="checkboxes-8" value="9" type="checkbox">
          Vegetarian
        </label>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-primary">Submit</button>
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