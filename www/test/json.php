<?php
$jsonFile = file_get_contents('../../ldif-files/list.json');

$ldifFiles = json_decode($jsonFile, true);

foreach ($ldifFiles as $key => $val) {
   echo $key;

}


?>
