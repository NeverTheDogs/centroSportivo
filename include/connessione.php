<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASS', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'centro_sportivo');
DEFINE ('DB_NAME_ROOT', 'mysql');
DEFINE ('DB_SALT', 'oravidemocomucazzufai');
$connect= mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connect_root= mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME_ROOT);

?>