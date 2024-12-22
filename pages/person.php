<?php
$title = "Personeller";
ob_start();
?>


<?php
require_once '../model/db.php';
require_once '../class/person-class.php';

$db = new Database();  // Veritabanı bağlantısını başlat
$personel = new Personel($db->conn);  // Personel sınıfını başlat

// Veritabanından tüm personelleri al
$personelListesi = $personel->getAllPersonel();

?>
<div class="main-content">
    <div class="container-person">
        <header>
            <h1>Personeller</h1>
        </header>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>E-posta</th>
                    <th>Telefon</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Veritabanından gelen verilerle tabloyu doldur
                foreach ($personelListesi as $person) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($person['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($person['surname']) . "</td>";
                    echo "<td>" . htmlspecialchars($person['mail']) . "</td>";
                    echo "<td>" . htmlspecialchars($person['tel']) . "</td>";
                    echo "<td><button class='details-customer-btn'>Detaylar</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>