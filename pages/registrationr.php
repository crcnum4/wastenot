<?php
//start session:
session_start();
include('../script/connection.php');
include('../script/registerr.php');
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
                <a class='navbar-brand pull-left' href='../index.php'>NoThrow</a>
            </div>
        </div>
    </div>

    <div class='container' id='body'>
        <div class='row'>
            <div class='col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>

                        
              <fieldset>
                <form class="form-horizontal" method="post">
                <!-- Form Name -->
                <legend>Recipient Registration</legend>
                <?php
                    if ($error) {
                        echo "<div class='alert alert-danger' id='error'>".addslashes($error)."</div>";
                    }

                    if ($message) {
                        echo "<div class='alert alert-success' id='error'>".addslashes($message)."</div>";
                    }

                ?>
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
                      <input id="income" name="income" class="form-control" placeholder="10000" required="" type="number">
                        <span class="input-group-addon">.00</span>
                    </div>
                    <p class="help-block">Enter your yearly income that apply to the the dependents you select. Include the income of any dependents included on this profile.</p>
                  </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="depend">Dependents</label>
                  <div class="col-md-4">
                    <select id="depend" name="depend" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                    <p class='help-block'>Please include yourself. If this totals more then 5 please contact our support email account for a large dependancy account.</p>
                  </div>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="checkboxes">Filters</label>
                  <div class="col-md-4">
                      <div class='row'>
                <div class='col-md-4'>
                    <img src='../imgs/icons/allergies/dairy_125.png' class='img-thumbnail' />
                    <label class="checkbox-inline" for="checkboxes-0">
                    <input name="checkboxes-0" id="checkboxes-0" value="1" type="checkbox">
                        Dairy
                    </label>
                </div>
                <div class='col-md-4'>
                    <img src='../imgs/icons/allergies/egg_125.png' class='img-thumbnail' />
                    <label class="checkbox-inline" for="checkboxes-1">
                    <input name="checkboxes-1" id="checkboxes-1" value="2" type="checkbox">
                      Eggs
                    </label>
                </div>
              <div class='col-md-4'>
                  <img src='../imgs/icons/allergies/fish_125.png' class='img-thumbnail' />
                <label class="checkbox-inline" for="checkboxes-2">
                    <input name="checkboxes-2" id="checkboxes-2" value="3" type="checkbox">
                    Fish
                </label>
              </div>
          </div>
          <div class='row'>
            <div class='col-md-4'>
                <img src='../imgs/icons/allergies/shrimp_125.png' class='img-thumbnail' />
                <label class="checkbox-inline" for="checkboxes-3">
                    <input name="checkboxes-3" id="checkboxes-3" value="4" type="checkbox">
                    Shellfish
                </label>
              </div>
              <div class='col-md-4'>
                <img src='../imgs/icons/allergies/treenuts_125.png' class='img-thumbnail' />
                <label class="checkbox-inline" for="checkboxes-4">
                    <input name="checkboxes-4" id="checkboxes-4" value="5" type="checkbox">
                    TreeNuts
                </label>
              </div>
              <div class='col-md-4'>
                <img src='../imgs/icons/allergies/peanut_125.png' class='img-thumbnail' />
                  <label class="checkbox-inline" for="checkboxes-5">
                      <input name="checkboxes-5" id="checkboxes-5" value="6" type="checkbox">
                      Peanuts
                  </label>
              </div>
          </div>
          <div class='row'>
              <div class='col-md-4'>
                  <img src='../imgs/icons/allergies/gluten_125.png' class='img-thumbnail' />
                  <label class="checkbox-inline" for="checkboxes-6">
                      <input name="checkboxes-6" id="checkboxes-6" value="7" type="checkbox">
                      Gluten-free
                  </label>
              </div>
              <div class='col-md-4'>
                  <img src='../imgs/icons/allergies/soy_125.png' class='img-thumbnail' />
                  <label class="checkbox-inline" for="checkboxes-7">
                      <input name="checkboxes-7" id="checkboxes-7" value="8" type="checkbox">
                      Soybean
                  </label>
              </div>
              <div class='col-md-4'>
                  <img src='../imgs/icons/omni_veg/vegetarian_125.png' class='img-thumbnail' />
                  <label class="checkbox-inline" for="checkboxes-8">
                      <input name="checkboxes-8" id="checkboxes-8" value="9" type="checkbox">
                      Vegetarian
                  </label>
              </div>
          </div>
      </div>
    </div>
                    
    <div class='col-md-8 col-md-offset-2' id='r_waiver'>
        <h3>Recipient Terms and Conditions.</h3>
        <div id='waiver'>
            <h4>Donor and NoThrow Liability</h4>
            <p>By using NoThrow, Recipient is aware that federal law protects donors from being held liable for any food based illnesses or allergenic reactions to donated food. <a href='https://www.gpo.gov/fdsys/pkg/PLAW-104publ210/pdf/PLAW-104publ210.pdf'>PUBLIC LAW 104–210—OCT. 1, 1996</a>. Recipient also agrees personally to release any and all liability to the Donors and NoTrow of any illnesses or allergic reactions experience via the donated food. Recipient is aware that if they get sick they can report the incident to NoThrow who may decide at their discretion to confront the Donor about food quality. The Recipient acknowledges they will not confront the Donor themself about any incidents.</p>
            <h4>Online Reviews</h4>
            <p>Recipient is aware that accepting donated food does not contribute a business transaction of any type and agrees to not rate the business on the donated food via any online services including but not limited to: Yelp, Facebook or Google. Recipient is aware that they can comment or thank the business for the donated food on any social media.</p>
            <h4>Solicitation/Pen Handling/behavior</h4>
            <p>Recipient agrees to not request additional food from the Donor at pickup or at any other time. Recipient agrees to not request any sort of financial assitance of the donor or any nearby patreons of the Donor's location. If Recipient is unhappy with the offered donation, Recipient agrees to politely decline the food and leave the premesis in a civil manor. Rude or loud behavior may result in a ban from the service.</p>
            <h3>By clicking submit I the Recipient have read and agree to the following conditions.</h3>
        </div>
    </div>

    <!-- Button -->
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
                            <h3 class='navbar-brand'>NoThrow</h3>
                        </div>
                    </div>

                    <div class='row' id='links'>

                    </div>
                </div>

            </div>
        </body>
        </html>