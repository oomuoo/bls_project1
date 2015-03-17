<?php
/*
 * filesave.php
 * To be used with ext-server_opensave.js for SVG-edit
 *
 * Licensed under the MIT License
 *
 * Copyright(c) 2010 Alexis Deveria
 *
 */
 
if(!isset($_POST['output_svg']) && !isset($_POST['output_png'])) {
	die('post fail');
}

$file = '';

$suffix = isset($_POST['output_svg'])?'.svg':'.png';

if(isset($_POST['filename']) && strlen($_POST['filename']) > 0) {
	$file = $_POST['filename'] . $suffix;
} else {
	$file = 'image' . $suffix;
}

if($suffix == '.svg') {
	$mime = 'image/svg+xml';
	$contents = rawurldecode($_POST['output_svg']);
} else {
	$mime = 'image/png';
	$contents = $_POST['output_png'];
	$pos = (strpos($contents, 'base64,') + 7);
	$contents = base64_decode(substr($contents, $pos));
}


//save to a directory 
define('DIR_PATH', '/tmp/');
$fp = fopen(DIR_PATH . $file, 'w+');
fwrite($fp, $contents);
fclose($fp);

//save via download 
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
 
?>
