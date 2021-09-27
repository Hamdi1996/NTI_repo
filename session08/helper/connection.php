<?php  
session_start();
$ServerName="localhost";
$dbName="group6";
$username="root";
$pass="";
// *******************Connected to database******************
$conn =mysqli_connect($ServerName,$username,$pass,$dbName);
if(!$conn){
    echo "Error : ".mysqli_connect_error();
}

?>