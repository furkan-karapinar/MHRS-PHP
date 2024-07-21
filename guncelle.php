<?php
// Bağlantıyı içe aktar
require 'baglanti.php';

// Form onay edildiğinde
if (isset($_POST['guncelle'])) {
    // POST isteğiyle gelen verileri al
    $hasta_tc = $_POST['hasta_tc'];
    $hasta_sifre = $_POST['hasta_sifre'];
    global $db; // baglantı.php deki db değişkenini tanıtmak için kod
    // Veritabanında güncelleme yap
    $sorgu = $db->prepare('UPDATE hasta SET  hasta_sifre = ? WHERE hasta_tc = ?'); // Şifre güncellemek için veritabanı sorgusu
    $sorgu->execute([$hasta_sifre, $hasta_tc]); // sorguyu çalıştırma kodu

    // Güncelleme başarılı / başarısız olduysa kullanıcıyı yönlendir
    if ($sorgu) {
        header("location:anasayfa.php?islem_basarili");
    } else {
        header("location:anasayfa.php?islem_basarisiz");
    }
}
