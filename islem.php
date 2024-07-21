<?php

ob_start();
session_start();
include 'sql_scripts.php';

if (isset($_POST['hastakaydet'])) {
   $hasta_tc = isset($_POST['hasta_tc']) ? $_POST['hasta_tc'] : null;
   $hasta_ad_soyad = isset($_POST['hasta_ad_soyad']) ? $_POST['hasta_ad_soyad'] : null;
   $hasta_sifre = isset($_POST['hasta_sifre']) ? $_POST['hasta_sifre'] : null;


   $sorgu = $db->prepare('INSERT INTO hasta SET
        hasta_tc = ?,
        hasta_ad_soyad = ?,
        hasta_sifre = ?
    ');
   $ekle = $sorgu->execute([
      $hasta_tc, $hasta_ad_soyad, $hasta_sifre
   ]);
   if ($ekle) {
      header('location:index.php?durum=basarili');
   } else {
      $hata = $sorgu->errorInfo();
      echo 'mysql hatası' . $hata[2];
   }
}

if (isset($_POST['giris_yap'])) {

   $hasta_tc = $_POST['hasta_tc'];
   $hasta_sifre = $_POST['hasta_sifre'];

   $hastasor = $db->prepare("SELECT * FROM  hasta WHERE hasta_tc = ? and hasta_sifre = ?");
   $hastasor->execute([$hasta_tc, $hasta_sifre]);

   $say = $hastasor->rowCount();
   if ($say == 1) {
      $_SESSION['hastahasta_tc'] = $hasta_tc;
      header('location:anasayfa.php?durum=girisbasarili');
      exit;
   } else {

      header('location:index.php?durum=girisbasarisiz');
      exit;
   }
}
if (isset($_POST['Randevuyu_Kaydet'])) {
   $mhrs_sehir = isset($_POST['sehir']) ? $_POST['sehir'] : null;
   $mhrs_hastane = isset($_POST['hastane']) ? $_POST['hastane'] : null;
   $mhrs_doktor = isset($_POST['doktor']) ? $_POST['doktor'] : null;
   $mhrs_tarih = isset($_POST['tarih']) ? $_POST['tarih'] : null;
   $mhrs_saat = isset($_POST['saat']) ? $_POST['saat'] : null;
   $mhrs_klinik = isset($_POST['klinik']) ? $_POST['klinik'] : null;
   $hasta_id = isset($_POST['hasta_id']) ? $_POST['hasta_id'] : null;

   $kaydet = $db->prepare(" INSERT INTO mhrs SET 
     mhrs_sehir = ?,
     mhrs_hastane = ?,
     mhrs_doktor = ?,
     mhrs_tarih = ?,
     mhrs_saat = ?,
     mhrs_klinik = ?,
     mhrs_hasta_id = ?
    ");

   $insert = $kaydet->execute([
      $mhrs_sehir, $mhrs_hastane, $mhrs_doktor, $mhrs_tarih, $mhrs_saat, $mhrs_klinik, $hasta_id
   ]);
   if ($insert) {
      header("location:anasayfa.php?kayıt_basarili");
   } else {
      header("location:anasayfa.php?kayıt_basarisiz");
   }
}

if (isset($_POST['Randevu_Sil'])) {
   $mhrs_id = isset($_POST['mhrs_id']) ? $_POST['mhrs_id'] : null;
   if (randevu_sil($mhrs_id))
   {
      header("location:anasayfa.php?islem_basarili");
   } else {
      header("location:anasayfa.php?islem_basarisiz-".$mhrs_id);
   }
}
