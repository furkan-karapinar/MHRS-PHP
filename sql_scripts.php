<?php
include_once 'baglanti.php';

function alinamayan_randevu_saatleri($mhrs_sehir, $mhrs_tarih, $mhrs_hastane, $mhrs_doktor, $mhrs_klinik)
{
    try {
        // Sorguyu hazırla ve çalıştır
        global $db; // baglanti.php deki db değişkenini tanımlamak için
        $sorgu = $db->prepare('SELECT DISTINCT TIME_FORMAT(mhrs_saat, "%H:%i") FROM mhrs WHERE mhrs_tarih = :mhrs_tarih AND mhrs_sehir = :mhrs_sehir AND mhrs_hastane = :mhrs_hastane AND mhrs_doktor = :mhrs_doktor AND mhrs_klinik = :mhrs_klinik');

        // Değişken değerlerini ekleyin
        $sorgu->bindParam(':mhrs_tarih', $mhrs_tarih);
        $sorgu->bindParam(':mhrs_sehir', $mhrs_sehir);
        $sorgu->bindParam(':mhrs_hastane', $mhrs_hastane);
        $sorgu->bindParam(':mhrs_doktor', $mhrs_doktor);
        $sorgu->bindParam(':mhrs_klinik', $mhrs_klinik);

        // Sorguyu çalıştır
        $sorgu->execute();

        // Sonuçları bir diziye al
        $saatler = $sorgu->fetchAll(PDO::FETCH_COLUMN);

        // Sonucu döndür
        return $saatler;
    } catch (PDOException $e) {
        // Hata durumunda hata mesajını göster
        echo "Hata: " . $e->getMessage();
        return false;
    }
}

function randevu_sil($randevu_id)
{
    try {
        // Sorguyu hazırla
        global $db; // baglanti.php deki db değişkenini tanımlamak için
        $sorgu = $db->prepare('DELETE FROM mhrs WHERE mhrs_id = '.$randevu_id);

        // Sorguyu çalıştır
        $sorgu->execute();

        // Silme işlemi başarılı olduysa true döndür
        return true;
    } catch (PDOException $e) {
        // Hata durumunda hata mesajını göster ve false döndür
        echo "Hata: " . $e->getMessage();
        return false;
    }
}

function sehirleriListele() {
    try {
        global $db; // baglanti.php deki db değişkenini tanımlamak için
        // Şehirleri getiren sorguyu hazırla ve çalıştır
        $sorgu = $db->query('SELECT sehir_adi FROM sehirler');
        
        // Sonuçları bir diziye al
        $sehirler = $sorgu->fetchAll(PDO::FETCH_COLUMN);
        
        // Seçenekleri oluştur
        $options = '';
        
        foreach ($sehirler as $sehir ) {
            $options .= '<option value="' . $sehir . '">' . $sehir . '</option>';
        }
        
        // Seçenekleri döndür
        return $options;
    } catch (PDOException $e) {
        // Hata durumunda hata mesajını göster ve false döndür
        echo "Hata: " . $e->getMessage();
        return false;
    }
}


function hastaneleriListele() {
    try {
        global $db; // baglanti.php deki db değişkenini tanımlamak için
        // Hastaneleri getiren sorguyu hazırla ve çalıştır
        $sorgu = $db->query('SELECT hastane_adi FROM hastaneler');
        
        // Sonuçları bir diziye al
        $hastaneler = $sorgu->fetchAll(PDO::FETCH_COLUMN);
        
       
        // Seçenekleri döndür (javascript ile uyumlu olacak şekilde)
        return json_encode($hastaneler);
    } catch (PDOException $e) {
        // Hata durumunda hata mesajını göster ve false döndür
        echo "Hata: " . $e->getMessage();
        return false;
    }
}

function bolumleriListele() {
    try {
        global $db; // baglanti.php deki db değişkenini tanımlamak için
        // Bölümleri getiren sorguyu hazırla ve çalıştır
        $sorgu = $db->query('SELECT bolum_adi FROM bolumler');
        
        // Sonuçları bir diziye al
        $bolumler = $sorgu->fetchAll(PDO::FETCH_COLUMN);
        
        // Seçenekleri oluştur
        $options = '';
        foreach ($bolumler as $bolum) {
            $options .= '<option value="' . $bolum . '">' . $bolum . '</option>';
        }
        
        // Seçenekleri döndür
        return $options;
    } catch (PDOException $e) {
        // Hata durumunda hata mesajını göster ve false döndür
        echo "Hata: " . $e->getMessage();
        return false;
    }
}

