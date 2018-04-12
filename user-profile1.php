<?php
session_start();
$errors = array();
error_reporting(E_ERROR | E_PARSE);
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
  if(isset($_POST['follow']))
  {
    $email=$_SESSION['email'];
    $name=$_SESSION['username'];
    $db = mysqli_connect('localhost', 'root', '', 'followers');
    $user_check_query = "SELECT * FROM ".$name." WHERE follower='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user['follower'] === $email) {
        array_push($errors, "Username already exists");
        echo'<script>alert("you are already following the user!!!")</script>';
      }
    if(count($errors) == 0)
    {
      $query="insert into ".$name." values ('$email')";
      $result = mysqli_query($db, $query);
      if($query)
      {
      $email_address = strip_tags(htmlspecialchars($email));
      // Create the email and send the message
      $to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
      $email_subject = "Website Contact Form:  $name";
      $email_body = "You have started following :\n\nName: {$_SESSION['username']}\n\n";
      $headers = "From: noreply@election-portal.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
      $headers .= "Reply-To: $email_address";
      $conn=mysqli_connect("localhost","root","") or die ("unable to connect");
              mysqli_select_db($conn,"election");
              if($conn->connect_error){
                die("Connection failed:".$conn->connect_error);
              }
      $sql="update users set followers=followers+1 where username='{$_SESSION['username']}'";
          if($conn->query($sql)===TRUE)//1
          {
            if(@mail($to,$email_subject,$email_body,$headers))
            {
              $db=mysqli_connect('localhost','root','','followers');
              $query="insert into ".$name."(followers) values ('$email')";
              $result=mysqli_query($db,$query);
            //$sql="update users set followers=followers+1 where username='{$_SESSION['username']}'";
              echo '<script>alert("follow request accepted")</script>';
            }
            else{
                $sql="update users set followers=followers-1 where username='{$_SESSION['username']}'";
                $conn->query($sql);
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
  <!--hii <!?php echo $_SESSION['username']?>-->
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
          <form  method="post" action="user-profile.php" >
            <div class="row">
              <div class="col-md-6">
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                  <button  class="btn btn-primary btn-xl text-uppercase" name="follow" type="submit">follow</button><br/>
                </div>
              <div class="col-lg-12 text-center">
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>


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
