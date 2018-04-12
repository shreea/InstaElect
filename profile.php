<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'election');
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php echo $_SESSION['username'] ?>
  <table class="table table-bordered">
                     <tr>
                          <th>Image</th>
                     </tr>
                <?php
                     echo '
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($_SESSION['image']).'" height="200" width="200" class="img-thumnail" />
                               </td>
                          </tr>
                     ';

                ?>

</form>
</body>
</html>
