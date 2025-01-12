<?php
$title = "Müşteriler";
ob_start();
?>

<?php

require_once '../model/db.php';
require_once '../class/customer-class.php';

$db = new Database();  // Veritabanı bağlantısını başlat
$customer = new Musteri($db->conn);  // Müşteri sınıfını başlat

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
                echo "<td><button class='details-customer-btn' onclick='showCustomerModal(" . json_encode($customer) . ")'>Detaylar</button></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>
<!-- Modal Bölümü -->
<div id="customerModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeCustomerModal()">&times;</span>
        <h2 id="modal-title">Müşteri Detayları</h2>
        <div id="modal-content">
            <!-- Detaylar burada görünecek -->
        </div>
    </div>
</div>

<script>
    // Modal'ı açma fonksiyonu
    function showCustomerModal(customer) {
        var content = `
            <div class="customer-detail">
                <p><strong>Ad:</strong> ${customer.name}</p>
                <p><strong>Soyad:</strong> ${customer.surname}</p>
                <p><strong>E-posta:</strong> ${customer.mail}</p>
                <p><strong>Telefon:</strong> ${customer.tel}</p>
                <p><strong>Adres:</strong> ${customer.adress}</p>
                <p><strong>Kayıt Tarihi:</strong> ${customer.request_date}</p>
            </div>
        `;

        // Modal içeriğini güncelliyoruz
        document.getElementById('modal-content').innerHTML = content;

        // Modal'ı gösteriyoruz
        document.getElementById('customerModal').style.display = "flex";
    }

    // Modal'ı kapama fonksiyonu
    function closeCustomerModal() {
        document.getElementById('customerModal').style.display = "none";
    }
</script>

<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>