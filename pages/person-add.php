<?php
$title = "Personel Ekle";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/person-class.php';


$db = new Database();  // Veritabanı bağlantısını başlat
$personel = new Personel($db->conn);  // Personel sınıfını başlat

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // formdan eglen verileri almak
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['phone'];
    $email = $_POST['email'];
    $duty = $_POST['duty'];
    $sicil = $_POST['id_number'];
    $wage = $_POST['salary'];
    $employment_date = $_POST['start_date'];

    // Personel ekleme işlemi
    $message = $personel->ekle($name, $surname, $tel, $email, $duty, $sicil, $wage, $employment_date);

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
            <h2 class="title-person">Personel Ekle</h2>
            <form action="person-add.php" method="post">
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
                        <label for="id_number">Sicil Numarası:</label>
                        <input type="text" id="id_number" name="id_number" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Görevi:</label>
                        <input type="text" id="position" name="duty" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="salary">Maaşı:</label>
                        <input type="text" id="salary" name="salary" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">İşe Giriş Tarihi:</label>
                        <input type="date" id="start_date" name="start_date" required readonly>
                    </div>
                </div>
                <button class="btn-person" type="submit">Ekle</button>
            </form>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>