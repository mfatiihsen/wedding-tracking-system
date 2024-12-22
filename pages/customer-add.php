<?php
$title = "Müşteri Ekle";
ob_start();
?>


<div class="main-content">

    <div class="container-person">
        <div class="form-container">
            <h2 class="title-person">Müşteri Ekle</h2>
            <form action="person-add.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Ad:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyad:</label>
                        <input type="text" id="surname" name="surname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Telefon:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_number">Sicil Numarası:</label>
                        <input type="text" id="id_number" name="id_number" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Görevi:</label>
                        <input type="text" id="position" name="position" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="salary">Maaşı:</label>
                        <input type="text" id="salary" name="salary" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">İşe Giriş Tarihi:</label>
                        <input type="date" id="start_date" name="start_date" required>
                    </div>
                </div>
                <button class="btn-person" type="submit">Ekle</button>
            </form>
        </div>
    </div>

</div>



<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>