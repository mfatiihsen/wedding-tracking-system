<?php
session_start();
// CSRF token'ı oluşturma (CSRF saldırılarını önlemek için)
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // 32 byte uzunluğunda güvenli bir token oluşturuyoruz
}
// Eğer çıkış yapma isteği gelirse
if (isset($_POST['logout'])) {
    // CSRF token kontrolü
    if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
        session_unset(); // Oturum verilerini temizle
        session_destroy(); // Oturumu sonlandır
        header("Location: ../pages/login.php"); // Kullanıcıyı giriş sayfasına yönlendir
        exit;
    } else {
        echo "Geçersiz istekte bulunuldu."; // CSRF hatası
    }
}

?>


<!-- Sidebar Kısmı -->
<div class="sidebar">
    <div class="container-logo">
        <img src="../assets/images/logo2.png" alt="Logo" width="70px" height="70px">
    </div>


    <a href="../index.php"><i class="fas fa-home"></i>Ana Sayfa</a>
    <a href="../pages/events.php"><i class="fas fa-calendar-alt"></i>Etkinlikler</a>
    <div class="has-dropdown">
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-users"></i>Müşteriler <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="../pages/customer.php">Listele</a>
            <a href="../pages/customer-add.php">Ekle</a>
        </div>
    </div>
    <div class="has-dropdown">
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-concierge-bell"></i>Hizmetler <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="../pages/services.php">Listele</a>
            <a href="../pages/services-add.php">Yeni Ekle</a>
        </div>
    </div>
    <div class="has-dropdown">
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-money-bill-wave"></i>Gelir-Gider <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="../pages/candg.php">Listele</a>
            <a href="../pages/candg-add.php">Yeni Ekle</a>
        </div>
    </div>
    <div class="has-dropdown">
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-truck"></i>Tedarikçiler <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="../pages/supplier.php">Listele</a>
            <a href="../pages/supplier-add.php">Ekle</a>
        </div>
    </div>
    <div class="has-dropdown">
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-user-tie"></i>Personeller <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="../pages/person.php">Listele</a>
            <a href="../pages/person-add.php">Ekle</a>
        </div>
    </div>
    <div class="has-dropdown">
        <a href="../pages/report.php" onclick="toggleDropdown(event)"><i class="fas fa-chart-bar"></i>Raporlar </a>
    </div>
    <form method="POST" style="text-align: center;margin-top: 20px;">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <button type="submit" name="logout" class="btn-cikis">Çıkış Yap</button>
    </form>
</div>