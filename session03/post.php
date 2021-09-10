<?php 

$name =$_POST['name'];
$email =$_POST['email'];
$pass =$_POST['password'];

$err =array();


if(isset($_POST['submit'])){
    if(empty($_POST['name']))
    {
        $err['name']="Name Required";
    }
    if(empty($_POST['email'])){
        $err['emial']="Name Required";
    }
    if(empty($_POST['password'])){
        $err['name']="Password Required";        
    }
   
    }
    else
    {
        // echo "<script> alert('Enter Your Password')</script>";
    }
   
   

