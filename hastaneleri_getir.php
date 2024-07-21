<?php
// Bağlantıyı içe aktar
require 'baglanti.php';

// Şehir ID'sini al
$secili_sehir_id = $_GET['sehir_id'];

// Hastaneleri sorgula
$sorgu = $db->prepare('SELECT hastane_adi FROM hastaneler WHERE sehir_id = :sehir_id'); // hastaneleri almak için veritabanı sorgusu
$sorgu->bindParam(':sehir_id', $secili_sehir_id); // :sehir_id yerine secili_sehir_id değişkeninin verisi olacak şekilde sorguyu düzenler
$sorgu->execute(); // sorguyu çalıştırır
$hastaneler = $sorgu->fetchAll(PDO::FETCH_COLUMN); // hastaneler değişkenine sorgu ile elde edilen verileri liste / dizi olacak şekilde kayıtlanır

// Sonucu JSON formatında döndür
echo json_encode($hastaneler);
?>
