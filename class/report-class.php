<?php

// Raporlar sayfasındaaki verile çekmek için yazılan kodlar
class Report {
    private $conn;

    // veri tabanı çağır
    public function __construct($db) {
        $this->conn = $db;
    }

    // Genel rapor verilerini çek
    public function getGeneralReport() {
        $query = "SELECT 
                    (SELECT COUNT(*) FROM customer) AS total_customers,
                    (SELECT COUNT(*) FROM event) AS total_events,
                    (SELECT SUM(amount) FROM candg WHERE type = 1) AS total_income,
                    (SELECT SUM(amount) FROM candg WHERE type = 2) AS total_expense,
                    (SELECT COUNT(*) FROM person) AS total_employees";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Etkinlik rapor verilerini çek
    public function getEventReport() {
        $query = "SELECT 
                    davetTuru, 
                    tarih, 
                    kisiSayisi, 
                    fiyat
                  FROM event";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Müşteri rapor verilerini çek
    /*
    public function getCustomerReport() {
        $query = "SELECT 
                    customer.name AS customer_name, 
                    customer.mail AS contact_info, 
                    COUNT(event.id) AS event_count, 
                    SUM(candg.amount) AS total_spent 
                  FROM customer 
                  LEFT JOIN events ON customer.id = event.customer_id 
                  LEFT JOIN finances ON customer.id = candg.customer_id 
                  GROUP BY customer.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
*/
    public function getEmployeeReport() {
        $query = "SELECT 
                    name AS name, 
                    duty, 
                    sicil, 
                    wage 
                  FROM person";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
/*
    public function getSupplierReport() {
        $query = "SELECT 
                    supply.sname AS supplier_name, 
                    services_provided, 
                    SUM(candg.amount) AS total_spent 
                  FROM supply 
                  LEFT JOIN candg ON supply.id = candg.type 
                  GROUP BY supply.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        */
}
?>