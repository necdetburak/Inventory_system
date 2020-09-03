<?php
require "header.php";
require "config.php";
if(isset($_SESSION["login"]))
{
header("Location: stokgoruntuleme.php");
}
 ?>
<div class="form">
<form action="login.php" method="post">

<label>Username</label>
<input type="text" name="username" >

<label>Password</label>
<input type="password" name="password" >

<button class="myButton" type="submit" name="loginsubmit" >Giriş</button>
</form>
</div>

<?php
require "footer.php";
?>
