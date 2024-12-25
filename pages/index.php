<?php
$title = "Düğün Takip - Yönetim Paneli";
ob_start();

?>

<!-- MAIN KISMI -->
<div class="main-content">

    <div class="content">
        <div class="card">
            <h3>Etkinlik Bilgileri</h3>
            <p>Burada etkinlikler ile ilgili bilgileri görebilirsiniz.</p>
            <button class="btn">Detayları Gör</button>
        </div>

        <div class="card">
            <h3>Katılımcılar</h3>
            <p>Katılımcılar ile ilgili detayları inceleyin.</p>
            <button class="btn">Katılımcıları Gör</button>
        </div>

        <div class="card">
            <h3>Görev Yönetimi</h3>
            <p>Görevleri düzenleyip kontrol edebilirsiniz.</p>
            <button class="btn">Görevleri Yönet</button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>