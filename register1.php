<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$party="";
$election_type="";
$location="";
$occupation="";
$current="";

$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'election');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  if(isset($_POST['password']))
  {
  $password = mysqli_real_escape_string($db, $_POST['password']);
  }
  if(isset($_POST['cpassword']))
  {
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
  }
  $party = mysqli_real_escape_string($db, $_POST['party']);
  $election_type = mysqli_real_escape_string($db, $_POST['election_type']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $occupation = mysqli_real_escape_string($db, $_POST['occupation']);
  $current = mysqli_real_escape_string($db, $_POST['current']);
  $location = mysqli_real_escape_string($db, $_POST['location']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($image)) { array_push($errors, "image is required"); }
  if (empty($party)) { array_push($errors, "party is required"); }
  if (empty($election_type)) { array_push($errors, "election_type is required"); }
  if (empty($age)) { array_push($errors, "age is required"); }
  if (empty($occupation)) { array_push($errors, "occupation is required"); }
  if (empty($current)) { array_push($errors, "current is required"); }
    if (empty($location)) { array_push($errors, "location is required"); }
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      echo'<script>alert("Username already exists")</script>';
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      echo'<script>alert("email already exists")</script>';
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  	$query = "INSERT INTO users (username, email, password,followers,party,election_type,location,age,occupation,current)
  			  VALUES('$username', '$email', '$password',0,'$party','$election_type','$location','$age','$occupation','$current')";
  	mysqli_query($db, $query);
    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";

  	header('location:login.php');
  }
}
?>
<!DOCTYPE html>
<html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

  </head>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Contact-->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row ">
          <div class="col-lg-12 ">
<!--id="contactForm"-->
            <form  method="post" action="register.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                    <input class="form-control" id="name" type="text" placeholder="Username *" name="username" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Email *" name="email" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                    <input class="form-control" id="password" type="password" placeholder="Password *" name="password" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="cpassword" type="password" placeholder="Confirm Password *" name="cpassword" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="party" type="text" placeholder="Party" name="party" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="election_type" type="text" placeholder="Election type" name="election_type" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="location" type="text" placeholder="Location *" name="location" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="age" type="int" placeholder="Age" name="age" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="occupation" type="text" placeholder="Occupation" name="occupation" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="current" type="text" placeholder="Current *" name="current" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                      <input class="form-control" type="file" name="image" id="image" />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div class="form-group"></div>
                  <button  class="btn btn-primary btn-xl text-uppercase" type="submit" id="insert" name="reg_user">Register</button>
                </div>
                <!--
                  <div class="form-group">
              	  <button type="submit" class="btn" name="reg_user">Register</button>
              	</div>
              -->
                	<p>
                		Already a member? <a href="login.php">Sign in</a>
                	</p>
                </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/agency.min.js"></script>
        <script>
         $(document).ready(function(){
              $('#insert').click(function(){
                   var image_name = $('#image').val();
                   if(image_name == '')
                   {
                        alert("Please Select Image");
                        return false;
                      }
                else
                {
                     var extension = $('#image').val().split('.').pop().toLowerCase();
                     if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                     {
                          alert('Invalid Image File');
                          $('#image').val('');
                          return false;
                     }
                }
           });
        });
        </script>
  </body>
</html>
