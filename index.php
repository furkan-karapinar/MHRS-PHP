<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MHRS OTOMASYON</title>
</head>
<body>
    <header>
        <h3>Merkezi Hastane Randevu Sistemi</h3>
    </header>

    <div class="tablo_arka">
        <h1>Giriş Yapınız</h1>
        <form action="islem.php" method="post">
            <div class="hasta">
            <input type="text" name="hasta_tc" placeholder="TC NO." maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '');">  <!-- maxlength: max karakter sınırı     oninput: karakter girişinde yapılacak şeyleri içerir ve burada sadece sayı girilmesine izin verildi -->

            </div>
            <div class="sifre">
            <input type="password" name="hasta_sifre" placeholder="Şifre" minlength="8"> <!-- minlength: min karakter sınırı   -->

            </div>
            <button type="submit" class="sub" id="giris" name="giris_yap">Giriş</button>
            <br>
        </form>
        <a href="hasta.php"><button type="submit"class="sub" id="uye">Üye Ol</button></a>
    </div>
</body>
</html>