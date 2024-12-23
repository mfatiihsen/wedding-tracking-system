<?php
$title = "Gelir - Gider";
ob_start();

// Oturum başlat
session_start();

require_once '../model/db.php';
require_once '../class/candg-class.php';

$db = new Database();
$candg = new FinanceTransaction($db->conn);

$successMessage = ''; // Başarı mesajı

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    // Veritabanına ekleme işlemi
    $message = $candg->ekle($type, $amount, $description, $date);

    // Eğer işlem başarılıysa success mesajını $_SESSION ile sakla
    $_SESSION['successMessage'] = "Gelir/Gider başarıyla eklendi!";
    
    // Sayfa yönlendirmesi ve success parametresini URL'ye ekle
    header("Location: candg-add.php");
    exit();
}

?>

<div class="main-content">

    <div class="container-candg-add">
        <!-- Form Başlangıcı -->
        <div class="form-section">
            <h2>Gelir veya Gider Ekle</h2>
            <form id="transactionForm" action="candg-add.php" method="post">
                <label class="type" for="type">Tür:</label>
                <select id="type" name="type" required>
                    <option value="" disabled selected>Seçiniz</option>
                    <option value="1">Gelir</option>
                    <option value="2">Gider</option>
                </select>

                <label for="description">Açıklama:</label>
                <input type="text" name="description" id="description" placeholder="Açıklama girin" required>

                <label for="amount">Tutar (₺):</label>
                <input type="number" name="amount" id="amount" placeholder="Tutar girin" required>

                <label for="date">Tarih:</label>
                <input type="date" name="date" id="date" required readonly>

                <button type="submit" class="btn-candg">Ekle</button>
            </form>
        </div>
    </div>

</div>

<!-- JavaScript kısmı -->
<script>
    // Sayfa yüklendikten sonra $_SESSION'den mesajı kontrol et
    <?php if (isset($_SESSION['successMessage'])): ?>
        alert("<?php echo $_SESSION['successMessage']; ?>");
        // Mesajı bir kere gösterdikten sonra oturumu temizle
        <?php unset($_SESSION['successMessage']); ?>
    <?php endif; ?>
</script>

<?php
$content  = ob_get_clean();
include '../includes/_layout.php';
?>
