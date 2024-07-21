<?php include 'baslik.php';
include 'sql_scripts.php';


$mhrs_sehir = isset($_POST['sehir']) ? $_POST['sehir'] : null;
$mhrs_hastane = isset($_POST['hastane']) ? $_POST['hastane'] : null;
$mhrs_doktor = isset($_POST['doktor']) ? $_POST['doktor'] : null;
$mhrs_tarih = isset($_POST['tarih']) ? $_POST['tarih'] : null;
$mhrs_klinik = isset($_POST['klinik']) ? $_POST['klinik'] : null;


$saatler = array();

// Saat seçeneklerini belirli aralıklarda diziye ekle
for ($saat = 9; $saat < 16; $saat++) {
    if ($saat == 12 || $saat == 13) {
        continue;
    }
    for ($dakika = 0; $dakika < 60; $dakika += 10) {
        // Saati ve dakikayı uygun formata dönüştürme
        $saat_str = str_pad($saat, 2, "0", STR_PAD_LEFT);
        $dakika_str = str_pad($dakika, 2, "0", STR_PAD_LEFT);
        // Dizinin sonuna yeni bir öğe ekleme
        array_push($saatler, $saat_str . ':' . $dakika_str);
    }
}

$saatler = array_diff($saatler, alinamayan_randevu_saatleri($mhrs_sehir, $mhrs_tarih, $mhrs_hastane, $mhrs_doktor, $mhrs_klinik));


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

    <div class="isimsoyisim">
        <h4> Hoşgeldiniz <?php echo $hastacekek['hasta_ad_soyad']; ?> </h4>
    </div>

    <div class="orta_div" id="randevu_div">

        <h1>Randevu Saati Seçin</h1>
        <form action="islem.php" method="post">


            <input name="sehir" class="randevu" type="hidden" value="<?= $mhrs_sehir ?>">             <!-- Anasayfadan gelen bilgileri gizli input ile form içinde tuttuk. -->

            <input type="hidden" name="hastane" class="hastane" value="<?= $mhrs_hastane ?>">

            <input type="hidden" name="klinik" class="klinik" value="<?= $mhrs_klinik ?>">

            <input type="hidden" name="doktor" class="doktor" value="<?= $mhrs_doktor ?>">

            <input type="hidden" name="tarih" value="<?= $mhrs_tarih ?>">


            <select name="saat" id="saat" class="randevu"> 
                <?php
                // Saat seçeneklerini dizi içinde döngü ile liste
                foreach ($saatler as $saat) {
                    echo '<option value="' . $saat . '">' . $saat . '</option>';
                } ?>

            </select>
            <input type="hidden" name="hasta_id" value="<?php echo $hastacekek['hasta_id']; ?>">
            <button name="Randevuyu_Kaydet">Randevuyu Kaydet</button> <!-- Randevu kaydı onaylandığında verileri islem.php ye gönderir post yöntemiyle  -->
        </form>
    </div>

    <div class="orta_div" id="ailehekimi_div">
        <h3>Aile Hekimi</h3>
        <p>
            Aile HekiminiZ.
        </p>


    </div>


</body>

</html>