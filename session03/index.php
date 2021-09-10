<?php 


// $students = [
//     ["ahmed",20,3.2],
//     ["Omar",21,3.3],
//     ["Root",22,2.1]
//   ];

//   for ($i=0; $i <count($students);$i++) { 
//       for ($j=0; $j <count($students[$i]); $j++) { 
//           echo $students[$i][$j]."\t";
//       }
//       echo "\n";
//   }

//   echo "/**********************************\n";

//   for ($i=0; $i < count($students); $i++) {
//     if($i==1){
//         continue;
//     }  
//       for ($j=0; $j <count($students[$i]) ; $j++) {
//         echo $students[$i][$j]."\t";
//       } 
//       echo "\n";
//   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="POST" action="post.php" enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  
  <button type="submit"  name ="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

