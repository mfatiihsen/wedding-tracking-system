-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Oca 2025, 16:25:04
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dugun`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `mail`, `pass`) VALUES
(1, 'Fatih', 'ademfatih37@gmail.com', '123'),
(2, 'Yiğit', 'yigit@gmail.com', '12345'),
(3, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `candg`
--

CREATE TABLE `candg` (
  `id` int(11) NOT NULL,
  `type` int(5) NOT NULL,
  `explanation` varchar(256) NOT NULL,
  `amount` bigint(21) NOT NULL,
  `transaction_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `candg`
--

INSERT INTO `candg` (`id`, `type`, `explanation`, `amount`, `transaction_date`) VALUES
(1, 2, 'Temizlik Masrafları', 5000, '2024-12-23'),
(2, 1, 'Düğün Geliri', 100000, '2024-12-23'),
(3, 2, 'Yemek Giderleri', 15000, '2024-12-23'),
(4, 2, 'Fotoğrafçı Ödemesi', 7000, '2024-12-23'),
(5, 1, 'Kına Etkinliği Ödemesi', 10000, '2024-12-23'),
(6, 1, 'Düğün Ödemesi', 40000, '2024-12-23'),
(7, 2, 'Temizlik Masrafları', 2000, '2024-12-23'),
(8, 1, 'Düğün Etkinliğii', 250000, '2024-12-30'),
(9, 2, 'Personel Maaşı', 125000, '2024-12-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `adress` varchar(256) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `tel`, `mail`, `adress`, `request_date`) VALUES
(1, 'Yiğit', 'Külcü', '0555 123 4567', 'yigit@gmail.com', 'Kocaeli/izmit', '2024-12-23'),
(2, 'Samet', 'KAYA', '0555 123 4567', 'samet4160@gmail.com', 'Kocaeli/İzmit yeni mahalle no:8', '2024-12-31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `gelinA` varchar(256) NOT NULL,
  `damatA` varchar(256) NOT NULL,
  `tarih` date DEFAULT NULL,
  `basaat` time NOT NULL DEFAULT current_timestamp(),
  `bisaat` time NOT NULL,
  `kisiSayisi` int(10) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `fiyat` varchar(256) NOT NULL,
  `odemeOnay` varchar(256) NOT NULL,
  `davetTuru` varchar(256) NOT NULL,
  `hizmet` varchar(256) NOT NULL,
  `ktarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `event`
--

INSERT INTO `event` (`id`, `gelinA`, `damatA`, `tarih`, `basaat`, `bisaat`, `kisiSayisi`, `tel`, `mail`, `fiyat`, `odemeOnay`, `davetTuru`, `hizmet`, `ktarih`) VALUES
(1, 'Selenay', 'Evren Özkürt', '2024-12-27', '00:00:00', '00:00:00', 500, '5551234567', 'hakan@gmail.com', '210000', '2', '1', '3', '2024-12-30 17:10:20'),
(3, 'Ayşe', 'Yiğit', '2025-01-06', '16:00:00', '19:00:00', 300, '555', 'yigit@gmail.com', '120000', '1', '1', '3', '2024-12-30 17:16:54'),
(4, 'Selin', 'Ahmet', '2025-01-02', '19:00:00', '23:00:23', 100, '555', 'ahmetselin@gmail.com', '50000', '2', '2', '3', '2024-12-30 17:17:55'),
(5, 'Selin', 'Ahmet', '2025-01-02', '01:00:00', '01:00:00', 100, '555', 'ahmetselin@gmail.com', '50000', '2', '2', '4', '2024-12-30 17:22:00'),
(6, 'Alya', 'Altay', '2025-01-01', '01:00:00', '01:00:00', 250, '555', 'alya@gmail.com', '75000', '2', '3', '3', '2024-12-30 17:25:46'),
(7, 'Deren', 'Evren', '2024-12-29', '01:00:00', '01:00:00', 100, '055 123 4567', 'evrenn@gmail.com', '50000', '1', '5', '2', '2024-12-30 17:35:09'),
(9, 'Yudum', 'Samet', '2024-12-31', '20:00:00', '23:30:00', 300, '0555 123 4567', 'yudum@gmail.com', '120000', '1', '1', '3', '2024-12-31 15:50:03'),
(10, 'Ece', 'Kaan', '2025-01-12', '19:00:00', '23:00:00', 500, '0555 123 4567', 'ecedalay@gmail.com', '250000', '1', '1', '4', '2025-01-10 23:05:44'),
(11, 'Ayça', 'Cengiz', '2025-01-25', '16:00:00', '19:00:00', 500, '0555 123 4567 ', 'cengiz@gmail.com', '150000', '1', '1', '4', '2025-01-12 15:24:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `tel` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `sicil` bigint(11) NOT NULL,
  `duty` varchar(256) NOT NULL,
  `wage` varchar(256) NOT NULL,
  `employment_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `person`
--

INSERT INTO `person` (`id`, `rol`, `name`, `surname`, `tel`, `mail`, `sicil`, `duty`, `wage`, `employment_date`) VALUES
(1, 1, 'Fatih', 'ŞEN', '0555 123 4567', 'ademfatih37@gmail.com', 0, '233531071', '500000', '2024-12-23'),
(2, 2, 'Fatih', 'ŞEN', '0555 123 4567', 'ademfatih37@gmail.com', 233531071, 'Yönetici', '500000', '2024-12-23'),
(3, 3, 'Yiğit', 'Külcü', '0555 123 4567', 'yigit@gmail.com', 233531072, 'Yönetici', '10000', '2022-01-23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `explanation` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `capacity` varchar(11) DEFAULT 'Bilinmiyor',
  `contents` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `title`, `explanation`, `price`, `capacity`, `contents`) VALUES
(1, 'Yemek,Fotoğraf,Müzik', 'Lezzetli yemekler ve ikramlar için profesyonel catering hizmeti. Düğünler, davetler ve diğer organizasyonlar için özel menüler hazırlıyoruz.', '50000 ', '150', 'Menüde ana yemek, tatlılar, içecekler, atıştırmalıklar, ve masa düzenlemeleri yer alır.'),
(2, 'Yemek,Fotoğraf', ' Özel anlarınızı ölümsüzleştiren profesyonel fotoğrafçılık hizmeti. Düğün hazırlığı, tören ve eğlenceli fotoğraflar.', '40000', '200', '8 saatlik fotoğraf çekimi, özel albüm ve dijital dosyalar.'),
(3, 'Fotoğraf,Müzik', 'Unutulmaz bir düğün için canlı müzik performansı ve DJ hizmeti. İstediğiniz müzik türleri ile geceyi daha özel kılın.', '40000', '200', 'Canlı müzik performansı, DJ seti, ışık ve ses sistemi.'),
(5, 'Yemek,Müzik', 'Düğün ve özel etkinlikleriniz için hem lezzetli bir yemek deneyimi hem de eğlenceli bir müzik organizasyonunu bir araya getiren özel paketimizle misafirlerinizi ağırlayın. Yemekler profesyonel aşçılar tarafından hazırlanır, müzik ise deneyimli DJ\'ler veya ', '40000', '300', 'İçerik kısmına, müşterilere sunacağınız hizmetin detaylarını, neler sunduğunuzu, hizmetin etkinliklere nasıl katkı sağlayacağını ve neden tercih edilmesi gerektiğini yazabilirsiniz. İşte örnek bir içerik:    ---  ### İçerik   Düğün ve özel organizasyonlar için hazırlanan yemek ve müzik paketimiz, etkinliğinizi unutulmaz kılmak için tasarlandı. Profesyonel aşçılarımızın özenle hazırladığı zengin menüler, misafirlerinize lezzetli bir ziyafet sunarken, deneyimli müzik ekiplerimiz organizasyonunuza '),
(6, 'Yemek', 'Düğün, nişan, kurumsal etkinlikler ve özel organizasyonlar için profesyonel aşçılarımız tarafından hazırlanan yemek hizmetimiz, her zevke uygun lezzetli ve kaliteli menüler sunar. Misafirlerinize unutulmaz bir lezzet deneyimi yaşatmayı taahhüt ederiz.', '20000', '300', 'Yemek hizmetimiz, etkinliğinizin tüm ihtiyaçlarını karşılamak üzere tasarlanmıştır. Zengin menü seçenekleri, taze ve kaliteli malzemeler kullanılarak hazırlanır. Her detay, misafirlerinize en iyi hizmeti sunmak için titizlikle planlanır.'),
(7, 'Fotoğrafçılık', 'Düğün, nişan, doğum günü ve diğer özel anlarınızda unutulmaz kareler yakalamak için profesyonel fotoğraf hizmetimiz, deneyimli ekip ve son teknoloji ekipmanlarla hizmetinizde. Özel anılarınızı ölümsüzleştirmek için her detayı titizlikle planlıyoruz.', '20000', '300', 'Fotoğraf hizmetimiz, etkinliğinizin en güzel anlarını yakalayarak unutulmaz anılar biriktirmenizi sağlar. Profesyonel fotoğrafçılarımız, her anı doğru ışık, açı ve kompozisyonla ölümsüzleştirir.'),
(8, 'Müzik', 'Düğün, nişan, doğum günü, kurumsal etkinlikler ve diğer özel organizasyonlarınız için profesyonel müzik hizmetimiz, etkinliğinize keyifli bir atmosfer katar. Deneyimli DJ\'ler ve canlı müzik ekipleriyle, her zevke uygun müzik seçenekleri sunuyoruz.', '20000', '300', 'Müzik hizmetimiz, etkinliğinizin enerjisini artırmak ve misafirlerinize unutulmaz anlar yaşatmak için tasarlanmıştır. Profesyonel ekiplerimiz, özel isteklerinize uygun şekilde müzik performansları sunar.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `supply`
--

CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `sname` varchar(256) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `services` varchar(500) NOT NULL,
  `adress` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `supply`
--

INSERT INTO `supply` (`id`, `sname`, `phone`, `services`, `adress`) VALUES
(1, 'Yemek Catering', '0505 123 45 67', 'Düğün yemekleri, ikramlar', 'İstiklal Caddesi, No: 42'),
(2, 'Fotoğrafçı XYZ', '0505 234 56 78', 'Düğün fotoğrafçılığı, albüm', 'Şehir Mahallesi, No: 10\r\n'),
(3, 'Müzik DJ', '505 345 67 89', 'DJ performansı, ses sistemi', ' Bahçe Sokak, No: 15');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `candg`
--
ALTER TABLE `candg`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `candg`
--
ALTER TABLE `candg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
