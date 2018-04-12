<style>
input,textarea{width:250px}
textarea{height:90px}
input[type=submit]{width:150px}
</style>
<p style="margin-left:255px;margin-top:20px"> WHATS ON YOUR MIND!!!!!!</p>
<form method="post">
<table width="200" border="1" style="margin-left: 255px; margin-top:30px; background-color:#0f0f0f">

  <tr>
    <td style="color: #ffffff;">Write something here...</td>
    <td><textarea placeholder="contents"  name="a"></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
        <input type="submit" value="Save" name="save" color="#ffffff" background-color="#0f0f0f"/>
        <input type="submit" value="Display" name="disp" color="#ffffff" background-color="#0f0f0f"/>
    </td>
  </tr>

</table>
</form>
<?php

//mysqli connectivity, select database
$connect= new mysqli("localhost","root","","election") or die("ERROR:could not connect to the database!!!");

//extract all html field
extract($_POST);
if(isset($save))
{
//store textarea values in <pre> tag
$msg="<pre>$a</pre>";
//insert values in textarea table
$query="insert into post values('','','','','$msg')";
$connect->query($query);
echo "Data saved";

}
?>
