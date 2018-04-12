<?php
//require_once('connection.php');

session_start();
$uname=$_SESSION['username'];
//$username=$_GET['uname'];
//echo $username;

$user ='root';
$pass='';
$db='election';
$db1= mysqli_connect('localhost',$user,$pass,$db) or  die("unable to connect");
$result3 = mysqli_query($db1,"SELECT * FROM users where username='$uname'");
while($users= mysqli_fetch_array($result3))
{
$uname= $users['username'];
$email=$users['email'];
$age= $users['age'];
$party=$users['party'];
$current=$users['current'];
$election_type=$users['election_type'];
$location=$users['location'];
$occupation=$users['$occupation'];
$followers=$users['$followers'];
}
//echo $age;
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
    <table>
<tr><td>
   <?php
   $user ='root';
$pass='';
$db='election';
$db1= mysqli_connect('localhost',$user,$pass,$db) or  die("unable to connect");
$result = mysqli_query($db1,"SELECT * FROM users where username='$uname'");
while($row= mysqli_fetch_array($result))
{
//$post=$users['post'];
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="post image"  style="width:290px;height:250px;margin-top: 120px; margin-left: 50px>' ;
}
?>

</td></tr>
<tr><td>
<input type="submit" value="EDIT PROFILE" style="margin-left: 50px; color: #ffffff;background-color: #0f0f0f;">
</td></tr>

</table>



<table width="60%" border="0" align="center" cellpadding="0" style="margin-top: 10px;">
  <tr>
    <td height="100" colspan="2" style="color:black;padding:10px"><b><font size="6" face="georgia">  Your Profile Information </font></b> </td>
  <!--  <td><div align="right"><a href="index.php">logout</a></div></td>-->
  </tr>

  <tr>

    <td width="82" valign="top" style="padding:6px"><div align="left"><font size="4" face="consolas">USERNAME:</div></td>
    <td width="165" valign="top" class="section-heading text-uppercase" style="padding:6px"><font size="5" face="georgia"><?php echo $uname?></td>
  </tr>

  <tr>
    <td valign="top"style="padding:6px" ><div align="left">AGE:</div></td>
    <td valign="top" class="section-heading text-uppercase"style="padding:6px"><?php echo $age ?></td>
  </tr>
  <tr>
    <td valign="top"style="padding:6px"><div align="left">PARTY:</div></td>
    <td valign="top" class="section-heading text-uppercase"style="padding:6px"><?php echo $party ?></td>
  </tr>
  <tr>
    <td valign="top"style="padding:6px"><div align="left">ELECTION TYPE: </div></td>
    <td valign="top" class="section-heading text-uppercase"style="padding:6px"><?php echo $election_type ?></td>
  </tr>
<tr>
    <td valign="top"style="padding:6px"><div align="left">LOCATION : </div></td>
    <td valign="top" class="section-heading text-uppercase"style="padding:6px"><?php echo $location ?></td>
  </tr>
  <tr>
      <td valign="top"style="padding:6px"><div align="left">EMAIL : </div></td>
      <td valign="top"style="padding:6px"><?php echo $email ?></td>
    </tr>

      <tr>
          <td valign="top"style="padding:6px"><div align="left">CURRENT : </div></td>
          <td valign="top" class="section-heading text-uppercase"style="padding:6px"><?php echo $current ?></td>
        </tr>
        <tr>
            <td valign="top"><div align="left">FOLLOWERS : </div></td>
            <td valign="top" class="section-heading text-uppercase"><?php echo $followers ?></td>
          </tr>
</table>
<post >


  <button onclick="myFunction()" style="width: 40em;margin-left: 10em; color: #ffffff;background-color: #0f0f0f">ADD NEW POST</button>
  <?php
   $connect = mysqli_connect("localhost", "root", "", "election");
   if(isset($_POST["insert"]))
   {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT INTO post(username,image) VALUES ('$uname','$file')";
        if(mysqli_query($connect,$query))
        {
echo'<script>alert("Image inserted")</script>';
        }
        //echo imge inserted
   }
   ?>
<div id="myDIV">
 <form method="post" enctype="multipart/form-data" style="margin-left:380px">
                     <input style="margin-top:10px" type="file" name="image" id="image" />
                     <br />
                     <input style="margin-top:10px" type="submit" name="insert" id="insert" value="Insert" class="btn btn-info"style="color: #ffffff;background-color: #0f0f0f" />
                </form>

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
</div>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>


<!--<p align="center"><a href="index.php"></a></p>-->

 <table  width="450px" height="600px" border="1" style="margin-left: 200px; margin-top:30px;">
  <tr><td>
    <?php
    $user ='root';
$pass='';
$db='election';
$db1= mysqli_connect('localhost',$user,$pass,$db) or  die("unable to connect");

                $query = "SELECT * FROM post  where username='".  $uname  ."' ";
                $result = mysqli_query($db1, $query);
                while($row = mysqli_fetch_array($result))
                {
                     echo '
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"margin-left="255px" height="200px" width="450px" class="img-thumnail" />
                               </td>
                          </tr>
                     ';
                }
                ?>


</td></tr>

 </table>
</post>
</body>
</html>
