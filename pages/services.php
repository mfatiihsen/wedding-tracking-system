<?php
$title = "Etkinlikler";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/services-class.php';

$db = new Database();  // Veritabanı bağlantısını başlat
$services = new Services($db->conn);  // Personel sınıfını başlat

// Veritabanından tüm personelleri al
$servicesListe = $services->getAllServices();


if (isset($_POST['service_id'])) {
    $serviceId = $_POST['service_id'];

    // Hizmeti sil
    $result = $services->delete($serviceId);

    // Sonuç mesajını ekrana yazdır
    echo $result;

    // Silme işleminden sonra tekrar ana sayfaya yönlendir
    header("Location: services.php");
    exit();
} else {
    echo "Hizmet ID'si bulunamadı!";
}

?>


<div class="main-content">
    <div class="service-details">

        <?php
        foreach ($servicesListe as $services) {
            echo "<div class='service-card'>";
            echo "<h2>" . htmlspecialchars($services['title']) . "</h2>";
            echo "<p><strong>Açıklama:</strong> " . htmlspecialchars($services['explanation']) . "</p>";
            echo "<p><strong>Fiyat:</strong> " . number_format($services['price'], 2, ',', '.') . " TL</p>";
            echo "<p><strong>Kapasite:</strong> " . htmlspecialchars($services['capacity']) . " kişi</p>";
            echo "<p><strong>İçerik:</strong> " . htmlspecialchars($services['contents']) . "</p>";
            echo "<form method='POST' action='services.php'>";  // Silme işlemi için form başlatıyoruz
            echo "<input type='hidden' name='service_id' value='" . $services['id'] . "'>"; // Hizmetin ID'sini gizli alanda tutuyoruz
            echo "<button type='submit' class='btn-services-delete'>Sil</button>"; // Silme butonu
            echo "</form>";
            echo "</div>";
        }
        ?>



    </div>

</div>


<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>