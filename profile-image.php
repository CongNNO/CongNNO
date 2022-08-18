<?php
session_start();

if (isset($_POST["upload"])) {
if (str_starts_with($_FILES["image_2"]["type"] , 'image')) {
if (move_uploaded_file($_FILES["image_2"]["tmp_name"], "image/".$_FILES["image_2"]["name"])) {
$_SESSION["image-x"] = $_FILES["image_2"]["name"];
header("location: profile.php");
}
}
}