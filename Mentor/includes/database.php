<?php

$host = "localhost";
$dbname = "eialk_logindb";
$username = "eialk_newadmin";
$password = "J1bdt0b7ll9$";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
