<?php
class Dashboard {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTotalCustomers() {
        $query = "SELECT COUNT(*) AS total_customers FROM customer";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_customers'];
    }

    public function getTotalEvents() {
        $query = "SELECT COUNT(*) AS total_events FROM event";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_events'];
    }

    public function getTotalEmployees() {
        $query = "SELECT COUNT(*) AS total_employees FROM person";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_employees'];
    }

    public function getTotalIncome() {
        $query = "SELECT SUM(amount) AS total_income FROM candg WHERE type = '1'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_income'];
    }

    public function getTotalExpense() {
        $query = "SELECT SUM(amount) AS total_expense FROM candg WHERE type = '2'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_expense'];
    }

    public function getMonthlyIncomeExpense() {
        $query = "SELECT 
                    MONTH(transaction_date) AS month, 
                    SUM(CASE WHEN type = '1' THEN amount ELSE 0 END) AS income,
                    SUM(CASE WHEN type = '2' THEN amount ELSE 0 END) AS expense
                  FROM candg
                  GROUP BY MONTH(transaction_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventTypeDistribution() {
        $query = "SELECT 
                    davetTuru, 
                    COUNT(*) AS count 
                  FROM event 
                  GROUP BY davetTuru";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // yaklaşmakta olan etlinlikleri göstermek icin yazılan kod blloğu
    public function getUpcomingEvents() {
        $query = "SELECT id, gelinA, damatA, tarih, basaat, fiyat, davetTuru
                  FROM event
                  WHERE tarih >= CURDATE() 
                  ORDER BY id ASC
                  LIMIT 4";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>