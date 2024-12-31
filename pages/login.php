<?php

ini_set('session.cookie_secure', 1);  // Sadece HTTPS üzerinden çerez gönderilsin
ini_set('session.cookie_httponly', 1);  // JavaScript üzerinden erişilemesin
ini_set('session.use_only_cookies', 1);  // Çerez dışındaki yöntemlerle oturum başlatılmasın
session_start(); // Oturumu başlatıyoruz

include '../model/db.php';
$db = new Database();
$db = $db->conn;

if (isset($_POST['giris'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Kullanıcıyı veritabanından sorgula
    $query = $db->prepare("SELECT * FROM admin WHERE mail = :mail");
    $query->execute(array('mail' => $email));

    $row = $query->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Şifreyi kontrol et
        if (($pass == $row['pass'])) {
            $_SESSION['logged_in'] = true;  // Oturumun açıldığını belirten değişken
            $_SESSION['email'] = $email;    // Kullanıcı e-postasını session'a kaydediyoruz
            $_SESSION['user_id'] = $row['id']; // Kullanıcı ID'sini de kaydedebiliriz 
            $_SESSION['name'] = $row['name']; // Kullanıcı adını de kaydedebiliriz 
            header("Location: index.php");
        } else {
            echo "Parola Yanlış veya email yanlış";
        }
    } else {
        echo "Parola Yanlış veya email yanlış";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="../assets/css/login.css"> <!-- Stil dosyanızın yolu -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome -->
</head>

<body class="login-page">
    <div class="login-container">
        <h2 class="giris-title">GİRİŞ YAP</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">E-posta:</label>
                <div class="input-container">
                    <input type="email" id="email" name="email" required>
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <div class="input-container">
                    <input type="password" id="password" name="password" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>
            <button class="giris-btn" name="giris" type="submit">Giriş Yap</button>
        </form>
    </div>
</body>

</html>