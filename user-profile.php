<?php
session_start();
$errors = array();
error_reporting(E_ERROR | E_PARSE);
$db = mysqli_connect('localhost', 'root', '', 'election');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
  	header('location: services.php');
  }
  else {
    $username=$_SESSION['username'];
  }
  if (!isset($_SESSION['email'])) {
      $_SESSION['msg'] = "You must log in first";
    	header('location: services.php');
    }
    else {
      $email=$_SESSION['$email'];
    }
  if(isset($_POST['unfollow']))
  {
    $email=$_SESSION['email'];
    $name=$_SESSION['username'];
    $query="delete from followers where username='{$_SESSION['username']}' and follower='$email' ";
    mysqli_query($db, $query);
    if($query)
    {
      $sql="update users set followers=followers-1 where username='{$_SESSION['username']}'";
      if($db->query($sql))
      {
      echo'<script>alert("you have unfollowed!!!")</script>';
      }
      else {
        echo'<script>alert("error in unfollowing -1 query!!!")</script>';
      }
    }
    else {
      echo'<script>alert("error in deletion from followers!!!")</script>';
    }
  }
  if(isset($_POST['follow']))
  {
    $email=$_SESSION['email'];
    $name=$_SESSION['username'];
    $user_check_query = "SELECT * FROM followers WHERE username='$name' and follower='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user['follower'] === $email) {
        array_push($errors, "Username already exists");
        echo'<script>alert("you are already following the user!!!")</script>';
      }
    if(count($errors) == 0)
    {
      $query="insert into followers(username,follower) values ('$name','$email')";
      $result = mysqli_query($db, $query);
      if($query)
      {
      $email_address = strip_tags(htmlspecialchars($email));
      // Create the email and send the message
      $to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
      $email_subject = "Website Contact Form:  $name";
      $email_body = "You have started following :\n\nName: {$_SESSION['username']}\n\nNow you will get all his updates :D";
      $headers = "From: noreply@election-portal.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
      $headers .= "Reply-To: $email_address";
      $sql="update users set followers=followers+1 where username='{$_SESSION['username']}'";
          if($db->query($sql)===TRUE)//1
          {
            if(@mail($to,$email_subject,$email_body,$headers))
            {
              echo '<script>alert("follow request accepted")</script>';
            }
            else{
                $sql="update users set followers=followers-1 where username='{$_SESSION['username']}'";
                $db->query($sql);
                echo '<script>alert("mail could not be sent!!!")</script>';
          			}
          }
          else {//1
          echo '<script>alert("error in query!!!")</script>';
          }
    }
    else {
      echo '<script>alert("cannot insert into followers")</script>';
    }

    }
  }

?>
<!DOCTYPE html>
<html>
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
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.html">InstaElect</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="portfolio.html">Party</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--hii <!?php echo $_SESSION['username']?>-->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">FOLLOW YOUR CHOICE!!!</h2>
          <h3 class="section-subheading text-muted">The deserving deserve to be followed.....</h3>
        </div>
      </div>
      <div class="row ">
        <div class="col-lg-12 ">
          <form  method="post" action="user-profile.php" >
            <div class="row">
              <div class="col-md-6">
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <?php
$user_check_query = "SELECT * FROM followers WHERE follower='$email' and username='$username' LIMIT 1";
$result = mysqli_query($db,$user_check_query);
$user = mysqli_fetch_assoc($result);?>
<?php if($user): ?>
<?php if ($user['follower'] === $email): ?>
<button class="btn btn-primary btn-xl text-uppercase" name="unfollow" type="submit">unfollow</button><br/>
<?php endif; ?>
<?php else: ?>
  <button class="btn btn-primary btn-xl text-uppercase" name="follow" type="submit">follow</button><br/>
<?php endif; ?>


                <!--  <button  class="btn btn-primary btn-xl text-uppercase" name="follow" type="submit">follow</button><br/>-->
                </div>
              <div class="col-lg-12 text-center">
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2018</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>




          <!-- Bootstrap core JavaScript -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Plugin JavaScript -->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Contact form JavaScript -->
          <script src="js/jqBootstrapValidation.js"></script>
          <script src="js/contact_me.js"></script>

          <!-- Custom scripts for this template -->
          <script src="js/agency.min.js"></script>
</body>
</html>
