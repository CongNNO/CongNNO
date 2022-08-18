<?php

$profix = "$";

if ($message === $profix) {
	$txt = ["bot"=>array("username"=>" BOT SAYSER","profile"=>"bot.jpeg","message"=>"หากคุณต้องการใช้พิมพ์${profix}helpได้เลย")];
    $json = json_encode ($txt, JSON_PRETTY_PRINT);
    fwrite($open, ","  . $json);
}

if (str_starts_with($message, $profix . "help")) {
	$txt = ["bot"=>array("username"=>" BOT SAYSER","profile"=>"bot.jpeg","message"=>"${profix}help <br> ${profix}portfolio <br> ${profix}profile")];
    $json = json_encode ($txt, JSON_PRETTY_PRINT);
    fwrite($open, ","  . $json);
}

if (str_starts_with($message, $profix . "profile")) {
	$backgroud=array(
"img1"=>"img1.jpeg",
"img2"=>"img2.jpeg",
"img3"=>"img3.jpeg",
"img4"=>"img4.jpeg",
"img5"=>"img5.jpeg",
"img6"=>"img6.jpeg",
"img7"=>"img7.jpeg",
"img8"=>"img8.jpeg",
"img9"=>"img9.jpeg",
"img10"=>"img10.jpeg",
"img11"=>"img11.jpeg",
"img12"=>"img12.jpeg",
"img13"=>"img13.jpeg"
);
    $color = array(
"color1"=>"#00FF4C",
"color2"=>"#00C7FF",
"color3"=>"#4400FF",
"color4"=>"#FF00F9",
"color5"=>"#FF0000",
"color6"=>"#FF6300",
"color7"=>"#FFFC00"
);
    $ramdom_backgroud = array_rand($backgroud);
    $ramdom_color = array_rand($color);
	$txt = ["bot_profile"=>array(
"username"=>" BOT SAYSER",
"profile"=>"bot.jpeg",
"image"=>$_SESSION["image-x"],
"username_user"=>$username,
"email_user"=>$email,
"backgroud"=>$backgroud[$ramdom_backgroud],
"color"=>$color[$ramdom_color]
)];
    $json = json_encode ($txt, JSON_PRETTY_PRINT);
    fwrite($open, ","  . $json);
}

if (str_starts_with($message, $profix . "portfolio")) {
	$txt = ["portfolio"=>array("username"=>" BOT SAYSER","profile"=>"bot.jpeg","image"=>"sayser.jpg")];
    $json = json_encode ($txt, JSON_PRETTY_PRINT);
    fwrite($open, ","  . $json);
}

?>