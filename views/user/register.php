<div class="login">
    <h1>Регистрация</h1>
    <?php if (isset($errors) and is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li>- <? echo $e; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
    <form action="#" method="post" class="login_form">

        <label for="name-label">Введите свое имя:</label>
        <input type="text" id="name-label" name="name" placeholder="Имя" value="<?php echo $name; ?>" required/>
        <label for="email-label">Введите свой E-Mail:</label>
        <input type="email" id="email-label" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required/>
        <label for="password-label">Введите свой пароль:</label>
        <input type="password" id="password-label" name="password" placeholder="Пароль" value="" required>
        <button type="submit" name="submit" class="button_form">Зарегистрироваться</button>
        <br>
        <p><a href="/user/login">Войдите, если уже зарегистрированы!</a></p>
    </form>
</div>

