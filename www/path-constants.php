<?php

if (!defined(APP_ROOT)) {
   define('APP_ROOT', '..');
}

if (!defined(HELPERS)) {
   define('HELPERS', APP_ROOT . '/inc/helpers');
}

if (!defined(LDIF_DIR)) {
   define('LDIF_DIR', APP_ROOT . '/ldif-files');
}

if (!defined(JSON_LIST)) {
   define('JSON_LIST', LDIF_DIR . '/list.json');
}

?>
