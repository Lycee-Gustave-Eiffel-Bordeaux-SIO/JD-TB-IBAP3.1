<?php
require_once 'vue/vueDeconnexion.php' ;

session_destroy();
header("Location: " . $_SERVER['PHP_SELF']);
exit();