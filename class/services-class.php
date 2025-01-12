<?php

class Services{
    private $db;

    // Database bağlantısını alıyoruz
    public function __construct($db)
    {
        $this->db = $db;
    }

     // Hizmet ekleme fonksiyonu
     public function ekle($title, $explanation, $price, $capacity, $contents )       
     {
         $sql = "INSERT INTO services (title, explanation, price, capacity, contents) 
                 VALUES (:title, :explanation, :price ,:capacity, :contents)";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':title', $title);
         $stmt->bindParam(':explanation', $explanation);
         $stmt->bindParam(':price', $price);
         $stmt->bindParam(':capacity', $capacity);
         $stmt->bindParam(':contents', $contents);
 
         if ($stmt->execute()) {
             return "Hizmet başarıyla eklendi!";
         } else {
             return "Hizmet eklenirken bir hata oluştu.";
         }
     }


     
     // Hizmet verilerini al
     public function getAllServices() {
        $sql = "SELECT * FROM services"; // personel tablosundaki tüm verileri alıyoruz
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Verileri döndür
    }

      // Hizmet silme fonksiyonu
      public function delete($id) {
        // Silme işlemine başlamadan önce, verilen ID'nin var olup olmadığını kontrol edebiliriz
        $sql = "SELECT * FROM services WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // ID mevcutsa silme işlemi yapılır
            $sql = "DELETE FROM services WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return "Hizmet başarıyla silindi!";
            } else {
                return "Hizmet silinirken bir hata oluştu.";
            }
        } else {
            return "Silmek istediğiniz hizmet bulunamadı.";
        }
    }

}