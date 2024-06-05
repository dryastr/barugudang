<?php
$mysqli = new mysqli('localhost', 'username', 'password', 'db_warehouse');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>