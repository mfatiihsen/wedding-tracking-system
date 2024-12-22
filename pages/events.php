<?php
$title = "Etkinlikler";
ob_start();
?>


<div class="main-content">

    <section id="calendar">
        <a href="events-detail.php?month=1" class="month">Ocak</a>
        <a href="events-detail.php?month=3" class="month">Şubat</a>
        <a href="events-detail.php?month=2" class="month">Mart</a>
        <a href="events-detail.php?month=4" class="month">Nisan</a>
        <a href="events-detail.php?month=5" class="month">Mayıs</a>
        <a href="events-detail.php?month=6" class="month">Haziran</a>
        <a href="events-detail.php?month=7" class="month">Temmuz</a>
        <a href="events-detail.php?month=8" class="month">Ağustos</a>
        <a href="events-detail.php?month=9" class="month">Eylül</a>
        <a href="events-detail.php?month=10" class="month">Ekim</a>
        <a href="events-detail.php?month=11" class="month">Kasım</a>
        <a href="events-detail.php?month=12" class="month">Aralık</a>
    </section>


</div>





<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>