<?php

class Supply{
    private $db;

    // Database bağlantısını alıyoruz
    public function __construct($db)
    {
        $this->db = $db;
    }

     // Hizmet ekleme fonksiyonu
     public function ekle($name, $phone, $servies, $adres)       
     {
         $sql = "INSERT INTO supply (sname, phone, services, adress) 
                 VALUES (:sname, :phone, :services ,:adress)";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':sname', $name);
         $stmt->bindParam(':phone', $phone);
         $stmt->bindParam(':services', $servies);
         $stmt->bindParam(':adress', $adres);
         if ($stmt->execute()) {
             return "Tedarikçi başarıyla eklendi!";
         } else {
             return "Tedarikçi eklenirken bir hata oluştu.";
         }
     }


     
     // Hizmet verilerini al
     public function getAllSupply() {
        $sql = "SELECT * FROM supply"; // personel tablosundaki tüm verileri alıyoruz
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Verileri döndür
    }

      // Hizmet silme fonksiyonu
      public function delete($id) {
        // Silme işlemine başlamadan önce, verilen ID'nin var olup olmadığını kontrol edebiliriz
        $sql = "SELECT * FROM supply WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // ID mevcutsa silme işlemi yapılır
            $sql = "DELETE FROM supply WHERE id = :id";
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