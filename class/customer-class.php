<?php

// Musteri.php
class Musteri
{
    private $db;

    // Database bağlantısını alıyoruz
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Müşteri ekleme fonksiyonu
    public function ekle($adSoyad, $telefon, $email, $dugunTarihi, $adres)
    {
        $sql = "INSERT INTO musteri (ad_soyad, telefon, email, dugun_tarihi, adres, kayit_tarihi) 
                VALUES (:ad_soyad, :telefon, :email, :dugun_tarihi, :adres, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ad_soyad', $adSoyad);
        $stmt->bindParam(':telefon', $telefon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dugun_tarihi', $dugunTarihi);
        $stmt->bindParam(':adres', $adres);

        if ($stmt->execute()) {
            return "Müşteri başarıyla eklendi!";
        } else {
            return "Müşteri eklenirken bir hata oluştu.";
        }
    }
}
