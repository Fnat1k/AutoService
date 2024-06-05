<?php
/*

*
*/
$user = 'root';
$password = ''; 
$database = 'autoservice'; 
$port = NULL; 
$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

//echo '<p>Connection OK '. $mysqli->host_info.'</p>';
//echo '<p>Server '.$mysqli->server_info.'</p>';
//echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';


?>
