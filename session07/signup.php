<?php 

include "./includes/header.php";
require "./helper/connection.php";
require "./helper/validator.php";

// **************Check Method of Request*************************
if($_SERVER['REQUEST_METHOD'] == "POST"){
        //***********Get Data From input user and check validatiy*/
        
        $name     = CleanInputs($_POST['name']);
        $email    = CleanInputs($_POST['email']);
        $password = CleanInputs($_POST['password']);
        $role     = CleanInputs($_POST['role']);

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
       /********************Check Valid For Email ******************/
       if(!validate($password,1)){
        $errors['password']="Field Required";
    }
    elseif(!validate($password,6)){
        $errors['password']=" Password Must be more than 6 character";
    }
/****************iif there is no errors can be query********** */    
    if(count($errors)==0){
    $password = md5($password);
    $sqlquery = "INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES ('$name','$email','$password',$role)";
    $query = mysqli_query($conn,$sqlquery);
// var_dump($query);
   if($query){
      echo "<script>alert('Added Successfully!')</script>";
      header("Location:login.php");
    }
    else{
        echo mysqli_error($conn);
      // echo "<script>alert('Faied To Added !')</script>";
    }
  }



  }
?>

<div class="container">
  <h2>Sign Up</h2>
  <form method="POST"  action="<?php echo $_SERVER['SELF_'] ?>"  enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  value="<?php echo $name ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error"><?php  echo $errors['name']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" name="email" value="<?php echo $email ?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Email">
    <span class="error"><?php  echo $errors['email']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" value="<?php echo $password ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password">
    <span class="error"><?php  echo $errors['password']; ?></span>
  </div>



  <div class="form-group">
    <label for="exampleInputEmail1">Role</label>
    <select class="form-control" name="role">
      <option  value="1">doctor</option>
      <option  value="2">admin</option>
      <option  value="3">paitent</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

