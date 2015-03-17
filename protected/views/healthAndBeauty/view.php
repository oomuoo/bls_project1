<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8"> 
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/comment.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">

<link rel="stylesheet" type="text/css" href="cssCon/component.css" />
<script src="jsCon/modernizr.custom.js"></script>			
</head>
<?php 
	$this->breadcrumbs=array(
			'สุขภาพและความงาม'=>array('healthAndBeauty'),
			'ชื่อหนังสือ '.$healthAndBeauty->name,
			
	);
?>
<div class ="form">
		<h2><?php echo $healthAndBeauty->name; ?></h2>
		<br />
		<center><?php if($healthAndBeauty->picture != null){?>
		<img  width="270" height="360"  src="/bls_project1/images/book_img/<?php echo $healthAndBeauty->picture?>"></img>
		<?php }?></center>
		<br />
		<font color = "#0000ff">วันที่สร้าง : <?php echo $healthAndBeauty->create_date; ?> </font>
		<br />
		<meta charset="UTF-8">

		<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "bls_db";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				mysql_query("SET NAMES UTF8");
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				  
				}
				 $IdBook = $healthAndBeauty->id ;
				$sql = "SELECT book.id,book.member_id,member.alias FROM book LEFT JOIN member on book.member_id = member.id WHERE book.id = '$IdBook'";
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
					<p><font color = "#0000ff"><?php echo "นามปากกา :   " . $row["alias"]. "<br>";?></font></p>
   	<?php }
} else {
    
}
//$conn->close();
?>
		<font color = "#0000ff">นามปากกา : <?php //echo $result['alias'] ; ?> </font>
		<br />
		<br />
		รายละเอียด : <?php echo $healthAndBeauty['description']; ?> </center>
		<br />
		<br />
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>  
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>  
    <a name="fb_share" type="button" href="http://www.facebook.com/sharer.php">Share</a>  
    
		<br />
	<div class="btn-toolbar">
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'ย้อนกลับ',
	'url'=>'index.php?r=healthAndBeauty/healthAndBeauty',
	)); ?>
	
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'แจ้งหนังสือไม่เหมาะสม',
	'url'=>'index.php?r=healthAndBeauty/reportBook&id='.$healthAndBeauty->id,
	)); ?>
	
	 <?php 
	$ID_User = Yii::app()->session['_id'];
	Yii::app()->session['Id_book'] = '$IdBook';
	?>
	
	<?php /* $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'เพิ่มไปยังชั้นวางหนังสือ',
	'url'=>'index.php?r=healthAndBeauty/bookshelf&id='.$healthAndBeauty->id,
			//array('label'=>'ชั้นหนังสือ', 'url'=>array('/bookshelf/index'), 'visible'=>Yii::app()->user->isMember()),
	));  */?>
    </div>
   <div class="md-trigger" data-modal="modal-1">
		<?php echo CHtml::submitButton($healthAndBeauty->isNewRecord ? 'เพิ่มไปยังชั้นวางหนังสือ' : 'เพิ่มไปชั้นวาง'); ?>
		<?php //echo CHtml::resetButton($model->isNewRecord ? 'ยกเลิก' : 'Cancel'); ?>
						
	</div>
<ul>
</ul>

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

echo $IdBook = $healthAndBeauty->id ;
  
$created_time = date ( "Y-m-d H:i:s" );
$query="INSERT INTO comment (name,book_id,detail,date) VALUES('$sg','$IdBook','$msg','$created_time')";

if ($connect->query($query) === TRUE) {
	//alert("คุณได้ส่งข้อความเรียบร้อยแล้ว");
	$redirectUrl = '/bls_project1/index.php?r=/healthAndBeauty/view&id='.$healthAndBeauty->id;	
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
 $IdBook = $healthAndBeauty->id ;
$sql = "SELECT * FROM comment WHERE book_id = '$IdBook'";
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

<div class="rows-button">
			<div class="md-modal md-effect-1" id="modal-1">
				<div class="md-content">
				<div class="md-trigger" data-modal="modal-1">
				<h3>เพิ่มหนังสือไปยังชั้นหนังสือ</h3>
				<div>
				<p>คุณต้องการเพิ่มไปยังชั้นวางหนังสือหรือไม่:</p>
				<ul>
				<div class="form">
							<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								'id'=>'report-book-form',
								'htmlOptions'=>array('enctype'=>'multipart/form-data'),
							)); ?>
							
								<div class="row">
									<?php echo $form->hiddenField($healthAndBeauty,'id'); ?>
									<?php echo $form->error($healthAndBeauty,'id'); ?>
								</div>	
								<div class="row">
									<?php echo $form->hiddenField($bookshelf, 'id'); ?>
									<?php echo $form->error($bookshelf, 'id'); ?>
								</div>
							<div style="margin-left: 200px"><?php echo CHtml::submitButton('ยืนยัน'); ?>
							<div class="md-close" align="center" >
								<?php //echo CHtml::resetButton($healthAndBeauty->isNewRecord ? 'ยกเลิก' : 'Cancel'); ?>						
							</div>
							</div>
							<?php $this->endWidget(); ?>
							
							</div><!-- form -->
							</ul>
							
							<script type="text/javascript">

							function showHide()
							{
								if(document.getElementById("agree").checked)
								{
									document.getElementById('content').style.display = 'block';
								}
								 else
								{
									document.getElementById('content').style.display = 'none';
								}
							} 

							</script>
						 
							<!--  <input type="checkbox" name="agree" id="agree" onclick="showHide();" /><b> : ยอมรับเงื่อนไข</b>
							-->
							<div class="md-close" align="center" style="display:none;" id="content">
								<?php //echo CHtml::submitButton($healthAndBeauty->isNewRecord ? 'ยืนยัน' : 'Save'); ?>
								<?php //echo CHtml::resetButton($healthAndBeauty->isNewRecord ? 'ยกเลิก' : 'Cancel'); ?>						
							</div>	
							
						</div>
					</div>
			</div>
		</div>
		<div class="md-overlay"></div><!-- the overlay element -->

										<!-- classie.js by @desandro: https://github.com/desandro/classie -->
										<script src="jsCon/classie.js"></script>
										<script src="jsCon/modalEffects.js"></script>

										<!-- for the blur effect -->
										<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
										<script>
										// this is important for IEs
			var polyfilter_scriptpath = '/jsCon/';
		</script>
		<script src="jsCon/cssParser.js"></script>
		<script src="jsCon/css-filters-polyfill.js"></script>
</div>
</body>
</html>

<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$healthAndBeauty,
	'attributes'=>array(
		//'id',
		'name',
		'create_date',
		'update_date',
		'category.name',
		'type.name',
		//'status',
		array(
			'name'=>'status',
			'value'=>$healthAndBeauty->status == 'P'?'สาธารณะ':'M'?'เฉพาะสมาชิก':'เฉพาะผู้เขียน'
		),
		'member.alias',

		array(
			'name'=>'picture',
			'type'=>'html',
			'value'=>($healthAndBeauty->picture)?CHtml::image(
					Yii::app()->request->baseUrl.'/images/book_img/'
					.$healthAndBeauty->picture,'',
					array('width'=>200,'height'=>250)):CHtml::image(
							Yii::app()->request->baseUrl.'/images/book_img/noimage.jpg'
							,'',array('width'=>200,'height'=>150)),
			), // show image on view
		
		array(
			'name'=>'description',
			'type'=>'html',// show form text html format
			'value'=>$healthAndBeauty->description,
		),
			
	),
));  */?>
<br />
<center>
<?php /* $this->widget('bootstrap.widgets.TbButton', array(
'label'=>'ย้อนกลับ',
'type'=>'success',
'url'=>'index.php?r=healthAndBeauty/healthAndBeauty',
));  */?>
</center>


		

	