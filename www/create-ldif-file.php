<?php

require_once('path-constants.php');

require_once(HELPERS . '/funcs.php');

$file = $_FILES['userfile'];

//die(var_dump($file));


if (!empty($file['name'])) {
   createLdifFile($file);
   session_start();
   $_SESSION['result']['type'] = 'success';
   $_SESSION['result']['message'] = "File has been uploaded";
   session_write_close();
   header("location: add-users.php");
} else {
   session_start();
   $_SESSION['result']['type'] = 'error';
   $_SESSION['result']['message'] = "Must choose file first";
   session_write_close();
   header("location: add-users.php");
   //echo "<h2> Must choose file first </h2>";
}


?>
