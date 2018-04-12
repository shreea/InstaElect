

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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #212529">
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
    <div style="margin-top:0px;">
      <nav>
    <table>
<tr><td>
 <table width="50%" style="margin-top: 200px">
 	<tr>
 		<td style="text-align: center;color: #ffb366;"><h1 >UNION COUNCIL OF MINISTER</h1></td>
 	</tr>
 	<tr>
 		<td style="text-align: center; "><h1>PRIME MINISTER</h1></td>
 	</tr>
 	<tr>
 		<td>Prime Minister and also in-charge of:
Ministry of Personnel, Public Grievances and Pensions;
Department of Atomic Energy;
Department of Space; and
All important policy issues; and
All other portfolios not allocated to any Minister.</td></tr>
<tr>
<td><?php
session_start();
$_SESSION['username'] ="narendra modi";
echo'<a href ="http://localhost/startbootstrap-agency-gh-pages/sampleprofile.php?'.$_SESSION['username'].';">NARENDRA MODI</a>';
?>
<?php
$conn= mysqli_connect('localhost','root','','election') or  die("unable to connect");

$raw_results = mysqli_query($conn,"SELECT * FROM users
    WHERE (`username` ='narendra modi') ") or die(mysqli_error($conn));
     if(mysqli_num_rows($raw_results) > 0){
      while($results = mysqli_fetch_array($raw_results)){

        echo '<img src="data:image/jpeg;base64,'.base64_encode($results['image']).'" alt="post image"  style="width:290px;height:250px;margin-top: 120px; margin-left: 50px>' ;
      }
     }
     ?>
    <img class="img-fluid" src=$img alt="">

</td>

 	</tr>
 </table>
</nav>
</div>
<article style="margin-left: 60%; border-left: 1px solid gray; padding:0px;  background-color:#fff;margin-top:-300px ;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
  <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $DragOrientation: 2,
              $PlayOrientation: 2,
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $Orientation: 2
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 031 css*/
        .jssorb031 {position:absolute;}
        .jssorb031 .i {position:absolute;cursor:pointer;}
        .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
        .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
        .jssorb031 .iav .b {fill:#fff;$db1= mysqli_connect('localhost',$user,$pass,$db) or  die("unable to connect");

                        $query = "SELECT * FROM post  where username='".  $uname  ."' ";
                        $result = mysqli_query($db1, $query);
                        while($row = mysqli_fetch_array($result))
                        {
stroke:#000;fill-opacity:1;}
        .jssorb031 .i.idn {opacity:.3;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:750px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-100px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:750px;overflow:hidden;">
<?php $db1= mysqli_connect('localhost','root','','election') or  die("unable to connect");

                $query = "SELECT * FROM post   ";
                $result = mysqli_query($db1, $query);
                while($row = mysqli_fetch_array($result))
                {
 ?>
            <div data-p="170.00">
              <?php  echo '  <img data-u="image"  src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"margin-left="255px"  class="img-thumnail" />'; ?>

            </div>
          <?php } ?>

    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>

</article>
 </body>
 </html>
