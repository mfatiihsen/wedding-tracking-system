<?php
$title = "Etkinlikler";
ob_start();
?>



<div class="main-content">
    <div class="service-details">

        <div class="service-card">
            <h2>Catering Hizmeti</h2>
            <p><strong>Açıklama:</strong> Lezzetli yemekler ve ikramlar için profesyonel catering hizmeti. Düğünler, davetler ve diğer organizasyonlar için özel menüler hazırlıyoruz.</p>
            <p><strong>Fiyat:</strong> 5000 TL</p>
            <p><strong>Kapasite:</strong> 100-150 kişi</p>
            <p><strong>İçerik:</strong> Menüde ana yemek, tatlılar, içecekler, atıştırmalıklar, ve masa düzenlemeleri yer alır.</p>
        </div>

        <div class="service-card">
            <h2>Fotoğrafçılık Hizmeti</h2>
            <p><strong>Açıklama:</strong> Özel anlarınızı ölümsüzleştiren profesyonel fotoğrafçılık hizmeti. Düğün hazırlığı, tören ve eğlenceli fotoğraflar.</p>
            <p><strong>Fiyat:</strong> 3000 TL</p>
            <p><strong>Kapasite:</strong> 1 çift, misafirler dahil 200 kişi</p>
            <p><strong>İçerik:</strong> 8 saatlik fotoğraf çekimi, özel albüm ve dijital dosyalar.</p>
        </div>

        <div class="service-card">
            <h2>Müzik Hizmeti</h2>
            <p><strong>Açıklama:</strong> Unutulmaz bir düğün için canlı müzik performansı ve DJ hizmeti. İstediğiniz müzik türleri ile geceyi daha özel kılın.</p>
            <p><strong>Fiyat:</strong> 4500 TL</p>
            <p><strong>Kapasite:</strong> 100-200 kişi</p>
            <p><strong>İçerik:</strong> Canlı müzik performansı, DJ seti, ışık ve ses sistemi.</p>
        </div>

    </div>

</div>


<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>