<?php 
require_once("../db_connect.php");

if (isset($_POST['delete'])) {
  $id = $_POST['id'];

  // Create message
  $db_handle->exec("DELETE FROM messages WHERE id='$id'");

  // redirect to previous page
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>