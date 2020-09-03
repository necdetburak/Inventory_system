<ul>
  <li>
  <form action="logout.php" method="post">
  <button class="myButton" type="submit" name="logoutsubmit" >Çıkış</button>
  </form>
</li>
  <li>
    <form action="ekleme_cikarma.php" method="post">
    <button class="myButton" type="submit" name="ekleme-cikarmasubmit" >Ekleme-Çıkarma</button>
    </form>
  </li>
  <li>
    <form action="stokgoruntuleme.php" method="post">
    <button class="myButton" type="submit" name="goruntulemesubmit" >Görüntüleme</button>
    </form>
  </li>
</ul>

<div class="form">
  <form action="odunc.php" method="post">

  <label>İsim</label>
  <input type="text" name="oduncisimekleme" >

  <label>Sayı</label>
  <input type="text" name="oduncsayiekleme" >

  <label>Alan Kişi</label>
  <input type="text" name="odunckisiekleme" >

  <button class="myButton" type="submit" name="oduncsubmit" >Ekleme</button>
  </form>
</div>

<?php require "header.php";
require "config.php";
$sorgu = 'SELECT * FROM odunc WHERE goruntuleme = 1';
$data=$dbh->query($sorgu);


 ?>
 <div class="table-wrapper">
   <table class="fl-table">
     <tr>
         <th>İsim</th>
         <th>Ödünç Alan kişi</th>
         <th>Sayı</th>
         <th>Tarih</th>
     </tr>
     <?php while ($row = $data->fetch())
     {?>
     <tr>
     <td><?php echo $row['Isim']; ?></td>
     <td><?php echo $row['Alan_kisi']; ?></td>
     <td><?php echo $row['Sayi']; ?></td>
     <td><?php  $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s",$row['Zaman']); echo $new_datetime->format('d/m/y, H:i:s'); ?></td>
     <td>
       <form action="odunc.php" method="post">
       <button class="silbutton" type="submit" name="delete-submit" value="<?php echo $row['ID']; ?>" >Sil</button>
       </form>
     </td>
     </tr>
   <?php } ?>
     </table>
 </div>

<?php
if(isset($_POST['delete-submit']))
{
  $osilme = $_POST['delete-submit'];
  $query = $dbh->prepare("UPDATE odunc SET goruntuleme=0 WHERE ID ='{$osilme}' ");
  $query->execute();
  ?>
  <script>
  alert("Bilgiler silinmiştir");
  window.location.href='odunc.php';
  </script>
  <?php
}
else if (isset($_POST['oduncsubmit']))
{
  if(!empty($_POST['oduncisimekleme']))
  {
  $ISIM = $_POST['oduncisimekleme'];
  $SAYI = $_POST['oduncsayiekleme'];
  $ALAN_KISI = $_POST['odunckisiekleme'];
  $query = $dbh->prepare("INSERT INTO odunc SET Isim=?,Alan_kisi=?,Sayi=?");
  $query->execute(array($ISIM,$SAYI,$ALAN_KISI));
  ?>
  <script>
  alert("Bilgiler kayıt edilmiştir");
  window.location.href='odunc.php';
  </script>
  <?php
  }
}
else {
  ;
}
?>

<?php    require "footer.php"; ?>
