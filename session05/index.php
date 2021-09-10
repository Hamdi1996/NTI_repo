<?php  

$file = fopen('fnm.txt','w') or die ('unable to open file');
$msg = "WLCOME TO PHP FILE";
fwrite($msg,$file);

$msg = "WLCOME TO JS FILE";
fwrite($msg,$file);

fclose($file);








