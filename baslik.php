<?php

ob_start();
session_start();
include 'baglanti.php';

$hastasor=$db->prepare("SELECT * FROM hasta WHERE hasta_tc=:hasta_tc");
$hastasor->execute([
     'hasta_tc' =>$_SESSION['hastahasta_tc']
]);
$say=$hastasor->rowCount();
$hastacekek=$hastasor->fetch(PDO::FETCH_ASSOC);

if($say==0){
header("location:index.php?durum=izinsiz");
exit();


}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MHRS OTOMASYON</title>
</head>
<body>
    <div class="ust_bar">
        <a href="anasayfa.php"><h1> MHRS OTOMASYONU</h1></a> 
    <div class="menu">
        <a href="hesap.php"><h5>Hesap Bilgileri</h5></a>
        <a href="randevu.php"><h5>Randevu Bilgileri</h5></a>
    </div>
</div>

<a href="cikis.php"> <div class="cikis">
    Çıkış Yapınız
</div> </a>



</body>
</html>