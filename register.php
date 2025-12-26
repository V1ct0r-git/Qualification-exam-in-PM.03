<?php
session_start();
$message = '';

if ($_POST) {
    $message = "Регистрация прошла успешно! Войдите с вашим логином и паролем '12345'.";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация — Администрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="site-header">
        <h1>Администрация муниципального округа «Беловский»</h1>
        <p>Регистрация гражданина</p>
    </header>

    <nav class="site-nav">
        <a href="index.php">Главная</a>
        <a href="login.php">Вход</a>
        <a href="register.php">Регистрация</a>
        <a href="#">Документы</a>
        <a href="#">Контакты</a>
    </nav>

    <main class="main-content">
        <h2 class="section-title">Регистрация</h2>
        <?php if ($message): ?><p class="success"><?= $message ?></p><?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label>ФИО:</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Логин (email или СНИЛС):</label>
                <input type="text" name="login" class="form-control" required>
            </div>
            <button type="submit" class="btn">Зарегистрироваться</button>
        </form>
        <p style="margin-top: 15px;"><a href="index.php">← Назад на главную</a></p>
    </main>
</body>
</html>