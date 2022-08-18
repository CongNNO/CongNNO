<?php
session_start();

if (!isset($_SESSION['username'])) {
$_SESSION["error"] = "username กับ email หรือ password ไม่ตรงกัน";
echo "<script>location.replace('login.php');</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>
  <meta name="theme-color" content="#2F2F2F">
  <script>location.href = "#ees";</script>
  <title></title>
</head>
<body>

<div class="menu">
  <a style="float: left" class="fa fa-comments-o"> หน้าส่งข้อความ</a>
  <a href="profile.php" style="font-size: 27px; float: right" class="fa fa-gear fa-spin"></a>
  <br>
</div>
<br><br><br>
<div class="box-message">
 
 <?php

$file = file_get_contents('message.json');
$data = json_decode($file);
for ($i=0; $i<count($data); $i++) {
	
if (isset($data[$i]->bot)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" bot/' . $data[$i]->bot->profile . '"> <p class="fa fa-star" style="font-size: 20px;padding: 10px;padding-left: 10px; margin-top: -50px;word-wrap: break-word; color: #FCFF00; font-weight: 900;">' . $data[$i]->bot->username . ' <br> <p style="font-size: 20px; padding-left: 50px;word-wrap: break-word;">' . $data[$i]->bot->message . '</p></p>';
}

if (isset($data[$i]->bot_profile)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" bot/' . $data[$i]->bot_profile->profile . '"><p class="fa fa-star" style="font-size: 20px;padding: 10px;padding-left: 10px; word-wrap: break-word; color: #FCFF00; font-weight: 900;">' . $data[$i]->bot_profile->username . '<p></p><br><img style="width: 300px;height: 150px; border-radius: 15px; padding-left: 10px" src="background/' . $data[$i]->bot_profile->backgroud . '"><img style="width: 70;height: 70px; position: absolute; margin-top: -130px; margin-left: 120px; border-radius: 150px; border: 4px solid ' . $data[$i]->bot_profile->color . '"src="image/' . $data[$i]->bot_profile->image . '"><p style="margin-top: -50px; text-align: center; font-weight: 900; margin-left: 35px;">' . $data[$i]->bot_profile->username_user . '</p><br>';
}


if (isset($data[$i]->portfolio)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" bot/' . $data[$i]->portfolio->profile . '"><p class="fa fa-star" style="font-size: 20px;padding: 10px;padding-left: 10px; word-wrap: break-word; color: #FCFF00; font-weight: 900;">' . $data[$i]->portfolio->username . '<p></p><br><img style="width: 300px;height: auto;border-radius: 10px;margin-left: 10px;" src="admin/' . $data[$i]->portfolio->image . '"></p></p><br>';
}

if (isset($data[$i]->profile)) {
if (isset($data[$i]->username)) {


if (isset($data[$i]->message)) {
if (str_starts_with($data[$i]->message , "https://")) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;font-weight: 900;"> ' . $data[$i]->username . ' <br> <a href=" ' . $data[$i]->message . ' " style="font-size: 20px;word-wrap: break-word;color: #5AD5FF"> ' . $data[$i]->message . '</a></p>';
}
}


if (isset($data[$i]->message)) {
	if (!str_starts_with($data[$i]->message , "https://")) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;font-weight: 900;"> ' . $data[$i]->username . ' <br> <p style="font-size: 20px;padding-left: 50px; word-wrap: break-word;"> ' . $data[$i]->message . '</p></p>';
 }
}

if (isset($data[$i]->emoji)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 30px; padding-left: 50px; padding-top: -40px;word-wrap: break-word;">  ' . $data[$i]->emoji . '</p><br>';
}

if (isset($data[$i]->image)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;"><img style="width: auto;height: 200px; border-radius: 5px" src="image/' . $data[$i]->image . '"></p><br>';
}


if (isset($data[$i]->video)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;"><video style="border-radius: 5px;width: 300px; height: 400px; padding: 10px;"  controls><source src="video/' . $data[$i]->video . '" type="video/mp4"></p><br>';
}


}
}


}
?>
 
 
</div>



<h1 id="ees"></h1>
<br><br><br><br><br><br><br>


<div class="message">
<form action="request.php" method="post" enctype="multipart/form-data">
 <label for="filex"><li style="color: white; font-size: 20px; padding: 10px" class="fa fa-file-image-o">  </li></label>
  <input style="display: none; visibility: none;" name="img" id="filex" type="file"> 
      <input type="text" class="inputx" name="message" placeholder="message...">
     <button class="fa fa-send-o" type="submit" name="button"></button>
 </form>
</div>


<style>
  body {
    background: #000000;
    font-family: Arial, Helvetica, sans-serif;
    width: 70%;
  }
  * {
    margin: 0;
  }
  .menu {
    background: #000000;
    padding: 20px;
    font-family: Arial, Helvetica, sans-serif;
    border-bottom: 1px solid #3D3D3D;
    position: fixed;
    width: 90%;
  }
  .menu a {
    color: #E3E3E3;
    font-weight: 900;
    font-size: 22px;
    transition-duration: 1s;
    text-decoration: none;
  }
  .menu a:hover {
    color: #00A7FF;
  }
 
.message {
 position:fixed;
 left:0px;
 bottom:0px;
 width:100%;
 background: #000000;
 padding: 10px;
 text-align: center;
 margin-left: -15px;
 border: 1px solid #474747;
}

.box-message {
  margin-left: 5px;
  color: #E0E0E0
}

.inputx {
  width: 250px;
  padding: 15px;
  background: #292929;
  border: 2px solid #222222;
  color: #D7E2E7;
  border-bottom-right-radius: 10px;
  transition-duration: 1s;
}

.inputx:hover {
  background: #F8F8F8;
  color: #353535;
}


.message button {
  padding: 14px;
  background: #5C5C5C;
  color: #FFFFFF;
  border: #00A7FF;
  border-right: 4px solid #5A5A5A;
  border-bottom-right-radius: 10px;
  font-size: 17px;
  transition-duration: 1s;
}

.message button:hover {
  background: #23B3FF;
  border-right: 4px solid #00A7FF;
  color: #0076FF;
}

  .admin .px {
    margin-top: -150px;
    color: #FFFFFF;
    text-align: left;
    color: #00FF00;
    text-shadow: 0 0 1em #00B8FF;
    font-weight: 900;
    font-size: 10px;
    padding-left: 10px;
  }
  .admin .facebook {
    color: #00BEFF;
    font-size: 10px;
    padding: 10px;
    text-shadow: 0 0 1em #00B8FF;
  }
  .admin .url-facebook {
    font-size: 5px;
    color: #FFFFFF;
  }
  .admin .youtube {
    font-size: 10px;
    color: #FF3007;
    padding: 10px;
    margin-top: -20px;
    text-shadow: 0 0 1em #FF684A;
  }
  .admin .url-youtube {
    color: #FFFFFF;
    font-size: 5px;
  }
</style>


</body>
</html>