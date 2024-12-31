<?php
$title = "Raporlar";
ob_start();

require_once '../model/db.php';
require_once '../class/report-class.php';

$db = new Database();
$report = new Report($db->conn);

$generalReport = $report->getGeneralReport();
$eventReport = $report->getEventReport();
//$customerReport = $report->getCustomerReport();
$employeeReport = $report->getEmployeeReport();
//$supplierReport = $report->getSupplierReport();
?>

<div class="main-content">
    <div class="container-report">

        <div class="report-section">
            <h3>Genel Rapor</h3>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Değer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Toplam Müşteri</td>
                        <td><?php echo $generalReport['total_customers']; ?></td>
                    </tr>
                    <tr>
                        <td>Toplam Etkinlik</td>
                        <td><?php echo $generalReport['total_events']; ?></td>
                    </tr>
                    <tr>
                        <td>Toplam Gelir</td>
                        <td>₺<?php echo number_format($generalReport['total_income'], 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Toplam Gider</td>
                        <td>₺<?php echo number_format($generalReport['total_expense'], 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Toplam Personel</td>
                        <td><?php echo $generalReport['total_employees']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="report-section">
            <h3>Etkinlik Raporu</h3>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Değer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eventReport as $event) { ?>
                        <tr>
                            <td>Etkinlik Adı</td>
                            <td><?php echo $event['davetTuru']; ?></td>
                        </tr>
                        <tr>
                            <td>Tarih</td>
                            <td><?php echo $event['tarih']; ?></td>
                        </tr>
                        <tr>
                            <td>Katılımcı Sayısı</td>
                            <td><?php echo $event['kisiSayisi']; ?></td>
                        </tr>
                        <tr>
                            <td>Gelir</td>
                            <td>₺<?php echo number_format($event['fiyat'], 2, ',', '.'); ?></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- <div class="report-section">
                <h3>Müşteri Raporu</h3>
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Değer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customerReport as $customer) { ?>
                        <tr>
                            <td>Müşteri Adı</td>
                            <td><?php echo $customer['customer_name']; ?></td>
                        </tr>
                        <tr>
                            <td>İletişim Bilgileri</td>
                            <td><?php echo $customer['contact_info']; ?></td>
                        </tr>
                        <tr>
                            <td>Katıldığı Etkinlikler</td>
                            <td><?php echo $customer['event_count']; ?></td>
                        </tr>
                        <tr>
                            <td>Harcamalar</td>
                            <td>₺<?php echo $customer['total_spent']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
             -->
        <div class="report-section">
            <h3>Personel Raporu</h3>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Değer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employeeReport as $employee) { ?>
                        <tr>
                            <td>Personel Adı</td>
                            <td><?php echo $employee['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Görevi</td>
                            <td><?php echo $employee['duty']; ?></td>
                        </tr>
                        <tr>
                            <td>Sicil</td>
                            <td><?php echo $employee['sicil']; ?></td>
                        </tr>
                        <tr>
                            <td>Maaş</td>
                            <td>₺<?php echo number_format($employee['wage'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- <div class="report-section">
                <h3>Tedarikçi Raporu</h3>
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Değer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplierReport as $supplier) { ?>
                        <tr>
                            <td>Tedarikçi Adı</td>
                            <td><?php echo $supplier['supplier_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Sağlanan Hizmetler</td>
                            <td><?php echo $supplier['services_provided']; ?></td>
                        </tr>
                        <tr>
                            <td>Harcamalar</td>
                            <td>₺<?php echo $supplier['total_spent']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> -->
    </div>
</div>

<?php
$content = ob_get_clean();
include '../includes/_layout.php';
?>