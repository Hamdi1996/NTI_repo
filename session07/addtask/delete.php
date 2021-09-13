<?php 
require '../helper/connection.php';

if($_SERVER['REQUEST_METHOD'] == "GET"){

 require '../helper/validator.php';
 $id = santize($_GET['id'],1);    

 $errors = [];
if(!validate($id,8)){
  $errors['id'] = "InValid Id";    
 }
 if(count($errors) == 1){
     $_SESSION['Message'] = $errors['id'];
 }else{
    $sqlquery = "delete from tasks where id= $id";
    $query    = mysqli_query($conn,$sqlquery);

     if($query){
         $message = "Account Deleted.";
     }else{
         $message = "Error Try Again.";
     }

     $_SESSION['Message'] = $message;
 }
  
  header("Location: show.php");

}

?>