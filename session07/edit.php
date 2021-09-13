<?php 
require "./helper/connection.php";
require "./includes/header.php";
require './helper/validator.php';

$id = santize($_GET['id'],1);    // $_REQUEST

$errors = [];
if(!validate($id,6)){
 $errors['id'] = "InValid Id";      
}
if(count($errors) == 1){
    // 
    $_SESSION['Message'] = $errors['id'];
    
    header("Location: show.php");
}else{

   $sqlquery = "select * from student where id = $id";
   $query    = mysqli_query($conn,$sqlquery);
   $row      = mysqli_fetch_assoc($query);

}

// **************Check Method of Request*************************
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //***********Get Data From input user and check validatiy*/
    
    $name     = CleanInputs($_POST['name']);
    $email    = CleanInputs($_POST['email']);
    $errors =array();
       
    /**********************Check input valid***********************/
    if(!validate($name,1)){
        $errors['name']="Field Required";
    }
    elseif(!validate($name,2)){
        $errors['name']="Invalid String";
    }

    /********************Check Valid For Email ******************/
    if(!validate($email,1)){
     $errors['email']="Field Required";
 }
 elseif(!validate($email,3)){
     $errors['email']="Invalid Email";
 }

 /****************************Updat Query From data base*************** */
 $sqlquery = "update student set name='$name' , email = '$email'  where id = $id ";
     $query = mysqli_query($conn,$sqlquery);
     if($query){
         $message =  'Update done';
     }else{
         $message =  'Error in Update';
       }
      $_SESSION['Message'] = $message; 
      header("Location: show.php");
}
?>
<div class="container">
  <h2>Update</h2>
  <form method="POST"  action="edit.php?id=<?php echo $row['id'];?>"  enctype ="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  value="<?php echo $row['name']; ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error"><?php  echo $errors['name']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" name="email" value="<?php echo $row['email'] ?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Email">
    <span class="error"><?php  echo $errors['email']; ?></span>
  </div>



  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>
