<img class="head-img" src="/views/template/images/big-image.jpg" width="1920" height="600"/>
<div class="content-news">

    <div class="cabinet">

        <h1>Личный кабинет</h1>
        <p>Здравствуйте, <?php echo $user->get('name'); ?>
            . <?php if ($user->get('role') == 'admin'): ?>Вы администратор!<?php endif ?></p>
        <p>Вам доступны следующие функции:
        <p>
            <br/>
        <ul>
            <li><a href="/cabinet/edit">Редактировать данные</a></li>
            <li><a href="/cart">Список покупок</a></li>
        </ul>
        <?php if ($user->get('role') == 'admin'): ?>
            <a href="/admin">Админ панель</a>
        <?php endif ?>
    </div>
</div>

