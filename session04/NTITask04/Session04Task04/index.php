<!--
Create a form with the following inputs
 (name, email, password, address, gender, linkedin url)
Validate inputs then return message to user . 
* validation rules ... 
name  = [required , string]
email = [required,email]
password = [required,min = 6]
address = [required,length = 10 chars]
gender = [required]
linkedin url = [reuired | url]
Profile image

Store data in your browser then read it in index page -->

<?php 
session_start();
require 'validators.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
   $name = CleanInputs($_POST['name']);
   $email= CleanInputs($_POST['email']);
   $password = $_POST['password'];
   $address = CleanInputs($_POST['address']);
   $websiteURL = CleanInputs($_POST['website']);
   $gender = $_POST['gender'];
   
   # FILE INFO ... 
   $image_tmp_path = $_FILES['image']['tmp_name'];
   $image_name     = $_FILES['image']['name'];
   $image_size     = $_FILES['image']['size'];
   $image_type     = $_FILES['image']['type'];

   # TO STORE ERRORS ... 
   $errors = [];
//******************** */ Check Valdition for name empty or invalid string *************
   if(!validate($name,1)){
     $errors['name'] = "Field Required";
   
    }elseif(!validate($name,2)){
     $errors['name'] = "Invalid String";
    }
//******************** */ Check Valdition for email empty or invalid email *************
   if(!validate($email,1)){
    $errors['Email'] = "Field Required";
  
   }elseif(!validate($email,3)){
    $errors['Email'] = "Invalid Email";
   }
//******************** */ Check Valdition for Password empty or Min lenght *************
   if(!validate($password,1)){
    $errors['password'] = "Field Required";
  
   }elseif(!validate($password,5)){
    $errors['password'] = "Password Must be more than 6 character";
   }
//******************** */ Check Valdition for Address empty or invalid address *************
   if(!validate($address,1)){
    $errors['address'] = "Field Required";
  
   }elseif(!validate($address,6)){
    $errors['address'] = "Address Must be more than 10 character";
   }
//******************** */ Check Valdition for Website URL empty or invalid URL *************
   if(!validate($websiteURL,1)){
    $errors['website'] = "Field Required";
  
   }elseif(!validate($websiteURL,7)){
    $errors['website'] = "Invalid URL";
   }

//******************** */ Check Valdition for Image empty or invalid Iamge *************
   if(!validate($image_name,1)){
    $errors['image'] = "Field Required";
  
   }elseif(!validate($image_type,4)){
    $errors['image'] = "Invalid Extension";
   }
   //******************** */ Check count of Errors Dispaly *************
   if(count($errors) > 0){

    $err ='';
    foreach($errors as $key => $value){
        $err .=$key." = >  ".$value."<br>";
    }
    echo '<div class="container p-2 alert alert-danger">
        '.$err.'</div><br>';
    
    }else{
        $extArray = explode('/',$image_type);
        $finalName = time().'.'.$extArray[1];

        $desPath = './uploads/'.$finalName;
         
         if(move_uploaded_file($image_tmp_path,$desPath)){
  
          $_SESSION['student'] = ['name' => $name , 'email' => $email ,
                                  'image' => $finalName,'password'=>$password,
                                   'address'=>$address, 'gender'=>$gender,'website'=>$websiteURL ];

         }else{
             echo 'Error In Uploading Try Again';
         }


    }
   
}

?>

<?php require 'inc.php' ?>
<body>
<div class="container">
  <h2>Login Form</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype ="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
   
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Gender</label>
    <input type="radio" name="gender"value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> >Female
    <input type="radio" name="gender"value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">LinkedIn Profile</label>
    <input type="text" name="website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Linkedin Profile">
  </div>

  
  <div class="form-group">
    <label for="exampleInputPassword1">Upload Profile Image</label>
    <input type="file" name="image" >
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>