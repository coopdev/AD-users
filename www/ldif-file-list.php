<?php
require_once('path-constants.php');
require_once(HELPERS . '/funcs.php');
require_once(APP_ROOT . '/www/layout/header.php');

$jsonFile = file_get_contents(JSON_LIST);
$ldifFiles = json_decode($jsonFile, true);
$ldifFiles = array_reverse($ldifFiles);

echo "<div class='container'>";

   echo "<div class='row'>"; // first row
      echo "<ul class='span6'>";
      foreach ($ldifFiles as $fileName => $fileAttribs) {
         echo "<li>";
            echo "<a href='file-download.php?file=$fileName'> $fileName </a> | Status: " . $fileAttribs['status'];
         echo "</li>";
      }
      echo "</ul>";

echo "</div>";

?>
