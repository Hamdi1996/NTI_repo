<?php 
session_start();

$_SESSION['name'];
$_SESSION['email'];
$_SESSION['file'];
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
$errors = array();
if($_SERVER['REQUEST_METHOD']=='POST'){

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

    if(!empty($_FILES['file']['name'])){
    $temp_path = $_FILES['file']['temp_name'];
    $fle_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $extallow = ['pdf','docs'];
    $ext = explode('/',$file_type);

    if(in_array($ext[1],$extallow)){
        $filename = time().'.'.$ext[1];
        $destfile ='./uploads/'.$filename;
        if(move_uploaded_file($temp_path,$destfile)){
            echo "<script>alert('File Uploaded')</script>";
        }
        else 
        {
            echo "<script>alert('OOPs !!')</script>";
        }
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <style>
.error {color: #FF0000;}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form</h2>
  <form method="POST"  action="<?php echo $_SERVER['SELF_'] ?>"  enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  value="<?php echo $name ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error"><?php  echo $errors['name']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="text" name="email" value="<?php echo $email ?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Email">
    <span class="error"><?php  echo $errors['email']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">File Upload</label>
    <input type="file" name="file"   class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>

</body>
</html>

