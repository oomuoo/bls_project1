<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />

<script src="js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="rating.css" />
<script type="text/javascript" src="js/rating.js"></script>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/comment.css" rel="stylesheet" type="text/css" />



</head>

<div class='product'>

<div id="rating_4" class="ratings">
<div class="star_1 ratings_stars"></div>
<div class="star_2 ratings_stars"></div>
<div class="star_3 ratings_stars"></div>
<div class="star_4 ratings_stars"></div>
<div class="star_5 ratings_stars"></div>
<div class="total_votes">vote data</div>
</div>
</div>
 

<?php
include("settings.php");
connect();
$ids=array(1,2,3);
?>

 <div>      

   <?php
//mysqli connectivity, select database
$connect= new mysqli("localhost","root","","bls_db") or die("ERROR:could not connect to the database!!!");
//extract all html field
extract($_POST);
if(isset($save))
{
//store textarea values in <pre> tag
$msg = mysql_real_escape_string($_POST['a']);
$sg = mysql_real_escape_string($_POST['u']);
//insert values in textarea table
$created_time = date ( "Y-m-d H:i:s" );
$query="INSERT INTO comment (name,detail,date) VALUES('$sg','$msg','$created_time')";

if ($connect->query($query) === TRUE) {
	//alert("คุณได้ส่งข้อความเรียบร้อยแล้ว");
	$redirectUrl = '/bls_project1/index.php?r=site/comment';	
	echo '<script language="javascript">';
	echo 'alert("คุณได้ส่งข้อความเรียบร้อยแล้ว"); window.location.href = "'.$redirectUrl.'";</script>';
	echo '</script>';
	
} else {
	echo "Error: " . $query . "<br>" .$connect->error;
	echo '<script language="javascript">';
	echo 'alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง"); window.location.href = "'.$redirectUrl.'";</script>';
	echo '</script>';
}


}
?>
</div> 

<style>
input,textarea{width:400px}
textarea{height:150px}
input[type=submit]{width:100px}
input[type=reset]{width:100px}
</style>

<form method="post">
<table width=100% border="0">
  
<tr width=10% >
    <td>ชื่อผู้ใช้</td>
    <td align="center"><input type="user" name="u" /></td>
    <td></td>
  </tr>
 
  <tr width=40%>
    <td>แสดงความคิดเห็น</td>
    <td align="center"><textarea  name="a"></textarea></td>
    <td></td>
  </tr>
  
 
  <tr >
  <td></td>
   <td align="center">
   <input type="submit" value="ตกลง" name="save"/>
   <input type="reset" value="ยกเลิก" name="canter"/>
  <td width=30%></td>
  </tr>
  
  
</table>
</form>


	
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bls_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM comment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
      
      
		<div class="bubble-list">
			<div class="bubble clearfix">
				<img src="images/user.jpg">
				<div class="bubble-content">
					<div class="point"></div>
					<p><?php echo "ชื่อผู้ใช้งาน:   " . $row["name"]. "<br>";?></p>
					<p><?php echo "ความคิดเห็น:   " . $row["detail"]. "<br>";?></p>
					<p><?php  echo "เวลา:      " . $row["date"]. "<br>";?></p>
				</div>
			</div>
			
   
   	<?php }
} else {
    
}
//$conn->close();
?> 








	</body>
</html>