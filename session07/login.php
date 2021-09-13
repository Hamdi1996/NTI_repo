<?php 
require "./helper/connection.php";
require "./includes/header.php";
require './helper/validator.php';

$email    = CleanInputs($_POST['email']);
$password = CleanInputs($_POST['password']);

$errors = [];
if($_SERVER['REQUEST_METHOD']=='POST'){

/***************Check Email Input******** */
    if(!validate($email,1)){
        $errors['email']="Field Required";
    }
    elseif(!validate($email,3)){
        $errors['email']="Invalid Email";
    }
/***************Check Password Input******** */

    if(!validate($password,1)){
        $errors['password']="Password Required";
    }
    elseif(!validate($password,5)){
        $errors['password']="Password Must More 8 character";
    }

    if(count($errors)==0){
        $password = md5($password);
        $sqlquery = "SELECT * FROM student where email='$email' AND password = '$password' ";
        $query = mysqli_query($conn,$sqlquery);
      
       if(mysqli_num_rows($query)==1){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user']=$row;
          header("Location:show.php");
        }
        else{
          echo "<script>alert('Faied To Login !')</script>";
        }
      }


}

?>

<div class="container">
  <h2>Login</h2>
  <form method="POST"  action="show.php"  enctype ="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" name="email" value="<?php echo $email ?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Email">
    <span class="error"><?php  echo $errors['email']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password">
    <span class="error"><?php  echo $errors['password']; ?></span>
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

</body>
</html>
