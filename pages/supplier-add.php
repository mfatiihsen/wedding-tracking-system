<?php
$title = "Tedarikçi Ekle";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/supplier-class.php';


$db = new Database();  // Veritabanı bağlantısını başlat
$supplier = new Supply($db->conn);  // Tedarik sınıfını başlat



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // formdan eglen verileri almak
    $sname = $_POST['name'];
    $phone = $_POST['phone'];
    $services = $_POST['services'];
    $adres = $_POST['adres'];

    // Personel ekleme işlemi
    $message = $supplier->ekle($sname, $phone, $services, $adres);

    // Mesajı ekrana yazdır
    echo $message;

    // Sayfayı yeniden yükleyerek formu temizle (POST işlemi sonrasında GET'e yönlendirme)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit(); // Yönlendirme sonrası kodun çalışmaması için exit() kullanıyoruz
}

?>

<div class="main-content">

    <div class="container-person-add">
        <div class="form-container">
            <h2 class="title-person">Tedarikçi Ekle</h2>
            <form action="supplier-add.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Tedarikçi İsim:</label>
                        <input type="text"  name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">İletişim:</label>
                        <input type="number" name="phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Hizmet:</label>
                        <input type="text" name="services" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Adres:</label>
                        <input type="text" name="adres" required>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn-person" type="submit">Ekle</button>
                </div>


            </form>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>