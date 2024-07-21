<?php include 'baslik.php';
include 'sql_scripts.php';
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
        <h1>Hızlı Randevu Al</h1>
        <form action="randevu_al.php" method="post">


            <select name="sehir" class="randevu" onchange=" sehirDegisti(); hastaneDegisti();"> <!-- onchange kısmı seçilen dışında başka bir şehir seçtiğinizde sehirDegisti adlı javascript fonksiyonunu çalıştırır.   -->
                <option value="İl Seçin">İl</option>
                <?php echo sehirleriListele(); // Veritabanından şehirler listesini alır ve şehir kısmına seçenek olarak ekler.  
                ?>
            </select>

            <select name="hastane" class="hastane" onchange="hastaneDegisti(); "> <!-- onchange kısmı seçilen dışında başka bir hastane seçtiğinizde hastaneDegisti adlı javascript fonksiyonlarını çalıştırır.   -->
                <option value="hastane">Hastane Seç</option>
            </select>

            <select name="klinik" class="klinik" onchange="hastaneDegisti();"> <!-- onchange kısmı seçilen dışında başka bir klinik yada bölüm seçtiğinizde hastaneDegisti adlı javascript fonksiyonunu çalıştırır.   -->
                <option value="klinik">klinik Seç</option>
                <?php echo bolumleriListele(); // Veritabanından bölümler listesini alır ve klinik kısmına seçenek olarak ekler  
                ?>
            </select>

            <select name="doktor" class="doktor">
                <option value="doktor">doktor Seç</option>
            </select>

            <input type="date" name="tarih" value="<?php echo date('Y-m-d'); ?>">

            <input type="hidden" name="hasta_id" value="<?php echo $hastacekek['hasta_id']; ?>"> <!-- POST ile verilerin gönderileceği sayfanın hasta_id bilgisine ihtiyacı olduğundan gizli bir input (veri giriş noktası) oluşturuldu. Varsayılan değer olarak gerekli id bilgisi tanımlandı. -->
            <button name="Randevuyu_Kaydet">İleri</button>
        </form>
    </div>

    <div class="orta_div" id="ailehekimi_div">
        <h3>Aile Hekimi</h3>
        <p>
            Aile HekiminiZ.
        </p>


    </div>

    <script>

        // Şehir seçimi değiştiğinde çalışacak fonksiyon
        function sehirDegisti() {
            // Seçili şehrin ID'sini al
            var seciliSehirIndex = document.querySelector('.randevu').selectedIndex;

            // Şehir ID'sini kullanarak hastaneleri getir
            getHastaneler(seciliSehirIndex);
            setTimeout(function() {hastaneDegisti();},250); // hastaneDegisti fonksiyonunu ufak bir bekleme sonrası çalıştırır.
        }

        // Ajax ile hastaneleri getiren fonksiyon
        function getHastaneler(sehirId) {
            // Ajax ile hastaneleri al
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Yanıtı al
                    var response = JSON.parse(this.responseText);

                    // Hastaneleri ekle
                    var hastaneSelect = document.querySelector('.hastane');
                    hastaneSelect.innerHTML = ''; // Önceki seçenekleri temizle
                    response.forEach(function(hastane) {
                        // Burada tek tek seçenekler oluşturuluyor
                        var option = document.createElement('option');
                        option.text = hastane;
                        option.value = hastane;
                        hastaneSelect.add(option);
                    });
                }
            };
            xhr.open('GET', 'hastaneleri_getir.php?sehir_id=' + sehirId, true); // Arkaplanda hastaneleri_getir.php sayfanına hastane listesini almak için istek yollar
            xhr.send();
        }

        // Hastane seçimi değiştiğinde çalışacak fonksiyon
        function hastaneDegisti() {
            // Seçili hastanenin değerini al
            var seciliHastane = document.querySelector('.hastane').value;
            var seciliKlinik = document.querySelector('.klinik').selectedIndex;

            // Ajax ile doktorleri al
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Yanıtı al
                    var response = JSON.parse(this.responseText);

                    // Doktor ekle
                    var doktorSelect = document.querySelector('.doktor');
                    doktorSelect.innerHTML = ''; // Önceki seçenekleri temizle
                    response.forEach(function(doktor) {
                        var option = document.createElement('option');
                        option.text = doktor;
                        option.value = doktor;
                        doktorSelect.add(option);
                    });
                }
            };
            xhr.open('GET', 'doktorlari_getir.php?hastane=' + seciliHastane + '&klinik=' + seciliKlinik, true);
            xhr.send();
        }

        
    </script>






</body>

</html>