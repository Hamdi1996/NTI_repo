<?php


include "../helper/connection.php";
require "../helper/validator.php";
require "../includes/header.php";
// **************Check Method of Request*************************
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //***********Get Data From input user and check validatiy*/
    
    $day          = CleanInputs($_POST['day']);
    // $description    = CleanInputs($_POST['description']);
    $start          = CleanInputs($_POST['start']);
    $end            = CleanInputs($_POST['end']);

   $errors =array();
   
   /**********************Check input valid***********************/
  //  if(!validate($day,1)){
  //      $errors['day']="Field Required";
  //  }
  //  elseif(!validate($day,2)){
  //      $errors['day']="Invalid String";
  //  }

  //  /********************Check Valid For Email ******************/
  //  if(!validate($description,1)){
  //       $errors['description']="Field Required";
  //   }
  //   elseif(!validate($description,2)){
  //       $errors['description']="Invalid String";
  //   }
  //  /********************Check Valid For Email ******************/
  // //  if(!validate($description,1)){
  // //       $errors['description']="Field Required";
  // //   }
  // //   elseif(!validate($description,2)){
  // //       $errors['description']="Invalid String";
  // //   }

  //  if(!validate($start,1)){
  //       $errors['start']="Field Required";
  //   }
    

  //  if(!validate($end,1)){
  //       $errors['end']="Field Required";
  //   }
    

/****************iif there is no errors can be query********** */    
// if(count($errors)==0){
  
$sqlquery = "INSERT INTO `appointment`(`day`, `startDate`, `endDate`, `doctor_id`)
VALUES ('$day','$start','$end','1')";
$query = mysqli_query($conn,$sqlquery);
var_dump($sqlquery);
if($query){
  echo "<script>alert('Added Successfully!')</script>";
//   header("Location:login.php");
}
else{
  echo "<script>alert('Faied To Added !')</script>";
}
}

// }
?>

<div class="container">
  <h2>Appiontment</h2>
  <form method="POST"  action="<?php echo $_SERVER['SELF_'] ?>"  enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Day</label>
    <input type="date" name="day"  value="<?php echo $day ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error"><?php  echo $errors['day']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Start Date</label>
    <input type="time" name="start" value="<?php echo $start ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password">
    <span class="error"><?php  echo $errors['start']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">End Date</label>
    <input type="time" name="end" value="<?php echo $end ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Password">
    <span class="error"><?php  echo $errors['end']; ?></span>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
