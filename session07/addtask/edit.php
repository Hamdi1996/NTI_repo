<?php 
include "../helper/connection.php";
require "../helper/validator.php";
require "../includes/header.php";

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

   $sqlquery = "select * from tasks where id = $id";
   $query    = mysqli_query($conn,$sqlquery);
   $row      = mysqli_fetch_assoc($query);

}

// **************Check Method of Request*************************
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //***********Get Data From input user and check validatiy*/
    
    $title          = CleanInputs($_POST['title']);
    $description    = CleanInputs($_POST['description']);
    $start          = CleanInputs($_POST['start']);
    $end            = CleanInputs($_POST['end']);

    $errors =array();
       
    /**********************Check input valid***********************/
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
 /****************************Updat Query From data base*************** */
 $sqlquery = "UPDATE `tasks` SET `title`='$title',`description`='$description',`sDate`='$start',`endDate`='$end' WHERE id='$id' ";
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
  <h2>Edit Task</h2>
  <form method="POST"  action="<?php echo $_SERVER['SELF_'] ?>"  enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title"  value="<?php echo $row['title']; ?>" class="form-control" id="exampleInputName" aria-describedby="" >
    <span class="error"><?php  echo $errors['title']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="description" value="<?php echo $row['description']; ?>"  class="form-control" id="exampleInputName" aria-describedby="" >
    <span class="error"><?php  echo $errors['description']; ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Start Date</label>
    <input type="text" name="start" value="<?php echo $row['sDate'] ?>" class="form-control" id="exampleInputName" aria-describedby="" >
    <span class="error"><?php  echo $errors['start']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">End Date</label>
    <input type="text" name="end" value="<?php echo $row['endDate'] ?>" class="form-control" id="exampleInputName" aria-describedby="" >
    <span class="error"><?php  echo $errors['end']; ?></span>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>
