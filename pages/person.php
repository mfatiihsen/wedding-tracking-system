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
                    echo "<td><button class='details-customer-btn' onclick='showPersonModal(" . json_encode($person) . ")'>Detaylar</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Bolumu -->
<div id="personModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closePersonModal()">&times;</span>
        <h2 id="modal-title">Personel Detayları</h2>
        <div id="modal-content">
            <!-- Detaylar burada görünecek -->
        </div>
    </div>
</div>

<script>
    // Modal'ı açma fonksiyonu
    function showPersonModal(person) {
        var formattedWage = new Intl.NumberFormat('tr-TR', { style: 'currency', currency: 'TRY' }).format(person.wage);

        var content = `
            <div class="person-detail">
                <p><strong>Ad:</strong> ${person.name}</p>
                <p><strong>Soyad:</strong> ${person.surname}</p>
                <p><strong>E-posta:</strong> ${person.mail}</p>
                <p><strong>Telefon:</strong> ${person.tel}</p>
                <p><strong>Sicil Numarası:</strong> ${person.sicil}</p>
                <p><strong>Görevi:</strong> ${person.duty}</p>
                <p><strong>Maaşı:</strong> ${formattedWage}</p>
                 <p><strong>İşe Giriş Tarihi:</strong> ${person.employment_date}</p>
            </div>
        `;

        // Modal içeriğini güncelliyoruz
        document.getElementById('modal-content').innerHTML = content;

        // Modal'ı gösteriyoruz
        document.getElementById('personModal').style.display = "flex";
    }

    // Modal'ı kapama fonksiyonu
    function closePersonModal() {
        document.getElementById('personModal').style.display = "none";
    }
</script>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>