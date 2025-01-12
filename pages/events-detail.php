<?php
$title = "Etkinlikler";
ob_start();
?>

<?php
// URL'den gelen gün parametresini alıyoruz
$day = isset($_GET['day']) ? $_GET['day'] : null;

// Etkinlik veritabanı bağlantısı (Örnek olarak PDO kullanılıyor)
include('../model/db.php');
include '../class/event-class.php';
$db = new Database();
$db = $db->conn;

$event = new Event($db);

// Eğer gelen tarih parametresi varsa
if ($day) {
    // Bugünün yıl ve ay bilgilerini alıyoruz
    $year = date('Y'); // Mevcut yıl
    $month = date('m'); // Mevcut ay

    // "Yıl-Ay-Gün" formatında tam bir tarih oluşturuyoruz
    $fullDate = $year . '-' . $month . '-' . str_pad($day, 2, '0', STR_PAD_LEFT); // Gün tek haneli ise başına sıfır ekliyoruz.

    // Sorgu: Belirtilen tarihteki etkinlikleri alıyoruz
    $stmt = $db->prepare("SELECT * FROM event WHERE tarih = :tarih");
    $stmt->execute(['tarih' => $fullDate]);

    // Sorgudan dönen veriyi kontrol etme
    $events = $stmt->fetchAll();
} else {
    $events = [];
}

$deleteMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_event_id'])) {
    $event->id = $_POST['delete_event_id'];
    if ($event->delete()) {
        $deleteMessage = 'Etkinlik başarıyla silindi.';
    } else {
        $deleteMessage = 'Etkinlik silinemedi.';
    }
}

$eventTypeMapping = [
    1 => 'Düğün',
    2 => 'Kına',
    3 => 'Nişan',
    4 => 'Sünnet',
    5 => 'Davet'
];

// Hizmet türü eşlemeleri
$serviceTypeMapping = [
    1 => 'Yemek,Fotoğraf,Müzik = 50.000',
    2 => 'Yemek,Fotoğraf = 40.000',
    3 => 'Fotoğraf,Müzik = 40.000',
    4 => 'Yemek,Müzik = 40.000',
    5 => 'Yemek = 20.000',
    6 => 'Fotoğraf = 20.000',
    7 => 'Müzik = 20.000'
];
?>
<?php if ($deleteMessage): ?>
    <script>
        alert('<?php echo $deleteMessage; ?>');
        window.location.href = 'index.php';
    </script>
<?php endif; ?>
<div class="main-content">
    <section id="calendar-detail">
        <div class="event-detail-container">
            <header>
                <h1>Etkinlikler - <span id="month-header">Ay</span> 2024</h1>
            </header>

            <section id="events">
                <div id="event-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Çift Adı</th>
                                <th>Başlangıç Saati</th>
                                <th>Davetli Sayısı</th>
                                <th>Ücret</th>
                                <th>Detaylar</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($events): ?>
                                <?php foreach ($events as $event): ?>
                                    <tr class="event-item">
                                        <td><?php echo (new DateTime($event['tarih']))->format('d/m/Y'); ?></td>
                                        <td><?php echo htmlspecialchars($event['gelinA'] . " ve " . $event['damatA']); ?></td>
                                        <td><?php echo (new DateTime($event['basaat']))->format('H:i'); ?></td>
                                        <!-- Etkinlik saati 'time' sütununda varsayalım -->
                                        <td><?php echo htmlspecialchars($event['kisiSayisi'] . " Kişi"); ?></td>
                                        <td><?php echo number_format($event['fiyat'], 2, ',', '.') . " ₺"; ?></td>
                                        <!-- Etkinlik yeri 'location' sütununda varsayalım -->
                                        <td><button class="details-btn"
                                                onclick="showModal('<?php echo $event['id']; ?>')">Gör</button></td>

                                        <td>
                                            <form method="post" action="">
                                                <input type="hidden" name="delete_event_id" value="<?php echo $event['id']; ?>">
                                                <button type="submit" class="delete-btn">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">Bu tarihte etkinlik bulunmamaktadır.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Modal Bölümü -->
            <div id="eventModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal()">&times;</span>
                    <h2 id="modal-title">Detaylar</h2>
                    <div id="modal-content">
                        <!-- Detaylar burada görünecek -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // Modal'ı açma fonksiyonu
    function showModal(id) {
        var content = "";
        var title = "";
        console.log(id);

        // Etkinlik bilgilerini PHP'den alıyoruz
        var event = <?php echo json_encode($events); ?>;
        var eventTypeMapping = <?php echo json_encode($eventTypeMapping); ?>;
        var serviceTypeMapping = <?php echo json_encode($serviceTypeMapping); ?>;
        var selectedEvent = event.find(e => e.id == id); // Etkinliği buluyoruz

        if (selectedEvent) {
            // Ödeme durumunu kontrol et
            const odemeDurumu = selectedEvent.odemeOnay === 1 ? 'Onaylanmadı' : 'Onaylandı';

            // Etkinlik türü ve hizmet türünü metin olarak al
            const davetTuru = eventTypeMapping[selectedEvent.davetTuru];
            const hizmet = serviceTypeMapping[selectedEvent.hizmet];

            content = `
                    <div class="event-detail">
                        <h3>Etkinlik Adı: ${davetTuru}</h3>
                        <p><strong>Fiyat:</strong> ${selectedEvent.fiyat}</p>
                        <p><strong>Gelin Adı:</strong> ${selectedEvent.gelinA}</p>
                        <p><strong>Damat Adı:</strong> ${selectedEvent.damatA}</p>
                        <p><strong>Telefon:</strong> ${selectedEvent.tel}</p>
                        <p><strong>Mail Adresi:</strong> ${selectedEvent.mail}</p>
                        <p><strong>Tarih:</strong> ${selectedEvent.tarih}</p>
                        <p><strong>Başlangıç Saati:</strong> ${selectedEvent.basaat}</p>
                        <p><strong>Bitiş Saati:</strong> ${selectedEvent.bisaat}</p>
                        <p><strong>Kişi Sayısı:</strong> ${selectedEvent.kisiSayisi}</p>
                        <p><strong>Hizmet:</strong> ${hizmet}</p>
                        <p><strong>Ödeme Durumu:</strong> ${odemeDurumu}</p>
                    </div>
                `;
        }

        // Modal içeriğini güncelliyoruz
        document.getElementById('modal-content').innerHTML = content;

        // Modal'ı gösteriyoruz
        document.getElementById('eventModal').style.display = "flex";
    }

    // Modal'ı kapama fonksiyonu
    function closeModal() {
        document.getElementById('eventModal').style.display = "none";
    }
</script>


<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>