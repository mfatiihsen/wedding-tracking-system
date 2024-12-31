<?php
$title = "Hizmet Ekle";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/services-class.php';


$db = new Database();  // Veritabanı bağlantısını başlat
$services = new Services($db->conn);  // Personel sınıfını başlat



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // formdan eglen verileri almak
    $title = $_POST['title'];
    $explanation = $_POST['explanation'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $contents = $_POST['contents'];

    // Personel ekleme işlemi
    $message = $services->ekle($title, $explanation, $price, $capacity, $contents);

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
            <h2 class="title-person">Hizmet Ekle</h2>
            <form action="services-add.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Başlık:</label>
                        <input type="text"  name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Açıklama:</label>
                        <input type="text" name="explanation" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Fiyat:</label>
                        <input type="number" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Kapasite:</label>
                        <input type="text" name="capacity" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_number">İçerik:</label>
                        <input type="text" name="contents" required>
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