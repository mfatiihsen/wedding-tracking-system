<?php
$title = "Tedarikçiler";
ob_start();

?>



<div class="main-content">
    <div class="supplier-list">
        <div class="supplier-card">
            <h3>Yemek Catering</h3>
            <p><strong>İletişim:</strong> 0505 123 45 67</p>
            <p><strong>Hizmetler:</strong> Düğün yemekleri, ikramlar</p>
            <p><strong>Adres:</strong> İstiklal Caddesi, No: 42</p>
            <button class="btn">Detaylar</button>
        </div>

        <div class="supplier-card">
            <h3>Fotoğrafçı XYZ</h3>
            <p><strong>İletişim:</strong> 0505 234 56 78</p>
            <p><strong>Hizmetler:</strong> Düğün fotoğrafçılığı, albüm</p>
            <p><strong>Adres:</strong> Şehir Mahallesi, No: 10</p>
            <button class="btn">Detaylar</button>
        </div>

        <div class="supplier-card">
            <h3>Müzik DJ</h3>
            <p><strong>İletişim:</strong> 0505 345 67 89</p>
            <p><strong>Hizmetler:</strong> DJ performansı, ses sistemi</p>
            <p><strong>Adres:</strong> Bahçe Sokak, No: 15</p>
            <button class="btn">Detaylar</button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>