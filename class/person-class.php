<?php


// Personel.php
class Personel
{
    private $db;

    // Database bağlantısını alıyoruz
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Personel ekleme fonksiyonu
    public function ekle($name, $surname, $tel, $email, $duty, $sicil, $wage, $employment_date)
    {
        $sql = "INSERT INTO person (name, surname,tel, mail,sicil, duty,wage,employment_date) 
                VALUES (:name, :surname, :tel ,:mail, :sicil,:duty,:wage,:employment_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':mail', $email);
        $stmt->bindParam(':sicil', $sicil);
        $stmt->bindParam(':duty', $duty);
        $stmt->bindParam(':wage', $wage);
        $stmt->bindParam(':employment_date', $employment_date);

        if ($stmt->execute()) {
            return "Personel başarıyla eklendi!";
        } else {
            return "Personel eklenirken bir hata oluştu.";
        }
    }


     // Personel verilerini al
     public function getAllPersonel() {
        $sql = "SELECT * FROM person"; // personel tablosundaki tüm verileri alıyoruz
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Verileri döndür
    }
}
