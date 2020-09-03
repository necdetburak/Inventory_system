<?php
require "header.php";
require "config.php";
?>
<div>
    <form action="stokgoruntuleme.php" method="post">
<button class="myButton" type="submit" name="stok-donme" >Stok</button>
</form>
</div>
<div class="form">
  <form action="ekleme_cikarma.php" method="post">

  <label>ISIM</label>
  <input type="text" name="ISIM-ekleme" >

  <label>SAYI</label>
  <input type="text" name="SAYI-ekleme" >

  <label>ALAN KISI</label>
  <input type="text" name="ALAN_KISI-ekleme" >

  <button class="myButton" type="submit" name="ekleme-submit" >Ekleme</button>
  </form>
</div>
 <?php

if(isset($_POST['ekleme-submit']))
{
$ISIM = $_POST['ISIM-ekleme'];
$SAYI = $_POST['SAYI-ekleme'];
$ALAN_KISI = $_POST['ALAN_KISI-ekleme'];
$query = $dbh->prepare("INSERT INTO stok SET Isim=? ,Sayi=?, Alan_Kisi=? ");
$insert = $query->execute(array($ISIM,$SAYI,$ALAN_KISI));
?>
<script>
alert("Bilgiler kayıt edilmiştir");
window.location.href='ekleme_cikarma.php';
</script>
<?php
}

else {
  ;
}
$query = 'SELECT * FROM stok WHERE goruntuleme = 1';
$data=$dbh->query($query, PDO::FETCH_ASSOC);

 ?>
 <div class="table-wrapper">
   <table class="fl-table">
     <tr>
         <th>İsim</th>
         <th>Sayı </th>
         <th>Tarih</th>
         <th>Alan kişi</th>
     </tr>
     <?php while ($row = $data->fetch())
     {?>
     <tr>
       <td><?php echo $row['Isim']; ?></td>
       <td><?php echo $row['Sayi']; ?></td>
       <td><?php  $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s",$row['Tarih']); echo $new_datetime->format('d/m/y, H:i:s'); ?></td>
       <td><?php echo $row['Alan_Kisi']; ?></td>
     <td>
       <form action="ekleme_cikarma.php" method="post">
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
  $query = $dbh->prepare("UPDATE stok SET goruntuleme=0 WHERE ID ='{$osilme}' ");
  $query->execute();
  ?>
  <script>
  alert("Bilgiler silinmiştir");
  window.location.href='ekleme_cikarma.php';
  </script>
  <?php
}
?>
