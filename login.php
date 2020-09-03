<?php
require "header.php";
require "config.php";
try
{
  if (isset($_POST['loginsubmit']))
  {

    $username = $_POST['username'];

    $password = $_POST['password'];
  }//isset($_POST['loginsubmit']

$stmt = $dbh->prepare("SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");
$stmt->execute(array($username,$password));
$stmt2 = $stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
$_SESSION["login"] = true;
$_SESSION["uye"] = $stmt2['username'];
$_SESSION["id"] = $stmt2['id'];
header("Location: stokgoruntuleme.php");
}//($stmt->rowCount() > 0)
}//try {
catch (PDOException $e)
{
  $e->getMessage();
}

$errormsg="Wrong Username and Password";
echo '<body>';

echo '<p class="error">'.$errormsg .'</p>';

echo '</body>';

require "footer.php";
$stmt = null;
$dbh = null;

require "footer.php";
?>
