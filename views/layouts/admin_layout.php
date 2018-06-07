<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="/views/template/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/views/template/css/style.css">
</head>
<body>
<div class="page">
    <div class="header-admin">
        <h1><a href="/admin">Админпанель</a></h1>
        <p><a href="/">На сайт</a></p>
    </div>
    <div class="flex-container">
        <?php require_once(ROOT . '/views/' . $viewName . '.php'); ?>
    </div>
    <div class="footer-admin">
        <p>
            Админпанель v0.1
        </p>
    </div>
</div>
</body>
</html>
