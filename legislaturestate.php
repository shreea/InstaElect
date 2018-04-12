<?php
error_reporting(E_ERROR | E_PARSE);
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
  <body >
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #212529 ;width: 100%">
      <div class="container" style="width: 100%">
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
<div style="margin-top: 200px;">


<nav>
  <ul style=" max-width: 50%;float: left;">
    <h1>State Assembly elections in India</h1>
    <p>The Legislative Assembly elections in India are the elections in which the Indian electorate choose the members of the Vidhan Sabha (or Legislative/State Assembly). They are held every 5 years and the members of the legislative assembly are called MLA. The assembly elections are never carried out in the same year for all states and union territories. The legislative assembly elections are held in all the 29 States and 2 of the 7 Union Territories of India.To know the current MLA's of each state <?php
 session_start();
  echo'<a href ="http://localhost/startbootstrap-agency-gh-pages/index1.php"> click</a>';
  ?> here.</p>



     </ul>
</nav>
<meta charset = "UTF-8">
<link rel = "stylesheet"
   type = "text/css"
   href = "legislaturestate.css" />
<article style="margin-left: 60%; border-left: 0px solid gray;">

   <h1>Search here your leader...</h1>
   <?php
    $conn= mysqli_connect("localhost", "root", "","election") or die("Error connecting to database: ".mysql_error());
    $query = $_GET['query'];

    $min_length = 3;
      if(strlen($query) >= $min_length){
        $query = htmlspecialchars($query);
        $query = mysqli_real_escape_string($conn,$query);
        $raw_results = mysqli_query($conn,"SELECT * FROM users
            WHERE (`username` LIKE '%".$query."%') ") or die(mysqli_error($conn));
                 if(mysqli_num_rows($raw_results) > 0){

                  echo '<table>';
            while($results = mysqli_fetch_array($raw_results)){
              session_start();
                $_SESSION['username'] =$results['username'];

                 ?>
               <tr>

   <td><a href ="http://localhost/startbootstrap-agency-gh-pages/sampleprofile.php?uname=$_SESSION['username']"><?php echo $results['username']; ?></a></td>
   <td>  <?php $raw_results = mysqli_query($conn,"SELECT * FROM users
      WHERE (`username` ='".$results['username']."') ") or die(mysqli_error($conn));
       if(mysqli_num_rows($raw_results) > 0){
        while($results = mysqli_fetch_array($raw_results)){

          echo '<img src="data:image/jpeg;base64,'.base64_encode($results['image']).'" alt="post image"  style="width:50px;height:50px;margin-top: 20px; margin-left: 10px>' ;
        }
       }
       ?>
      <img class="img-fluid" src=$img alt="">

   </td>
               </tr>
                <?php

              }
              echo '</table>';
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
    }
    else{ // if query length is less than minimum

    }
   ?>
   <section class="webdesigntuts-workshop" style="margin-top:-40px">
	<form action="legislaturestate.php" method="GET" >
		<input type="search" placeholder="Search..." name="query">

<button type="submit">Search</button>
	  </form>
</section>




</article>
</div>

</body>
</html>
