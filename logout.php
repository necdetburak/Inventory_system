<?php
require "header.php";

if(isset($_POST['logoutsubmit'])) {
  session_start();
  session_destroy();
  header('Location: index.php');
  session_unset();
  exit;
  }

require "footer.php";
 ?>
