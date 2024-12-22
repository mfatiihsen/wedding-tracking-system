<?php
$title = "Etkinlikler";
ob_start();
?>


<main>

    <section id="calendar-detail">

        <div class="event-detail-container">
            <header>
                <h1>Etkinlikler - <span id="month-name">Ay</span> 2024</h1>
            </header>

            <section id="events">
                <div id="event-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Etkinlik Adı</th>
                                <th>Tarih</th>
                                <th>Saat</th>
                                <th>Konum</th>
                                <th>Detaylar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="event-item">
                                <td>Konser</td>
                                <td>15 Jan 2024</td>
                                <td>19:00</td>
                                <td>İstanbul</td>
                                <td><button class="details-btn" onclick="showModal('event1')">Gör</button></td>
                            </tr>
                            <tr class="event-item">
                                <td>Seminer</td>
                                <td>20 Jan 2024</td>
                                <td>10:00</td>
                                <td>Çankaya</td>
                                <td><button class="details-btn" onclick="showModal('event2')">Gör</button></td>
                            </tr>
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
</main>


<script>
    // Modal'ı açma fonksiyonu
    function showModal(eventId) {
        var content = "";
        var title = "";

        // Etkinlik içeriği
        if (eventId === 'event1') {
            title = "Konser";
            content = `
            <div class="event-detail">
                <h3>Etkinlik Adı: ${title}</h3>
                <p><strong>Tarih:</strong> 15 Jan 2024</p>
                <p><strong>Saat:</strong> 19:00</p>
                <p><strong>Konum:</strong> İstanbul</p>
                <p><strong>Detaylar:</strong> Bu etkinlik, ünlü bir sanatçının İstanbul'da vereceği konserdir. Sahne arkasında neler yaşanıyor, etkinlikte neler olacak gibi detaylar.</p>
            </div>
        `;
        } else if (eventId === 'event2') {
            title = "Seminer";
            content = `
            <div class="event-detail">
                <h3>Etkinlik Adı: ${title}</h3>
                <p><strong>Tarih:</strong> 20 Jan 2024</p>
                <p><strong>Saat:</strong> 10:00</p>
                <p><strong>Konum:</strong> Çankaya</p>
                <p><strong>Detaylar:</strong> Bu seminer, teknoloji dünyasında yenilikçi konuları keşfetmek için mükemmel bir fırsattır.</p>
            </div>
        `;
        }

        // Modal başlığını ve içeriği güncelle
        document.getElementById('modal-content').innerHTML = content;

        // Modal'ı göster
        document.getElementById('eventModal').style.display = "flex";
    }

    // Modal'ı kapatma fonksiyonu
    function closeModal() {
        document.getElementById('eventModal').style.display = "none";
    }



    // Etkinlik verisi
    const events = {
        1: [{
                title: "Düğün Töreni",
                date: "25 Ocak 2024",
                description: "En özel gününüzü paylaşacağımız büyük an."
            },
            {
                title: "Takı Töreni",
                date: "27 Ocak 2024",
                description: "Geleneksel takı töreni."
            }
        ],
        2: [{
            title: "Balayı Çıkışı Kutlaması",
            date: "15 Şubat 2024",
            description: "Balayı sonrası kutlama."
        }],
        3: [{
            title: "Gelin Evi Ziyareti",
            date: "10 Mart 2024",
            description: "Gelin evine yapılan geleneksel ziyaret."
        }],
        4: [{
            title: "Düğün Eğlencesi",
            date: "5 Nisan 2024",
            description: "Geleneksel düğün eğlencesi."
        }],
        // Diğer aylar için verileri burada ekleyebilirsiniz.
    };

    // URL'den ay bilgisini alma
    const urlParams = new URLSearchParams(window.location.search);
    const month = parseInt(urlParams.get('month'));

    // Ay adı
    const monthNames = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"];
    document.getElementById("month-name").innerText = monthNames[month - 1];

    // Etkinlikleri yükleme
    const eventList = document.getElementById('event-list');
</script>


<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>