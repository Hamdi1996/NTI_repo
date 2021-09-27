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
        if(strlen($input) < 8){
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
      case 8: 
        if(!filter_var($input,FILTER_VALIDATE_INT)){
            $status = false;
        } 
        break; 
      case 9: 
        if (!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-])$/", $input, $matches)) 
        {     
            if (!checkdate($matches[2],$matches[3], $matches[1])) {             
                $status = false;        
            }    
        }     
      
        break; 
   }
    return $status;
}
/********************Fuction filiter id which can be interger only */
function santize($input,$flag){
    switch ($flag) {
        case 1:
            $input = filter_var($input,FILTER_SANITIZE_NUMBER_INT);     
            break; 
    }
    return $input;
}

function CleanInputs($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);
     return $input;
}

// function checkdat($date)
// {
//     $darr  = explode('/', $date);
// if (checkdate($darr[0], $darr[1], $darr[2])) {
//     // valid date ...
//     return true;
// }
// else
// {
//     return false;
// }
// }

