<?php
session_start();
//header("location: login.php");

if (isset($_POST["button"])) {
$file = 'info.txt';
$fp = fopen($file, 'a');
$username = $_POST["user"];
$email = $_POST["email"];
$password = $_POST["pass"];
$password_2 = $_POST["pass_2"];
$image = $_FILES["file"]["name"];
$file = file_get_contents('user_db.json');
$data = json_decode($file);

if ($password === $password_2) {
if (str_starts_with($_FILES["file"]["type"] , 'image')) {
if (move_uploaded_file($_FILES["file"]["tmp_name"], "image/".$_FILES["file"]["name"])) {
$x = array(
"username"=> $username,
"email"=>$email,
"password"=>$password,
"img"=>$image
);
$json = json_encode ($x , JSON_PRETTY_PRINT);
fwrite($fp, ",".$json);
$fpx = fopen("info.txt", 'r');

//json
$size = "info.txt";
$xfile = fread($fpx, filesize($size));
$xfile = "[".$xfile."]";
file_put_contents('user_db.json', $xfile);
header("location: login.php");
}
} else {
	$_SESSION["error_rester"] = "โปรดอัพรูปเป็นรูปภาพ (image)";
	header("location: index.php");
} 
} else {
	$_SESSION["error_rester"] = "รหัสกับรหัสยืนยันไม่ตรงกัน";
	header("location: index.php");
}
}



?>