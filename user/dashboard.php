<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: ../index.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Личный кабинет — Гражданин</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <header class="site-header">
        <h1>Личный кабинет гражданина</h1>
        <p>Добро пожаловать, <?= htmlspecialchars($user['full_name']) ?>!</p>
    </header>

    <nav class="site-nav">
        <a href="../index.php">Главная</a>
        <a href="../logout.php">Выйти</a>
    </nav>

    <main class="main-content">
        <h2 class="section-title">Мои обращения</h2>
        <div class="section bg-light">
            <p><strong>№123</strong> — Вопрос по уборке двора. Статус: <em>в обработке</em></p>
            <p><strong>№456</strong> — Запрос на установку лавочки. Статус: <em>рассмотрено</em></p>
        </div>
        <p><a href="../index.php" class="btn">На главную</a></p>
    </main>
</body>
</html>
