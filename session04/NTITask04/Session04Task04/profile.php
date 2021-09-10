<?php  
session_start();
  $name     =  $_SESSION['student']['name']."<br>";
  $email    =  $_SESSION['student']['email']."<br>";
  $address  =  $_SESSION['student']['address']."<br>";
  $password =  $_SESSION['student']['password']."<br>";
  $gender   =  $_SESSION['student']['gender']."<br>";
 $image     =  $_SESSION["student"]["image"];
 $img = "image   <a href='./uploads/$image'.>Show image</a>";
function setcook($msg,$input){
    $reslt =setcookie($msg,$input,time()+86400,'/');
    echo $_COOKIE[$msg];
 }
 setcook('name',$name);
 setcook('email',$email);
 setcook('password',$password);
 setcook('address',$address);
 setcook('gender',$gender);
 setcook('image',$img);


?>
