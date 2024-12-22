<?php
$titile = "Müşteriler";
ob_start();
?>


<div class="main-content">
    <header>
        <h1>Müşteriler</h1>
    </header>
    <table class="customer-table">
        <thead>
            <tr>
                <th>Ad</th>
                <th>Soyad</th>
                <th>E-posta</th>
                <th>Telefon</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ali</td>
                <td>Yılmaz</td>
                <td>ali.yilmaz@example.com</td>
                <td>+90 555 123 45 67</td>
                <td><button class="details-customer-btn">Detaylar</button></td>
            </tr>
            <tr>
                <td>Mehmet</td>
                <td>Özdemir</td>
                <td>mehmet.ozdemir@example.com</td>
                <td>+90 555 234 56 78</td>
                <td><button class="details-customer-btn">Detaylar</button></td>
            </tr>
            <tr>
                <td>Ayşe</td>
                <td>Arslan</td>
                <td>ayse.arslan@example.com</td>
                <td>+90 555 345 67 89</td>
                <td><button class="details-customer-btn">Detaylar</button></td>
            </tr>
        </tbody>
    </table>
</div>



<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>