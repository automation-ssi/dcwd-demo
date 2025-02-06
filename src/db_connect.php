<?php
error_reporting(E_ALL);

$db_host = 'mariadb';
$db_name = 'example';
$db_user = 'root';
$db_pass = 'example';

// Create a new PDO instance
$db_handle = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);