<?php

function createLdifFile($uploadFile)
{
   $uploadFile = fopen($uploadFile['tmp_name'], 'r');
   $headers = fgetcsv($uploadFile, 0, ',');
   $headers = array_map('trim', $headers);
   $headers = array_map('strtolower', $headers);
   if (in_array("uhuuid", $headers)) {
      $column = array_keys($headers, "uhuuid");
      $column = $column[0];
      $ldapfilterField = $headers[$column];
   } else if (in_array("username", $headers)) {
      $column = array_keys($headers, "username");
      $column = $column[0];
      $ldapfilterField = "uid";
   } else {
      $column = 0;
      $ldapfilterField = 'uhuuid';
      // set pointer to beginning of file since it doesn't have
      // any header.
      rewind($uploadFile);
   }

   $ldapFilter = "(|";
   while (($fields = fgetcsv($uploadFile, 0, ',')) !== false) {
      $fields = array_map('trim', $fields);
      $fields = array_map('strtolower', $fields);

      $value = $fields[$column];
      $ldapFilter .= "($ldapfilterField=$value)";
   }
   $ldapFilter .= ")";

   $file = date('Y-m-d_h:i:s') . '-users.ldif'; 
   exec("ldapsearch -x -h ldap1.its.hawaii.edu -b 'ou=People,dc=hawaii,dc=edu' '$ldapFilter' > " . LDIF_DIR . "/$file");

   writeToJsonFile($file);
   formatLdifFile($file);

}

function formatLdifFile($ldifFile)
{
   $path = LDIF_DIR . "/$ldifFile";
   $file = fopen("$path", 'r');
   //exec("rm $path");

   $fileContent = "";
   while(($line = fgets($file)) !== false) {
      $line = trim($line);

      if ($line[0] !== "#" && strpos($line, "search:") !== 0 && strpos($line, "result:") !== 0) {
         $fileContent .= "$line\r\n";
      }
   }

   fclose($file);
   file_put_contents($path, $fileContent);

}

function writeToJsonFile($ldifFile)
{
   $jsonString = file_get_contents(JSON_LIST);

   $ldifFiles = json_decode($jsonString, true);

   $ldifFiles[$ldifFile]['status'] = 'new';
   file_put_contents(JSON_LIST, json_encode($ldifFiles));
}


function resultMessage($result)
{
   $type = $result['type'];
   $msg = $result['message'];
   $msgStr = "<div class='alert alert-$type'> $msg </div>";

   return $msgStr;
}

?>
