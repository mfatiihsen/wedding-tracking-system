<?php
session_start();
// Eğer kullanıcı zaten giriş yaptıysa, ana sayfaya yönlendir
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ../pages/index.php");
    exit; // Bu yönlendirme sonrası kodun çalışmasını engellemek için exit
} else {
    header("Location: ../pages/login.php");
    exit; // Bu yönlendirme sonrası kodun çalışmasını engellemek için exit
}
