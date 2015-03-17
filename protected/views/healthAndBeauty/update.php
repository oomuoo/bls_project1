<?php
// connect to database
$dbh=mysql_connect ("localhost", "root", "") or die ('Cannot connect to the database');
mysql_select_db ("bls_db",$dbh);

if($_GET['do']=='rate'){
	// do rate
	rate();
}else if($_GET['do']=='getrate'){
	// get rating
	getRating();
}

// function to retrieve
function getRating(){
	$sql= "select * from score";
	$result=@mysql_query($sql);
	$rs=@mysql_fetch_array($result);
	// set width of star
	$rating = (@round($rs[value] / $rs[counter],1)) * 20; 
	echo $rating;
}

// function to insert rating
function rate(){
	$text = strip_tags($_GET['rating']);
	$update = "update score set counter = counter + 1, value = value + ".$_GET['rating']."";

	$result = @mysql_query($update); 
	if(@mysql_affected_rows() == 0){
		$insert = "insert into score (counter,value) values ('1','".$_GET['rating']."')";
		$result = @mysql_query($insert); 
	}
}
?>
