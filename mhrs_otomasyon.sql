-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 May 2024, 22:16:58
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mhrs_otomasyon`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL,
  `bolum_adi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`id`, `bolum_adi`) VALUES
(1, 'Nöroloji'),
(2, 'Üroloji'),
(3, 'Kardiyoloji'),
(4, 'Genel Cerrahi'),
(5, 'İç Hastalıkları'),
(6, 'Pediatri'),
(7, 'Ortopedi ve Travmatoloji'),
(8, 'Dermatoloji'),
(9, 'Göz Hastalıkları'),
(10, 'Kulak Burun Boğaz'),
(11, 'Radyoloji'),
(12, 'Psikiyatri'),
(13, 'Plastik ve Rekonstrüktif '),
(14, 'Onkoloji'),
(15, 'Nükleer Tıp'),
(16, 'Acil Tıp'),
(17, 'Romatoloji'),
(18, 'Endokrinoloji'),
(19, 'Kardiyovasküler Cerrahi'),
(20, 'Palyatif Bakım');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE `doktorlar` (
  `id` int(11) NOT NULL,
  `doktor_id` int(11) NOT NULL,
  `bolum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`id`, `doktor_id`, `bolum`) VALUES
(2, 3, 11),
(3, 6, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hasta`
--

CREATE TABLE `hasta` (
  `hasta_id` int(11) NOT NULL,
  `hasta_ad_soyad` varchar(60) NOT NULL,
  `hasta_tc` varchar(11) NOT NULL,
  `hasta_sifre` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hasta`
--

INSERT INTO `hasta` (`hasta_id`, `hasta_ad_soyad`, `hasta_tc`, `hasta_sifre`) VALUES
(1, 'anıl adem çubuk', '13882782032', 'x3x2x1xx'),
(4, 'Kutay Karadağ', '26561017356', 'kutay55'),
(5, 'Yasin Tekin', '12345678901', '12345678'),
(6, 'Emin Tekin', '12345678904', '12345678905'),
(7, 'Anıl Uçar', '11111111111', '12345678');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastaneler`
--

CREATE TABLE `hastaneler` (
  `id` int(11) NOT NULL,
  `sehir_id` int(11) NOT NULL,
  `hastane_adi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hastaneler`
--

INSERT INTO `hastaneler` (`id`, `sehir_id`, `hastane_adi`) VALUES
(1, 1, 'Özel İstanbul Hastanesi'),
(2, 1, 'Devlet İstanbul Hastanesi'),
(3, 2, 'Özel Ankara Hastanesi'),
(4, 2, 'Devlet Ankara Hastanesi'),
(5, 3, 'Özel İzmir Hastanesi'),
(6, 3, 'Devlet İzmir Hastanesi'),
(7, 4, 'Özel Adana Hastanesi'),
(8, 4, 'Devlet Adana Hastanesi'),
(9, 5, 'Özel Adıyaman Hastanesi'),
(10, 5, 'Devlet Adıyaman Hastanesi'),
(11, 6, 'Özel Afyonkarahisar Hastanesi'),
(12, 6, 'Devlet Afyonkarahisar Hastanesi'),
(13, 7, 'Özel Ağrı Hastanesi'),
(14, 7, 'Devlet Ağrı Hastanesi'),
(15, 8, 'Özel Aksaray Hastanesi'),
(16, 8, 'Devlet Aksaray Hastanesi'),
(17, 9, 'Özel Amasya Hastanesi'),
(18, 9, 'Devlet Amasya Hastanesi'),
(19, 10, 'Özel Antalya Hastanesi'),
(20, 10, 'Devlet Antalya Hastanesi'),
(21, 11, 'Özel Ardahan Hastanesi'),
(22, 11, 'Devlet Ardahan Hastanesi'),
(23, 12, 'Özel Artvin Hastanesi'),
(24, 12, 'Devlet Artvin Hastanesi'),
(25, 13, 'Özel Aydın Hastanesi'),
(26, 13, 'Devlet Aydın Hastanesi'),
(27, 14, 'Özel Balıkesir Hastanesi'),
(28, 14, 'Devlet Balıkesir Hastanesi'),
(29, 15, 'Özel Bartın Hastanesi'),
(30, 15, 'Devlet Bartın Hastanesi'),
(31, 16, 'Özel Batman Hastanesi'),
(32, 16, 'Devlet Batman Hastanesi'),
(33, 17, 'Özel Bayburt Hastanesi'),
(34, 17, 'Devlet Bayburt Hastanesi'),
(35, 18, 'Özel Bilecik Hastanesi'),
(36, 18, 'Devlet Bilecik Hastanesi'),
(37, 19, 'Özel Bingöl Hastanesi'),
(38, 19, 'Devlet Bingöl Hastanesi'),
(39, 20, 'Özel Bitlis Hastanesi'),
(40, 20, 'Devlet Bitlis Hastanesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(70) NOT NULL,
  `tc` varchar(11) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `tur` varchar(25) NOT NULL,
  `sehir` varchar(35) NOT NULL,
  `hastane` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad_soyad`, `tc`, `sifre`, `tur`, `sehir`, `hastane`) VALUES
(3, 'Adnan Sayar', '12345678900', '12345', 'Doktor', 'İstanbul', 'Özel İstanbul Hastanesi'),
(5, 'Yasin Koç', '12345678901', '12345', 'Görevli', 'İstanbul', 'Özel İstanbul Hastanesi'),
(6, 'Kerim Durmaz', '12345678903', '12345', 'Doktor', 'İstanbul', 'Özel İstanbul Hastanesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mhrs`
--

CREATE TABLE `mhrs` (
  `mhrs_id` int(11) NOT NULL,
  `mhrs_sehir` varchar(25) NOT NULL,
  `mhrs_tarih` date NOT NULL,
  `mhrs_saat` time NOT NULL,
  `mhrs_hastane` varchar(50) NOT NULL,
  `mhrs_doktor` varchar(30) NOT NULL,
  `mhrs_klinik` varchar(30) NOT NULL,
  `mhrs_hasta_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mhrs`
--

INSERT INTO `mhrs` (`mhrs_id`, `mhrs_sehir`, `mhrs_tarih`, `mhrs_saat`, `mhrs_hastane`, `mhrs_doktor`, `mhrs_klinik`, `mhrs_hasta_id`) VALUES
(5, 'Adıyaman', '2024-03-23', '00:00:00', 'Bölge Eğitim ve Araştırma Hastanesi', 'Ayşe Naz Kaya', 'Dahiliye', 1),
(6, 'Amasya', '2024-03-21', '00:00:00', 'Akdamar Hastanesi', 'Kutay Karadağ', 'Ortopedi', 1),
(7, 'Aydın', '2024-03-20', '00:00:00', 'Hayat Hastanesi', 'Anıl Adem Çubuk', 'Dahiliye', 4),
(17, 'İstanbul', '2024-05-09', '09:10:00', 'Özel İstanbul Hastanesi', 'Kerim Durmaz', 'Genel Cerrahi', 5),
(13, 'İstanbul', '2024-05-09', '14:50:00', 'Özel İstanbul Hastanesi', 'Adnan Sayar', 'Radyoloji', 5),
(15, 'İstanbul', '2024-05-09', '09:00:00', 'Özel İstanbul Hastanesi', 'Kerim Durmaz', 'Genel Cerrahi', 6),
(18, 'İstanbul', '2024-05-09', '09:30:00', 'Özel İstanbul Hastanesi', 'Adnan Sayar', 'Radyoloji', 6),
(19, 'İstanbul', '2024-05-09', '10:00:00', 'Özel İstanbul Hastanesi', 'Kerim Durmaz', 'Genel Cerrahi', 7),
(20, 'İstanbul', '2024-05-09', '10:10:00', 'Özel İstanbul Hastanesi', 'Adnan Sayar', 'Radyoloji', 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--

CREATE TABLE `sehirler` (
  `id` int(11) NOT NULL,
  `sehir_adi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`id`, `sehir_adi`) VALUES
(1, 'İstanbul'),
(2, 'Ankara'),
(3, 'İzmir'),
(4, 'Adana'),
(5, 'Adıyaman'),
(6, 'Afyonkarahisar'),
(7, 'Ağrı'),
(8, 'Aksaray'),
(9, 'Amasya'),
(10, 'Antalya'),
(11, 'Ardahan'),
(12, 'Artvin'),
(13, 'Aydın'),
(14, 'Balıkesir'),
(15, 'Bartın'),
(16, 'Batman'),
(17, 'Bayburt'),
(18, 'Bilecik'),
(19, 'Bingöl'),
(20, 'Bitlis'),
(21, 'Bolu'),
(22, 'Burdur'),
(23, 'Bursa'),
(24, 'Çanakkale'),
(25, 'Çankırı'),
(26, 'Çorum'),
(27, 'Denizli'),
(28, 'Diyarbakır'),
(29, 'Düzce'),
(30, 'Edirne'),
(31, 'Elazığ'),
(32, 'Erzincan'),
(33, 'Erzurum'),
(34, 'Eskişehir'),
(35, 'Gaziantep'),
(36, 'Giresun'),
(37, 'Gümüşhane'),
(38, 'Hakkâri'),
(39, 'Hatay'),
(40, 'Iğdır'),
(41, 'Isparta'),
(42, 'Kahramanmaraş'),
(43, 'Karabük'),
(44, 'Karaman'),
(45, 'Kars'),
(46, 'Kastamonu'),
(47, 'Kayseri'),
(48, 'Kırıkkale'),
(49, 'Kırklareli'),
(50, 'Kırşehir'),
(51, 'Kilis'),
(52, 'Kocaeli'),
(53, 'Konya'),
(54, 'Kütahya'),
(55, 'Malatya'),
(56, 'Manisa'),
(57, 'Mardin'),
(58, 'Mersin'),
(59, 'Muğla'),
(60, 'Muş'),
(61, 'Nevşehir'),
(62, 'Niğde'),
(63, 'Ordu'),
(64, 'Osmaniye'),
(65, 'Rize'),
(66, 'Sakarya'),
(67, 'Samsun'),
(68, 'Siirt'),
(69, 'Sinop'),
(70, 'Sivas'),
(71, 'Şırnak'),
(72, 'Tekirdağ'),
(73, 'Tokat'),
(74, 'Trabzon'),
(75, 'Tunceli'),
(76, 'Şanlıurfa'),
(77, 'Uşak'),
(78, 'Van'),
(79, 'Yalova'),
(80, 'Yozgat'),
(81, 'Zonguldak');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hasta`
--
ALTER TABLE `hasta`
  ADD PRIMARY KEY (`hasta_id`);

--
-- Tablo için indeksler `hastaneler`
--
ALTER TABLE `hastaneler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mhrs`
--
ALTER TABLE `mhrs`
  ADD PRIMARY KEY (`mhrs_id`);

--
-- Tablo için indeksler `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `hasta`
--
ALTER TABLE `hasta`
  MODIFY `hasta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `hastaneler`
--
ALTER TABLE `hastaneler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `mhrs`
--
ALTER TABLE `mhrs`
  MODIFY `mhrs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `sehirler`
--
ALTER TABLE `sehirler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
