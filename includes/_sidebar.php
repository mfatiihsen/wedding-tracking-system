<!-- Sidebar Kısmı -->
<div class="sidebar">
    <h2>Admin Panel</h2>
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
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-user-tie"></i>Personeller <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="../pages/person.php">Listele</a>
            <a href="../pages/person-add.php">Ekle</a>
        </div>
    </div>
    <a href="#"><i class="fas fa-tasks"></i>Görevler</a>
    <div class="has-dropdown">
        <a href="#" onclick="toggleDropdown(event)"><i class="fas fa-chart-bar"></i>Raporlar <i class="fas fa-chevron-down arrow"></i></a>
        <div class="dropdown">
            <a href="#">Genel Rapor</a>
            <a href="#">Ayrıntılı Rapor</a>
        </div>
    </div>
    <a href="#"><i class="fas fa-cog"></i>Ayarlar</a>
</div>