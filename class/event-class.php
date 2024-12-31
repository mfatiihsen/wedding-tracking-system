<?php
class Event
{
    private $conn;
    private $table_name = "event";

    public $id;

    public $gelinA;
    public $damatA;
    public $tarih;
    public $basaat;
    public $bisaat;
    public $kisiSayisi;
    public $tel;
    public $mail;
    public $fiyat;
    public $odemeOnay;
    public $davetTuru;
    public $hizmet;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Yeni etkinlik ekleme
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET gelinA=:gelinA, damatA=:damatA, tarih=:tarih, basaat=:basaat, bisaat=:bisaat,kisiSayisi=:kisiSayisi, tel=:tel, mail=:mail, fiyat=:fiyat, odemeOnay=:odemeOnay, davetTuru=:davetTuru, hizmet=:hizmet";

        $stmt = $this->conn->prepare($query);

        // Temiz veriler
        $this->gelinA = htmlspecialchars(strip_tags($this->gelinA));
        $this->damatA = htmlspecialchars(strip_tags($this->damatA));
        $this->tarih = htmlspecialchars(strip_tags($this->tarih));
        $this->basaat = htmlspecialchars(strip_tags($this->basaat));
        $this->bisaat = htmlspecialchars(strip_tags($this->bisaat));
        $this->kisiSayisi = htmlspecialchars(strip_tags($this->kisiSayisi));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->mail = htmlspecialchars(strip_tags($this->mail));
        $this->fiyat = htmlspecialchars(strip_tags($this->fiyat));
        $this->odemeOnay = htmlspecialchars(strip_tags($this->odemeOnay));
        $this->davetTuru = htmlspecialchars(strip_tags($this->davetTuru));
        $this->hizmet = htmlspecialchars(strip_tags($this->hizmet));

        // Parametreleri bağla
        $stmt->bindParam(":gelinA", $this->gelinA);
        $stmt->bindParam(":damatA", $this->damatA);
        $stmt->bindParam(":tarih", $this->tarih);
        $stmt->bindParam(":kisiSayisi", $this->kisiSayisi);
        $stmt->bindParam(":basaat", $this->basaat);
        $stmt->bindParam(":bisaat", $this->bisaat);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":fiyat", $this->fiyat);
        $stmt->bindParam(":odemeOnay", $this->odemeOnay);
        $stmt->bindParam(":davetTuru", $this->davetTuru);
        $stmt->bindParam(":hizmet", $this->hizmet);

        if ($stmt->execute()) {
            return true;
            header('Location:index.php');
            exit();
        }

        return false;
    }

    /*
    // Tüm etkinlikleri listeleme
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY event_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Belirli bir etkinliği okuma
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->event_name = $row['event_name'];
        $this->event_type = $row['event_type'];
        $this->event_date = $row['event_date'];
        $this->participant_count = $row['participant_count'];
        $this->description = $row['description'];
    }

    // Etkinlik güncelleme
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET event_name = :event_name, event_type = :event_type, event_date = :event_date, participant_count = :participant_count, description = :description 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Temiz veriler
        $this->event_name = htmlspecialchars(strip_tags($this->event_name));
        $this->event_type = htmlspecialchars(strip_tags($this->event_type));
        $this->event_date = htmlspecialchars(strip_tags($this->event_date));
        $this->participant_count = htmlspecialchars(strip_tags($this->participant_count));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Parametreleri bağla
        $stmt->bindParam(":event_name", $this->event_name);
        $stmt->bindParam(":event_type", $this->event_type);
        $stmt->bindParam(":event_date", $this->event_date);
        $stmt->bindParam(":participant_count", $this->participant_count);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
 */

    // Etkinlik silme
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
