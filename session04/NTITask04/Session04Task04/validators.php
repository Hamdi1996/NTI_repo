<?php 
function validate($input,$flag){
$status = true;

 switch ($flag) {
     case 1:
         if(empty($input)){
           $status = false;
         }
         break;
    case 2: 
        if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
            $status = false;
        }
       break;
    case 3: 
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        } 
        break; 
    case 4: 
        $allowedExt = ['jpg','png','jpeg'];
        $extArray = explode('/',$input);
        if(!in_array($extArray[1],$allowedExt)){
            $status = false;
        }
      break;
    case 5: 
        if(!strlen($input) > 6){
            $status = false;
        }
      break;
    case 6: 
        if(!strlen($input) ==10){
            $status = false;
        }
      break;
    case 7: 
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$input)){
            $status = false;
        }
      break;
   }
    return $status;
}


function CleanInputs($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

     return $input;
}

