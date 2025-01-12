<?php
$title = "Müşteri Ekle";
ob_start();
?>

<?php

require_once '../model/db.php';
require_once '../class/customer-class.php';

$db = new Database();
$customer = new Musteri($db->conn);

if (isset($_POST['customerad'])) {
    // formdan eglen verileri almak
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['phone'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $request_date = $_POST['start_date'];

    // Personel ekleme işlemi
    $message = $customer->ekle($name, $surname, $tel, $email, $adres, $request_date);

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
            <h2 class="title-person">Müşteri Ekle</h2>
            <form action="customer-add.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Ad:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyad:</label>
                        <input type="text" id="surname" name="surname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Telefon:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_number">Adresi:</label>
                        <input type="text" id="adres" name="adres" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Kayıt Tarihi:</label>
                        <input type="date" id="start_date" name="start_date" required>
                    </div>
                </div>
                <button name="customerad" class="btn-person" type="submit">Ekle</button>
            </form>
        </div>
    </div>

</div>



<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>