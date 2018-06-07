<?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p><?php echo $error; ?></p>
    <?php endforeach ?>

<?php endif ?>
<?php if (isset($result) && $result != false): ?>
    <p>Новость успешно создана!</p>
<?php endif ?>
<form action="#" method="post" enctype="multipart/form-data">
    <p>Название</p>
    <input type="text" name="title"/>
    <p>Описание</p>
    <input type="text" name="description"/>
    <p>Основной текст</p>
    <input type="text" name="content"/>
    <p>Отображается</p>
    <select name="visible">
        <option value="1" selected="selected">Да</option>
        <option value="0">Нет</option>
    </select>
    <input type="submit" name="submit" class="btn btn-default" value="создать">
</form>
