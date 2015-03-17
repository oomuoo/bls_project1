<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />

<script src="jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="rating.css" />
<script type="text/javascript" src="rating.js"></script>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/comment.css" rel="stylesheet" type="text/css" />



</head>
<body>


<div id="templatemo_wrapper_outer">

         
            <div id="templatemo_content">
            
            	<div class="post_section"><span class="center"></span><span class="bottom"></span>
        
                     <div class="post_content">
                     
                     	<h2><a href="#">หนังสือ คิดจะไปดวงจันทร์อย่าหยุดแค่ปากซอย</a></h2>
                        
                     <div align=center><img src="images/news1.jpg" alt="image"  WIDTH=250 HEIGHT=350 /> </div>  </br>May 28th, 2048 </br><a href="#">ผู้เขียน รวิศ หาญอุตสาหะ </br></a> <a href="#">สำนักพิมพ์ : วีเลิร์น</a>
                       <p>คู่มือพลิกมุมมองและใช้ความคิดสร้างสรรค์ สำหรับคนที่อยากมองให้เห็นโอกาส และกล้าทำในเรื่องที่คนอื่นคิดว่า "เป็นไปไม่ได้" ถ้าคุณเป็นคนหนึ่งที่ติดแหง็ก ไม่รู้จะวางอนาคตของตัวเองอย่างไร...ถ้าคุณเคยมีความฝัน แต่พอนึกถึงปัญหาและอุปสรรคก็ด่วนถอดใจ...ถ้าคุณสงสัยว่าคนธรรมดาอย่างคุณจะเอาอะไรไปสู้คนที่รวยกว่า เก่งกว่า และพร้อมกว่า...ถ้าเช่นนั้น...นี่คือหนังสือที่คุณต้องอ่าน!     เพราะหนังสือเล่มนี้บรรจุ "สูตรลับ" ที่ช่วยให้คนธรรมดาๆ มองเห็นโอกาสและแทรกตัวขึ้นมาประสบความสำเร็จ ท่ามกลางผู้คนมากมายที่เหนือกว่าในเรื่องสติปัญญา เงินทอง และการศึกษา คุณจะได้พบกับเรื่องราวสร้างแรงบันดาลใจจากคนตัวเล็กๆ นักธุรกิจหน้าใหม่ และบริษัทที่กำลังตกต่ำ ซึ่งสามารถพลิกสถานการณ์และก้าวขึ้นมาโดดเด่นด้วยการใช้ความคิดสร้างสรรค์เพียงเล็กน้อย เช่น เด็กหนุ่มสามคนใช้แค่เตียงเป่าลมกับห้องรับแขกสร้างธุรกิจโรงแรมที่มีมูลค่าถึง 320,000 ล้านบาทภายในเวลาแค่ 5 ปี "แล้วคุณจะพบว่า แค่พลิกความคิดและมองต่างมุม ต่อให้จุดหมายจะไกลถึงดวงจันทร์ คุณก็จะไปถึงสิ่งที่ฝันได้แน่นอน!" 

</p></div></div></div></div>

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
        <html>
<head>
<script src="jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="rating.css" />
<script type="text/javascript" src="rating.js"></script>
</head>
<?php
include("settings.php");
connect();
$ids=array(1,2,3);
?>
                
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
	
	$redirectUrl = '/bls_project1/index.php?r=site/ToTheMoon';	
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
              

