<?php
/* Database credentials.*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '2108418');
define('DB_PASSWORD', 'Leslieblantina@1');
define('DB_NAME', 'db2108418');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>