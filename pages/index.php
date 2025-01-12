<?php
$title = "Düğün Takip - Yönetim Paneli";
ob_start();

require_once '../model/db.php';
require_once '../class/dashboard-class.php';

$db = new Database();

// etkinlik verilerini çekmek için kullanılacak olan sınıf
$dashboard = new Dashboard($db->conn);

$totalCustomers = $dashboard->getTotalCustomers();
$totalEvents = $dashboard->getTotalEvents();
$totalEmployees = $dashboard->getTotalEmployees();
$totalIncome = $dashboard->getTotalIncome();
$totalExpense = $dashboard->getTotalExpense();
$monthlyIncomeExpense = $dashboard->getMonthlyIncomeExpense();
$eventTypeDistribution = $dashboard->getEventTypeDistribution();
$upcomingEvents = $dashboard->getUpcomingEvents();



$eventTypeMapping = [
    1 => 'Düğün',
    2 => 'Kına',
    3 => 'Nişan',
    4 => 'Sünnet',
    5 => 'Davet'
];
?>


<div class="main-content">
    <div class="content-container">
        <div class="stats">
            <div class="stat-card">
                <h3>Toplam Müşteri</h3>
                <p><?php echo $totalCustomers; ?></p>
            </div>
            <div class="stat-card">
                <h3>Toplam Etkinlik</h3>
                <p><?php echo $totalEvents; ?></p>
            </div>
            <div class="stat-card">
                <h3>Toplam Personel</h3>
                <p><?php echo $totalEmployees; ?></p>
            </div>
            <div class="stat-card">
                <h3>Toplam Gelir</h3>
                <p>₺<?php echo number_format($totalIncome, 2, ',', '.'); ?></p>
            </div>
        </div>
        <div class="quick-actions">
            <div class="action-card" onclick="location.href='../pages/customer-add.php'">
                <i class="fas fa-user-plus"></i>
                <h3>Yeni Müşteri Ekle</h3>
            </div>
            <div class="action-card" onclick="location.href='../pages/person-add.php'">
                <i class="fas fa-user-tie"></i>
                <h3>Yeni Personel Ekle</h3>
            </div>
            <div class="action-card" onclick="location.href='../pages/event-add.php'">
                <i class="fas fa-calendar-plus"></i>
                <h3>Yeni Etkinlik Ekle</h3>
            </div>
            <div class="action-card" onclick="location.href='../pages/services-add.php'">
                <i class="fas fa-concierge-bell"></i>
                <h3>Yeni Hizmet Ekle</h3>
            </div>
        </div>
    </div>
    <div class="charts">
        <div class="chart-container">
            <h3>Gelir-Gider Grafiği</h3>
            <canvas id="incomeExpenseChart"></canvas>
        </div>
        <div class="chart-container">
            <h3>Etkinlik Türlerine Göre Dağılım</h3>
            <canvas id="eventTypeChart"></canvas>
        </div>
    </div>
    <!-- Yaklaşan Etkinlik Kısmı -->
    <div class="upcoming-events">
        <h3>Yaklaşan Etkinlikler</h3>
        <table class="events-table">
            <thead>
                <tr>
                    <th>Tarih</th>
                    <th>Çift Adı</th>
                    <th>Başlangıç Saati</th>
                    <th>Fiyat</th>
                    <th>Davet Türü</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($upcomingEvents as $event): ?>
                    <tr>
                        <td><?php echo (new DateTime($event['tarih']))->format('d/m/Y'); ?></td>
                        <td><?php echo htmlspecialchars($event['gelinA']." ve ".$event['damatA']); ?></td>
                        <td><?php echo (new DateTime($event['basaat']))->format('H:i'); ?></td>
                        <td><?php echo number_format($event['fiyat'], 2, ',', '.') . " ₺"; ?></td>
                        <td><?php echo htmlspecialchars($eventTypeMapping[$event['davetTuru']]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    // Gelir-Gider Grafiği
    var monthlyIncome = <?php echo json_encode(array_column($monthlyIncomeExpense, 'income')); ?>;
    var monthlyExpense = <?php echo json_encode(array_column($monthlyIncomeExpense, 'expense')); ?>;
    var months = <?php echo json_encode(array_map(function ($item) {
                        return date('F', mktime(0, 0, 0, $item['month'], 10));
                    }, $monthlyIncomeExpense)); ?>;

    var ctx = document.getElementById('incomeExpenseChart').getContext('2d');
    var incomeExpenseChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Gelir',
                data: monthlyIncome,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }, {
                label: 'Gider',
                data: monthlyExpense,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var eventTypeLabels = <?php echo json_encode(array_column($eventTypeDistribution, 'event_type')); ?>;
    var eventTypeCounts = <?php echo json_encode(array_column($eventTypeDistribution, 'count')); ?>;
    var eventTypeMapping = <?php echo json_encode($eventTypeMapping); ?>;

    var ctx2 = document.getElementById('eventTypeChart').getContext('2d');
    var eventTypeChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: eventTypeLabels.map(function(type) {
                return eventTypeMapping[type];
            }),
            datasets: [{
                label: 'Etkinlik Türleri',
                data: eventTypeCounts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var label = eventTypeMapping[eventTypeLabels[tooltipItem.dataIndex]];
                            return label + ': ' + eventTypeCounts[tooltipItem.dataIndex];
                        }
                    }
                }
            }
        }
    });
</script>


<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>