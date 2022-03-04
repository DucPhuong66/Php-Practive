<?php
$db_handle = mysqli_connect("localhost", "root", "","coffee-shop");
// Check connection
if ($db_handle->connect_error) {
    die("Connection failed: " . $db_handle->connect_error);
  }
  echo "";
?>