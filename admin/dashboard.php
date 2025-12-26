<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Админка — Администрация</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <header class="site-header">
        <h1>Панель администратора</h1>
        <p>Управление обращениями и пользователями</p>
    </header>

    <nav class="site-nav">
        <a href="../index.php">Главная</a>
        <a href="../logout.php">Выйти</a>
    </nav>

    <main class="main-content">
        <h2 class="section-title">Быстрый доступ</h2>
        <ul>
            <li>Управление обращениями граждан</li>
            <li>Просмотр регистраций новых пользователей</li>
            <li>Публикация новостей и уведомлений</li>
            <li>Настройка прав доступа</li>
        </ul>
        <p><a href="../index.php" class="btn">На главную</a></p>
    </main>
</body>
</html>
