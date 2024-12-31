<?php
ini_set('display_errors', 0);
if (isset($_SESSION['name'])) {
    $userName = $_SESSION['name'];
} else {
    $userName = "Misafir";
}
// Tekrarı önlemek için require_once kullanıldı.
require_once '../model/db.php';
$db = new Database();
$connectionStatus = $db->checkConnection();

?>

<nav>
    <div class="navbar">
        <div class="hamburger" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
            <p>Hoşgeldin, <?php echo htmlspecialchars($userName); ?></p>
        </div>
        <div class="row-date">
            <!-- Günün Tarih ve Saati -->
            <div class="current-datetime">
                <i class="fas fa-clock" style="margin-right: 7px;"></i>
                <span class="datetime-text" id="currentDateTime"></span>
            </div>
            <!--Veritabanı Durumu -->
            <div class="db-status <?php echo $connectionStatus == 'Veri Tabanı Aktif' ? 'active' : 'inactive'; ?>">
                <span class="status-icon">
                    <i class="fas <?php echo $connectionStatus == 'Veri Tabanı Aktif' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                </span>
                <span class="status-text">
                    <?php echo $connectionStatus; ?>
                </span>
            </div>
        </div>
    </div>
</nav>

<script>
    function updateDateTime() {
        var now = new Date();
        var day = String(now.getDate()).padStart(2, '0');
        var month = String(now.getMonth() + 1).padStart(2, '0'); // Aylar 0-11 arası olduğu için +1 ekliyoruz
        var year = now.getFullYear();
        var hours = String(now.getHours()).padStart(2, '0');
        var minutes = String(now.getMinutes()).padStart(2, '0');
        var seconds = String(now.getSeconds()).padStart(2, '0');
        var formattedDateTime = hours + ':' + minutes + ':' + seconds + '-' + day + '/' + month + '/' + year + ' ';
        document.getElementById('currentDateTime').textContent = formattedDateTime;
    }

    setInterval(updateDateTime, 1000); // Her saniye güncelle
    updateDateTime(); // Sayfa yüklendiğinde hemen çalıştır
</script>