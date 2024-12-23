<?php

class FinanceTransaction
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Gelir/Gider Ekleme
    public function ekle($type, $amount, $explanation, $transactionDate)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO candg (type, explanation,amount, transaction_date) VALUES (:type, :explanation, :amount, :transaction_date)");
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':explanation', $explanation);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':transaction_date', $transactionDate);
            $stmt->execute();
            return "Transaction added successfully.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Gelir/Gider Listeleme
    public function getTransactions()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM candg ORDER BY transaction_date DESC");
            $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $transactions;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
