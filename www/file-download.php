<?php
require_once('path-constants.php');

$file = $_GET['file'];

$filePath = LDIF_DIR . "/$file";

//die($filePath);

if ($fd = fopen($filePath, 'r')) {
    $fsize = filesize($filePath);
    $path_parts = pathinfo($filePath);
    header("Content-type: application/octet-stream");
    header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;
// example: place this kind of link into the document where the file download is offered:
// <a href="download.php?download_file=some_file.pdf">Download here</a>


?>
