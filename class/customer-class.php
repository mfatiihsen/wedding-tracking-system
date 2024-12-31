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
    public function ekle($name, $surname, $telefon, $email, $adres, $date)
    {
        $sql = "INSERT INTO customer (name,surname, tel, mail, adress, request_date) 
                VALUES (:name, :surname, :tel, :mail, :adress, :request_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':tel', $telefon);
        $stmt->bindParam(':mail', $email);
        $stmt->bindParam(':adress', $adres);
        $stmt->bindParam(':request_date', $date);

        if ($stmt->execute()) {
            return "Müşteri başarıyla eklendi!";
        } else {
            return "Müşteri eklenirken bir hata oluştu.";
        }
    }


    // Customer verilerini al
    public function getAllCustomer()
    {
        $sql = "SELECT * FROM customer"; // personel tablosundaki tüm verileri alıyoruz
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Verileri döndür
    }
}
