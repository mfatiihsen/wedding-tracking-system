<?php
$title = "Tedarikçiler";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/supplier-class.php';

$db = new Database();  // Veritabanı bağlantısını başlat
$supplier = new Supply($db->conn);  // Personel sınıfını başlat

// Veritabanından tüm personelleri al
$supplierListe = $supplier->getAllSupply();


if (isset($_POST['supplier_id'])) {
    $supplierId = $_POST['supplier_id'];

    // Hizmeti sil
    $result = $supplier->delete($supplierId);

    // Sonuç mesajını ekrana yazdır
    echo $result;

    // Silme işleminden sonra tekrar ana sayfaya yönlendir
    header("Location: supplier.php");
    exit();
} else {
    echo "Hizmet ID'si bulunamadı!";
}



?>



<div class="main-content">
    <div class="supplier-list">
        <?php
        foreach ($supplierListe as $supplier) {
            echo "<div class='supplier-card'>";
            echo "<h3>" . htmlspecialchars($supplier['sname']) . "</h3>";
            echo "<p><strong>İletişim:</strong> " . htmlspecialchars($supplier['phone']) . "</p>";
            echo "<p><strong>Hizmetler:</strong> " . htmlspecialchars($supplier['services']) . "</p>";
            echo "<p><strong>Adres:</strong> " . htmlspecialchars($supplier['adress']) . "</p>";
            echo "<form method='POST' action='supplier.php'>";  // Silme işlemi için form başlatıyoruz
            echo "<input type='hidden' name='supplier_id' value='" . $supplier['id'] . "'>"; // Hizmetin ID'sini gizli alanda tutuyoruz
            echo "<button class='btn-supplier-delete'>Sil</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>

    </div>
</div>

<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>