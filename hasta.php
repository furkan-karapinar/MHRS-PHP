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
        <h1>Üye Olunuz</h1>
        <form action="islem.php" method="post">
        <div class="hasta">
               <input type="text" name="hasta_ad_soyad"placeholder="İsim Soyisim">
            </div>    
        <div class="hasta">
               <input type="text" name="hasta_tc"placeholder="TC NO.">
            </div>
            <div class="sifre">
                <input type="password" name="hasta_sifre" placeholder="Şifre">
            </div>
            <button type="submit" class="sub" id="giris" name="hastakaydet">Üye Ol</button>
            <br>
        </form>
        <a href="index.php"><button type="submit"class="sub" id="uye">Çıkış</button></a>
    </div>
</body>
</html>