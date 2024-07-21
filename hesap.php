<?php   include 'baslik.php';        ?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHRS OTOMASYON</title>
</head>
<body>
<form action="guncelle.php" method="post"> <!-- POST yöntemi ile guncelle.php sayfasına ad soyad tc ve şifre verileri gönderilir.  -->
    <div class="hesap_con">
        <div class="label">
            <label>ADI SOYADI: </label>
            <label  name="hasta_ad_soyad" > <?php echo $hastacekek['hasta_ad_soyad']; ?></label> <!-- Düzenleme ihtiyacı bulunmadığından ve güvenlik riski oluşturacağından input etiketi label a çevirildi  -->
        </div><br>

        <div class="label">
            <label>TC NO: </label>
            <label > <?php echo $hastacekek['hasta_tc']; ?></label> <!-- Düzenleme ihtiyacı bulunmadığından ve güvenlik riski oluşturacağından input etiketi label a çevirildi  -->
            <input type="hidden" name="hasta_tc" value="<?php echo $hastacekek['hasta_tc']; ?>"> <!-- guncelle.php nin şifre güncelleme işini yapabilmesi için tc bilgisine ihtiyaç duymakta. Bu yüzden gizli bir input oluşturuldu ve varsayılan değeri tc olarak atandı  -->
        </div><br>

        <div class="label">
            <label>Şifre</label>
            <input type="text" name="hasta_sifre" placeholder="<?php echo $hastacekek['hasta_sifre']; ?>" value="<?php echo $hastacekek['hasta_sifre']; ?>"> <!-- placeholder: ipucu olarak oraya ne girilmeli onu gösterir.        value: varsayılan olarak girilen değerdir.  -->
        </div><br>

        <button type="submit" name="guncelle">Güncelle</button>
    </div>
</form>


</body>
</html>