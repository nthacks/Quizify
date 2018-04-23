<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id5443151_quizify');
define('DB_PASSWORD', 'Quiz@123');
define('DB_NAME', 'id5443151_qb');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
