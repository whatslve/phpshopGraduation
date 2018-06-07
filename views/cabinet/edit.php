<?php if (isset($errors) and is_array($errors)): ?>
    <?php foreach ($errors as $e): ?>
        <? echo $e; ?>
    <?php endforeach; ?>
<?php endif ?>

<h1> Редактирование данных</h1>
<form action="#" method="post">
    <input type="text" name="name" placeholder="Имя" value="<?php echo $userName; ?>"/>
    <input type="password" name="old_password" placeholder="Старый пароль" value=""/>
    <input type="password" name="password" placeholder="Новый пароль" value=""/>
    <button type="submit" name="submit">Сохранить</button>
</form>

