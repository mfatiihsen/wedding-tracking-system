<?php
ini_set('display_errors', 0);
// Kullanıcı oturumu varsa, kullanıcı adını veya e-posta göster
if (isset($_SESSION['name'])) {
    $userName = $_SESSION['name'];  // Örneğin e-posta
} else {
    $userName = "Misafir";  // Eğer giriş yapılmamışsa
}
require_once '../model/db.php';  // Tekrar yüklemeyi önlemek için
$db = new Database();
$connectionStatus = $db->checkConnection(); // Veritabanı bağlantı durumu
?>

<nav>
    <div class="navbar">
        <div class="hamburger" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
            <p>Hoşgeldin, <?php echo htmlspecialchars($userName); ?></p>
        </div>
        <!--Veritabanı Durumu -->
        <div class="db-status <?php echo $connectionStatus == 'Veri Tabanı Aktif' ? 'active' : 'inactive'; ?>">
            <span class="status-icon">
                <i
                    class="fas <?php echo $connectionStatus == 'Veri Tabanı Aktif' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
            </span>
            <span class="status-text">
                <?php echo $connectionStatus; ?>
            </span>
        </div>
    </div>
</nav>