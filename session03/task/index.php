<?php 
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $errors['name'] = "Name is required";
    } else {
      $name = checkInput($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $errors['rgex']= "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
      } else {
        $email = checkInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors['emailregx'] = "Invalid email format";
        }
      }

      if (empty($_POST["address"])) {
        $errors['address'] = "Adress is required And Address Must be 10 Char ";
      } else {
        $name = checkInput($_POST["address"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $errors['rgex']= "Only letters and white space allowed";
        }
      }
        
      if (empty($_POST["website"])) {
        $website = "";
        $errors['website'] = "Required URL";
      } else {
        $website = checkInput($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
          $errors['website'] = "Invalid URL";
        }
      }

      if (empty($_POST["gender"])) {
        $errors['gender'] = "Gender is required";
      } else {
        $gender = checkInput($_POST["gender"]);
      }

      if(empty($_POST["password"])){

        $errors['Password'] = "Password Required and Length Must be > 5 ch";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <style>
.error {color: #FF0000;}
</style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="POST"  enctype ="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  value="<?php echo $name ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error"><?php  echo $errors['name']; ?></span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <span class="error"><?php  echo  $errors['email']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
    <span class="error"><?php  echo  $errors['Password']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address"  value="<?php echo $address ?>" class="form-control" id="exampleInputPassword1" placeholder="Address">
    <span class="error"><?php  echo  $errors['address']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Gender</label>
    <input type="radio" name="gender"value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> >Female
    <input type="radio" name="gender"value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
    <span class="error"><?php  echo $errors['gender']; ?></span>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">LinkedIn Profile</label>
    <input type="text" name="website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Linkedin Profile">
    <span class="error"><?php  echo $errors['website']; ?></span>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
