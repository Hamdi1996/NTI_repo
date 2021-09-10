<?php
/*******************Program No:01 ***************************/
$input = (string)readline('Enter your Charchter: ');
 function PrintChar($input) {
    if($input=='Z'){
        $nextChar = ord($input)-25;
        echo chr($nextChar);
    }
    elseif($input=='z'){
        $nextChar = ord($input)-25;
        echo chr($nextChar);
    }
    else{
   $nextChar = ord($input)+1;
   echo chr($nextChar);
    }     
}
     PrintChar($input);
     echo "\n";
/*******************Program No:02 ***************************/
$path ="www.example.com/public_html/indexs.php"; 
function extractfilname($path)
{
        $str = end(explode("/",$path));
        echo "filename => " . $str."\n";
}

extractfilname($path);


?>