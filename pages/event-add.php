<?php
$title = "Etkinlik Ekle";
ob_start();
?>

<?php
require_once '../model/db.php';
require_once '../class/event-class.php';

$db = new Database();
$event = new Event($db->conn);




if ($_POST) {
    $event->gelinA = $_POST['gelinA'];
    $event->damatA = $_POST['damatA'];
    $event->tarih = $_POST['tarih'];
    $event->basaat = $_POST['basaat'];
    $event->bisaat = $_POST['bisaat'];;
    $event->kisiSayisi = $_POST['ksayi'];
    $event->tel = $_POST['tel'];
    $event->mail = $_POST['email'];
    $event->fiyat = $_POST['fiyat'];
    $event->odemeOnay = $_POST['odemedurum'];
    $event->davetTuru = $_POST['davettur'];
    $event->hizmet = $_POST['hizmet'];

    if ($event->create()) {
        echo "<div class='alert alert-success'>Etkinlik başarıyla eklendi.</div>";
    } else {
        echo "<div class='alert alert-danger'>Etkinlik eklenemedi.</div>";
    }
}
?>

<div class="main-content">

    <div class="container-person-add">
        <div class="form-container">
            <h2 class="title-person">Etkinlik Ekle</h2>
            <form action="event-add.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Gelin Adı:</label>
                        <input type="text" id="name" name="gelinA" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Damat Adı:</label>
                        <input type="text" id="surname" name="damatA" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Telefon:</label>
                        <input type="text" id="phone" name="tel" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Başlangıç Saati:</label>
                        <input class="time-input" type="time" id="basaat" name="basaat" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Bitiş Saati:</label>
                        <input class="time-input" type="time" id="bisaat" name="bisaat" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="start_date">Hizmet:</label>
                        <select name="hizmet" id="hizmet" required>
                            <option value="0">Lütfen bir hizmet paketi seçiniz</option>
                            <option value="1">Yemek,Fotoğraf,Müzik = 50.000</option>
                            <option value="2">Yemek,Fotoğraf = 40.000</option>
                            <option value="3">Fotoğraf,Müzik = 40.000</option>
                            <option value="4">Yemek,Müzik = 40.000</option>
                            <option value="5">Yemek = 20.000</option>
                            <option value="6">Fotoğraf = 20.000</option>
                            <option value="7">Müzik = 20.000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Etkinlik Tarihi:</label>
                        <input type="date" id="start_date" name="tarih" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_number">Kişi Sayısı:</label>
                        <input type="text" id="adres" name="ksayi" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Davet Türü:</label>
                        <select name="davettur" id="davettur" required>
                            <option value="0" disabled selected>Lütfen davet türü seçiniz</option>
                            <option value="1">Düğün</option>
                            <option value="2">Kına</option>
                            <option value="3">Nişan</option>
                            <option value="4">Sünnet</option>
                            <option value="5">Davet</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_number">Fiyat:</label>
                        <input type="text" id="adres" name="fiyat" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Ödeme Durumu:</label>
                        <select name="odemedurum" id="odemedurum" required>
                            <option value="0">Lütfen ödeme durumunu seçiniz</option>
                            <option value="1">Onaylandı</option>
                            <option value="2">Onaylanmadı</option>
                        </select>
                    </div>
                </div>
                <button name="eventadd" class="btn-person" type="submit">Ekle</button>
            </form>
        </div>
    </div>

</div>



<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>