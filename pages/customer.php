<?php
$title = "Müşteriler";
ob_start();
?>

<?php

require_once '../model/db.php';
require_once '../class/customer-class.php';

$db = new Database();  // Veritabanı bağlantısını başlat
$customer = new Musteri($db->conn);  // Personel sınıfını başlat

// Veritabanından tüm personelleri al
$customerListe = $customer->getAllCustomer();
?>


<div class="main-content">
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

            foreach ($customerListe as $customer) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($customer['name']) . "</td>";
                echo "<td>" . htmlspecialchars($customer['surname']) . "</td>";
                echo "<td>" . htmlspecialchars($customer['tel']) . "</td>";
                echo "<td>" . htmlspecialchars($customer['mail']) . "</td>";
                echo "<td><button class='details-customer-btn'>Detaylar</button></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>



<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>