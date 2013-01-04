<?php
session_start(); // must be at top of file.
require_once('path-constants.php');
require_once(APP_ROOT . '/www/layout/header.php');
require_once(HELPERS . '/funcs.php');
//die(var_dump($_SESSION['result']));
?>

<!-- FILE UPLOAD FORM -->


<div class="container">
   <?php 
      if (isset($_SESSION['result'])) { 
         echo resultMessage($_SESSION['result']);
         unset($_SESSION['result']);
      }
   ?>
   <!-- The data encoding type, enctype, MUST be specified as below -->
   <form enctype="multipart/form-data" action="create-ldif-file.php" method="POST">
       <!-- MAX_FILE_SIZE must precede the file input field -->
       <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
       <!-- Name of input element determines name in $_FILES array -->
       Upload file: <input name="userfile" type="file" />
       <input type="submit" value="Send File" />
   </form>
</div>
