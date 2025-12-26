<?php
session_start();
$error = '';

if ($_POST) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $fake_users = [
        ['login' => 'admin', 'password' => '123', 'role' => 'admin', 'full_name' => 'Администратор'],
        ['login' => 'ivanov', 'password' => '456', 'role' => 'user', 'full_name' => 'Иванов И.И.']
    ];

    foreach ($fake_users as $u) {
        if ($u['login'] === $login && $u['password'] === $password) {
            $_SESSION['user'] = $u;
            header("Location: index.php");
            exit;
        }
    }
    $error = "Неверный логин или пароль";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Вход — Администрация</title>
    <link rel="stylesheet" href="style.css"> <!-- ✅ Правильный путь -->
</head>
<body>

    <header class="site-header">
        <h1>Администрация муниципального округа «Беловский»</h1>
        <p>Вход в личный кабинет</p>
    </header>

    <nav class="site-nav">
        <a href="index.php">Главная</a>
        <a href="login.php">Вход</a>
        <a href="register.php">Регистрация</a>
        <a href="#">Документы</a>
        <a href="#">Контакты</a>
    </nav>

    <main class="main-content">
        <h2 class="section-title">Вход в систему</h2>
        <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label>Логин:</label>
                <input type="text" name="login" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn">Войти</button>
        </form>
        <p style="margin-top: 15px;"><a href="index.php">← Назад на главную</a></p>
    </main>
</body>
</html>