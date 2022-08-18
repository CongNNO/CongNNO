<?php
session_start();
header("location: message.php");

if (isset($_POST ["button"])) {
$username = $_SESSION["username"];
$email = $_SESSION["email"];
$image = "image/" . $_SESSION["image-x"];
$message = $_POST["message"];
$file_image = $_FILES["img"]["name"];
$file = "message.txt";
$open = fopen($file, 'a');


if (!str_starts_with($message , ' ')) {
if (!str_starts_with($message , '<')) {

//message
if (!empty($message)) {
$txt = array("username"=>$username,"profile"=> $_SESSION["image-x"],"message"=>$message);
$json = json_encode ($txt, JSON_PRETTY_PRINT);
fwrite($open, ","  . $json);
}


//bot 
include("./bot/bot.php");

//image
if (str_starts_with($_FILES["img"]["type"] , 'image')) {
if (move_uploaded_file($_FILES["img"]["tmp_name"], "image/".$file_image)) {
$file = "message.txt";
$open = fopen($file, 'a');
$txt = array("username"=>$username,"profile"=> $_SESSION["image-x"],"image"=>$file_image);
$json = json_encode ($txt, JSON_PRETTY_PRINT);
fwrite($open, ","  . $json);
}
}

//video
if (str_starts_with($_FILES["img"]["type"] , 'video')) {
     $video = $file_image = "sayser_video_" . (rand()) . ".mp4";
     if (move_uploaded_file($_FILES["img"]["tmp_name"], "video/".$file_image)) {
     	$file = "message.txt";
         $open = fopen($file, 'a');
     	$txt = array("username"=>$username,"profile"=> $_SESSION["image-x"],"video"=>$file_image);
         $json = json_encode ($txt, JSON_PRETTY_PRINT);
         fwrite($open, ","  . $json);
     }
   }

if (empty($message)) {
	//emoji 
	$txt = array("username"=>$username,"profile"=> $_SESSION["image-x"],"emoji"=>"🤍");
    $json = json_encode ($txt, JSON_PRETTY_PRINT);
    fwrite($open, ","  . $json);
}

//update json
$fp = fopen("message.txt", 'r');
$size = "/storage/emulated/0/test/message.txt";
$xfile = fread($fp, filesize($size));
$xfile = "[".$xfile."]";
file_put_contents('message.json', $xfile);

}
}
}

?>