<?php 
session_start();
  $value = $_SESSION['student'];
  setcookie('Message',$value,time()+86400,'/');
  echo  $_COOKIE['Message'];

?>