<div class="login">
    <h1>Вход на сайт</h1>
    <?php if (isset($errors) and is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li>- <? echo $e; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
    <form action="#" method="post" class="login_form">

        <label for="email-label">Введите свой E-Mail:</label>
        <input id="email-label" type="email" name="email" placeholder="E-mail" value="" required/>
        <label for="password-label">Введите свой пароль:</label>
        <input id="password-label" type="password" name="password" placeholder="Пароль" value="" required/>
        <button type="submit" name="submit" class="button_form">Вход</button>
        <div class="button">

            <a href="/user/register">Регистрация</a></div>
    </form>
</div>

