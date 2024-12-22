<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="../assets/css/login.css"> <!-- Stil dosyanızın yolu -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>

<body class="login-page">
    <div class="login-container">
        <h2 class="giris-title">GİRİŞ YAP</h2>
        <form action="authenticate.php" method="post">
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
            <button class="giris-btn" type="submit">Giriş Yap</button>
        </form>
    </div>
</body>

</html>