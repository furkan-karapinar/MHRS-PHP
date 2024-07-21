<?php
// Bağlantıyı içe aktar
require 'baglanti.php';

$secili_klinik = $_GET['klinik']; // GET ile klinik bilgisini al
$secili_hastane = $_GET['hastane']; // GET ile hastane bilgisini al

// Doktorları sorgula
$sorgu = $db->prepare('SELECT k.ad_soyad FROM doktorlar INNER JOIN kullanicilar k ON k.id = doktorlar.doktor_id WHERE doktorlar.bolum = :klinik AND k.hastane = :hastane'); // veritabanı sorgusu
$sorgu->bindParam(':klinik', $secili_klinik); // :klinik yerine secili_klinik değişkenindeki veriyi yazdırarak sorguyu düzenler
$sorgu->bindParam(':hastane', $secili_hastane); // :hastane yerine secili_hastane değişkenindeki veriyi yazdırarak sorguyu düzenler
$sorgu->execute(); // sorguyu çalıştır
$doktorlar = $sorgu->fetchAll(PDO::FETCH_COLUMN); // doktorlar değişkenine sorgudan gelenleri dizi / liste olarak işle

// Sonucu JSON formatında döndür. Dizinin Javascript ile uyumlu olması adına
echo json_encode($doktorlar);
