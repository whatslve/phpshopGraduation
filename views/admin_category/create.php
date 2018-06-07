<div class="login">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/category">Управление категориями</a></li>
            <li>Создание категории</li>
        </ol>
    </div>

    <h4>Добавить новую категорию</h4>

    <br/>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <form action="#" method="post" class="login_form">

        <p>Название</p>
        <input type="text" name="name" placeholder="" value="">

        <p>Порядковый номер</p>
        <input type="text" name="sort_order" placeholder="" value="">

        <p>Статус</p>
        <select name="status">
            <option value="1" selected="selected">Отображается</option>
            <option value="0">Скрыта</option>
        </select>

        <br><br>

        <input type="submit" name="submit" class="button_form" value="Сохранить">
    </form>


</div>

