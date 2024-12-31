<?php
$title = "Etkinlikler";
ob_start();

// Yıl
$year = date('Y');  // Geçerli yılı alır (2024, 2025, vb.)

// Aylar için isimler
$months = [
    'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran',
    'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
];

// Yılın her ayı için gün sayısı
$days_in_month = [];
for ($i = 1; $i <= 12; $i++) {
    $days_in_month[$i] = cal_days_in_month(CAL_GREGORIAN, $i, $year); // Gün sayısını al
}

?>

<div class="main-content">
    <section id="calendar">
        <?php
        // Takvimi her ay için oluştur
        foreach ($months as $month_index => $month_name) {
            $month_number = $month_index + 1; // Ay numarasını al (1-12)
            $total_days = $days_in_month[$month_number]; // O ayın toplam gün sayısı
            ?>
            <div class="month">
                <div class="month-header"><?php echo $month_name; ?></div>
                <div class="month-days">
                    <?php
                    // O ayın günlerini oluştur
                    for ($day = 1; $day <= $total_days; $day++) {
                        $class = ''; // Günün sınıfı
                        // Eğer hafta sonuysa (Cumartesi veya Pazar)
                        if (in_array(date('w', strtotime("$year-$month_number-$day")), [0, 6])) {
                            $class = 'weekend';
                        }
                        // Günlerin HTML'ini oluştur
                        echo "<div class='day $class' data-day='$day'>$day</div>";
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </section>
</div>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>
