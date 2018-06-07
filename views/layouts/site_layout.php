<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php if (isset($title)) {
            echo $title;
        } else {
            echo 'Страница';
        } ?></title>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="/views/template/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/views/template/css/style.css">
    <link rel="shortcut icon" href="/upload/images/other/favicon.png" type="image/png">
</head>
<body>
<div class="page">
    <div class="top_bar_info">
        <div class="info">
            <p>Горячая линия: 88005553535</p>
            <p>Почта: phoneshop@gmail.com</p>
        </div>
    </div>
    <div class="box-header">
        <header>
            <div class="logo">
                <h3><a href="/">PhoneShop.local</a></h3>
            </div>
            <div class="box-menu">
                <menu>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog">Каталог</a></li>
                    <li><a href="/news">Новости</a></li>
                    <li><a href="/about">О компании</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </menu>
            </div>
            <div class="right_links">
                <menu>
                    <li><img src="/views/template/images/icons/cart.png" width="20px" height="20px"><a href="/cart">Корзина(<?php echo Cart::countItems() ?>
                            )</a></li>
                    <?php if (User::isGuest()): ?>
                        <li><img src="/views/template/images/icons/reg.png" width="20px" height="20px"><a
                                    href="/user/register">Регистрация</a></li>
                        <li><img src="/views/template/images/icons/login.png" width="20px" height="20px"><a
                                    href="/user/login">Войти</a></li>
                    <?php else: ?>
                        <li><img src="/views/template/images/icons/login.png" width="20px" height="20px"><a
                                    href="/cabinet">Аккаунт</a></li>
                        <li><img src="/views/template/images/icons/unlock.png" width="20px" height="20px"><a
                                    href="/user/logout">Выйти</a></li>
                    <?php endif; ?>
                </menu>
            </div>
        </header>
    </div>
    <div class="flex-container">

        <?php require_once(ROOT . '/views/' . $viewName . '.php');//формируем путь к отображению?>
    </div>
    <div class="box-footer">
        <div class="footer">

            <div class="footer_info">
                <p>
                    phoneshop.local © - since 2018
                </p>
            </div>
            <menu>
                <li><a href="/">Главная</a></li>
                <li><a href="/catalog">Каталог смартфонов</a></li>
                <li><a href="/news">Новости</a></li>
                <li><a href="/about">О нас</a></li>
                <li><a href="/contacts">Контакты</a></li>
            </menu>
            <menu>
                <li><a href="/cart">Корзина</a></li>
                <li><a href="/user/login">Войти</a></li>
                <li><a href="/user/register">Регистрация</a></li>
            </menu>
            <a href="#">Наверх ^</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>

    $(document).ready(function () {
        $('.slider').slick({
            slidesToShow: 3,
            dots: true,
            infinite: true,
            speed: 500,
            autoplay: true,
            cssEase: 'linear'
        });
    });
</script>
</body>
</html>
