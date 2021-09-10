<?php
define("unit1",3.5);
define("unit2",4);
define("unit3",6.5);
$units = (integer)readline('Enter your amount/units: ');
if($units <=50){
    $bill = unit1 * $units;
    echo "Your Bill is : ".$bill."/unit";
}
elseif($units <=100){
    $bill = unit2 * $units;
    echo "Your Bill is : ".$bill."/unit";
} 
elseif($units >=150){
    $bill = unit3 * $units;
    echo "Your Bill is : ".$bill."/unit";
}
