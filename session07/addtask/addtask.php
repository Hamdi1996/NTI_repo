<?php


include "../helper/connection.php";
require "../helper/validator.php";
require "../includes/header.php";
// **************Check Method of Request*************************
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //***********Get Data From input user and check validatiy*/
    
    $title          = CleanInputs($_POST['title']);
    $description    = CleanInputs($_POST['description']);
    $start          = CleanInputs($_POST['start']);
    $end            = CleanInputs($_POST['end']);

   $errors =array();
   
   /**********************Check input valid***********************/
   if(!validate($title,1)){
       $errors['title']="Field Required";
   }
   elseif(!validate($title,2)){
       $errors['title']="Invalid String";
   }

   /********************Check Valid For Email ******************/
   if(!validate($description,1)){
        $errors['description']="Field Required";
    }
    elseif(!validate($description,2)){
        $errors['description']="Invalid String";
    }
   /********************Check Valid For Email ******************/
   if(!validate($description,1)){
        $errors['description']="Field Required";
    }
    elseif(!validate($description,2)){
        $errors['description']="Invalid String";
    }
   if(!validate($start,1)){
        $errors['start']="Field Required";
    }
    

   if(!validate($end,1)){
        $errors['end']="Field Required";
    }
    

/****************iif there is no errors can be query********** */    
if(count($errors)==0){
$sqlquery = "INSERT INTO `tasks`(`title`, `description`, `sDate`, `endDate`) 
VALUES ('$title','$description','$start','$end')";
$query = mysqli_query($conn,$sqlquery);

if($query){
  echo "<script>alert('Added Successfully!')</script>";
//   header("Location:login.php");
}
else{
  echo "<script>alert('Faied To Added !')</script>";
}
}

}
?>

<div class="container">
  <h2>Add Task</h2>
  <form method="POST"  action="<?php echo $_SERVER['SELF_'] ?>"  enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title"  value="<?php echo $title ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error"><?php  echo $errors['title']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="description" value="<?php echo $description ?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Email">
    <span class="error"><?php  echo $errors['description']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Start Date</label>
    <input type="text" name="start" value="<?php echo $start ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password">
    <span class="error"><?php  echo $errors['start']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">End Date</label>
    <input type="text" name="end" value="<?php echo $end ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password">
    <span class="error"><?php  echo $errors['end']; ?></span>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
