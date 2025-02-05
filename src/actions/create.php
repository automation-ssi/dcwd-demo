<?php 
require_once("../db_connect.php");

if (isset($_POST['submit'])) {
  $message = $_POST['message'];

  // Create message
  $db_handle->exec("INSERT INTO messages (`message`) VALUES ('$message')");

  // redirect to previous page
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>