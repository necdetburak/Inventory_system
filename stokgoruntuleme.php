<?php
require "header.php";
require "config.php";

$dizi=1;
$query = 'SELECT * FROM stok WHERE goruntuleme = 1';
$data=$dbh->query($query, PDO::FETCH_ASSOC);

if (isset($_POST['teklisubmit']))
{
$aranan =  $_POST['arama'];
$query2 = "SELECT * FROM stok WHERE Isim LIKE '%{$aranan}%' AND goruntuleme = 1";
$stmt=$dbh->query($query2, PDO::FETCH_ASSOC);
$row2 = $stmt->fetchAll();
}

?>


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
    <form action="odunc.php" method="post">
    <button class="myButton" type="submit" name="oduncsubmit" >Ödünç</button>
    </form>
  </li>
</ul>
<div class="formsag">
    <form action="stokgoruntuleme.php" method="post">
      <label>Arama</label>
      <input type="text" name="arama" required >
    <button class="myButton" type="submit" name="teklisubmit" >Bul</button>
    </form>

</div>

<div class="table-wrapper">
  <table class="fl-table">
    <tr>
        <th>Sıra No</th>
        <th>İsim</th>
        <th>Sayı</th>
        <th>Tarih</th>
        <th>Alan kişi</th>
    </tr>
    <?php while ($row = $data->fetch())
    {?>
    <tr>
    <td><?php echo $dizi;$dizi++; ?></td>
    <td><?php echo $row['Isim']; ?></td>
    <td><?php echo $row['Sayi']; ?></td>
    <td><?php  $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s",$row['Tarih']); echo $new_datetime->format('d/m/y, H:i:s'); ?></td>
    <td><?php echo $row['Alan_Kisi']; ?></td>
    </tr>
  <?php } ?>
    </table>
</div>

<div class="table-wrapper">
  <table class="fl-table">
    <tr>
        <th>İsim</th>
        <th>Sayı</th>
        <th>Tarih</th>
        <th>Alan kişi</th>
    </tr>
    <tr>
      <?php

  if(!empty($row2))
      {
        for($d=0;$d<=count($row2)-1;$d++){
        ?>
    <td><?php echo $row2[$d]['Isim']; ?></td>
    <td><?php echo $row2[$d]['Sayi']; ?></td>
    <td><?php  $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s",$row2[$d]['Tarih']); echo $new_datetime->format('d/m/y, H:i:s'); ?></td>
    <td><?php echo $row2[$d]['Alan_Kisi']; ?></td>
    </tr>
      <?php
    }
     }
      else
      {
        echo "<tr><td>Kayıt Bulunumadı</td></tr>";
      }

       ?>
    </table>
</div>
 <?php require "footer.php"; ?>
