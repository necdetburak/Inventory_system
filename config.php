<?php
$user='root';$pass="";
$dbh = new PDO('mysql:host=localhost;dbname=bilgislemtest', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
   {
   }
catch(PDOException $e)
   {
   echo "Bağlantı hatası: " . $e->getMessage();
   }
?>
