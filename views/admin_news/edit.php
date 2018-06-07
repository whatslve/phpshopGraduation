<?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p><?php echo $error; ?></p>
    <?php endforeach ?>

<?php endif ?>
<?php if (isset($result) && $result != false): ?>
    <p>Новость успешно Отредактирована!</p>
<?php endif ?>
<form action="#" method="post" enctype="multipart/form-data">
    <p>Название</p>
    <input type="text" name="title" value="<?php echo $news['title']; ?>"/>
    <p>Описание</p>
    <textarea name="description"/>
    <?php echo $news['description']; ?>
    </textarea>
    <p>Основной текст</p>
    <textarea name="content">

  <?php echo $news['content']; ?>
  </textarea>
    <p>Отображается</p>
    <select name="visible">

        <option value="1" <?php if ($news['visible'] == 1) echo ' selected="selected"'; ?>>Да</option>

        <option value="0" <?php if ($news['visible'] == 0) echo ' selected="selected"'; ?>>Нет</option>

    </select>
    <input type="submit" name="submit" class="btn btn-default" value="создать">
</form>
