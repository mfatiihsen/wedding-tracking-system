<?php
$title = "Gelir - Gider";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/candg-class.php';

$db = new Database();  // Veritabanı bağlantısını başlat
$candg = new FinanceTransaction($db->conn);  // Personel sınıfını başlat

// Veritabanından tüm personelleri al
$gelirgiderListesi = $candg->getTransactions();
?>

<div class="main-content">
    <div class="container-candg">
        <table>
            <thead>
                <tr>
                    <th>Tür</th>
                    <th>Açıklama</th>
                    <th>Tutar (₺)</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Veritabanından gelen verilerle tabloyu doldur
                foreach ($gelirgiderListesi as $candg) {
                    echo "<tr>";
                    $type = ($candg['type'] == 2) ? 'Gider' : 'Gelir';
                    $typeClass = ($candg['type'] == 2) ? 'gider' : 'gelir';  // CSS sınıfı seçimi

                    echo "<td class='" . $typeClass . "'>" . htmlspecialchars($type) . "</td>";
                    echo "<td>" . htmlspecialchars($candg['explanation']) . "</td>";

                    // Tutarı para formatında yazdır
                    $formattedAmount = number_format($candg['amount'], 2, ',', '.');
                    echo "<td>" . "₺" . htmlspecialchars($formattedAmount) . "</td>";

                    // Tarihi gün/ay/yıl formatına çevir
                    $date = new DateTime($candg['transaction_date']);
                    $formattedDate = $date->format('d/m/Y');  // Gün/Ay/Yıl formatı
                    echo "<td>" . htmlspecialchars($formattedDate) . "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content  = ob_get_clean();
include '../includes/_layout.php';
?>

<style>
    .gelir {
        color: green;  /* Gelir için yeşil renk */
    }

    .gider {
        color: red;  /* Gider için kırmızı renk */
    }
</style>
