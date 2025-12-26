<?php
session_start();

// Имитация пользователей
$fake_users = [
    ['login' => 'admin', 'password' => '123', 'role' => 'admin', 'full_name' => 'Администратор'],
    ['login' => 'ivanov', 'password' => '456', 'role' => 'user', 'full_name' => 'Иванов И.И.']
];

// ❌ ОШИБКА 1: некорректная авторизация (нет else)
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role'] === 'admin') {
        header("Location: admin/dashboard.php");
        exit;
    }
    header("Location: user/dashboard.php");
    exit;
}

// ❌ ОШИБКА 2: поиск принимается, но не обрабатывается
$search_query = $_POST['search'] ?? '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Администрация муниципального округа</title>
    <!-- ❌ ОШИБКА 3: неправильный путь → CSS не загружается -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Но визуал будет за счёт inline-стилей ниже -->
    <style>
        /* ❌ ОШИБКА 4: дублирование стилей — нарушение DRY */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; line-height: 1.6; }
        .site-header { background: #2c3e50; color: white; padding: 15px; text-align: center; }
        .site-nav { background: #34495e; padding: 10px; text-align: center; }
        .site-nav a { color: white; text-decoration: none; margin: 0 12px; padding: 5px 8px; border-radius: 3px; }
        .site-nav a:hover { background: #2c3e50; }
        .main-content { max-width: 1000px; margin: 20px auto; padding: 0 15px; }
        .section { margin-bottom: 30px; }
        .section-title { margin-bottom: 15px; color: #2c3e50; }
        .form-control { width: 100%; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        .btn {
            background-color: #3498db; color: white; border: none; padding: 8px 16px;
            border-radius: 4px; cursor: pointer; font-size: 14px; text-decoration: none;
            display: inline-block;
        }
        .btn:hover { background-color: #2980b9; }
        .list-item { margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #eee; }
        .bg-light { background: #f9f9f9; padding: 15px; border-radius: 5px; }
        .bg-gray { background: #ecf0f1; padding: 15px; border-radius: 5px; }
        .site-footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #ccc; text-align: center; color: #7f8c8d; }
        .site-footer a { color: #2980b9; margin: 0 10px; text-decoration: none; }
        .site-footer a:hover { text-decoration: underline; }
        .flex-form { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .flex-form .form-control { flex: 1; min-width: 200px; }
    </style>
</head>
<body>

    <header class="site-header">
        <h1>Администрация муниципального округа «Беловский»</h1>
        <p>Официальный сайт органа местного самоуправления</p>
    </header>

    <nav class="site-nav">
        <a href="index.php">Главная</a>
        <a href="login.php">Вход</a>
        <a href="register.php">Регистрация</a>
        <a href="#">Документы</a>
        <a href="#">Контакты</a>
    </nav>

    <main class="main-content">

        <section class="section">
            <h2 class="section-title">Поиск по сайту</h2>
            <form method="post" class="flex-form">
                <input type="text" name="search" placeholder="Введите запрос (например, 'благоустройство')" class="form-control">
                <!-- ❌ ОШИБКА 5: кнопка не отправляет форму -->
                <button type="button" class="btn">Найти</button>
            </form>
        </section>

        <section class="section">
            <h2 class="section-title">Новости администрации</h2>
            <ul class="list-unstyled">
                <li class="list-item"><strong>25.12.2025</strong> — Открыта новая зона отдыха в парке «Юбилейный»</li>
                <li class="list-item"><strong>20.12.2025</strong> — Приём заявлений на субсидии до 31 декабря</li>
                <li class="list-item"><strong>15.12.2025</strong> — Изменения в графике работы МФЦ</li>
            </ul>
        </section>

        <section class="section bg-light">
            <h2 class="section-title">Подать обращение</h2>
            <p>Граждане могут направить обращение в электронной форме:</p>
            <!-- ❌ ОШИБКА 6: ссылка на несуществующую страницу -->
            <a href="submit_appeal.php" class="btn">Подать обращение</a>
        </section>

        <section class="section">
            <h2 class="section-title">Полезные разделы</h2>
            <ul>
                <li><a href="#">Муниципальные услуги</a></li>
                <li><a href="#">Градостроительство</a></li>
                <li><a href="#">Бюджет и финансы</a></li>
                <li><a href="#">Противодействие коррупции</a></li>
                <li><a href="#">Открытые данные</a></li>
            </ul>
        </section>

        <section class="section bg-gray">
            <h2 class="section-title">Контактная информация</h2>
            <p><strong>Адрес:</strong> г. Белово, ул. Советская, д. 15</p>
            <p><strong>Телефон:</strong> +7 (384) 555-12-34</p>
            <p><strong>Email:</strong> admin@belovo-mo.ru</p>
            <p><strong>Приём граждан:</strong> Пн–Пт, 9:00–18:00 (перерыв 13:00–14:00)</p>
        </section>

        <footer class="site-footer">
            <a href="index.php">Главная</a>
            <a href="login.php">Вход</a>
            <a href="register.php">Регистрация</a>
            <a href="#">Карта сайта</a>
            <p>© 2025 Администрация муниципального округа «Беловский»</p>
        </footer>

    </main>
</body>
</html>