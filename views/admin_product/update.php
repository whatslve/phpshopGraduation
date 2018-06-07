<div class="login">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/product">Управление товарами</a></li>
            <li class="active">Редактировать товар</li>
        </ol>
    </div>


    <h4>Редактировать товар #</h4>

    <br/>


    <form action="#" method="post" enctype="multipart/form-data" class="login_form">

        <p>Название товара</p>
        <input type="text" name="name" placeholder="" value="<?php echo $product->get('name'); ?>">

        <p>Артикул</p>
        <input type="text" name="code" placeholder="" value="<?php echo $product->get('code'); ?>">

        <p>Стоимость, $</p>
        <input type="text" name="price" placeholder="" value="<?php echo $product->get('price'); ?>">

        <p>Категория</p>
        <select name="category_id">
            <?php if (is_array($categoriesList)): ?>
                <?php foreach ($categoriesList as $category): ?>
                    <option value="<?php echo $category['id']; ?>"
                        <?php if ($product->get('category_id') == $category['id']) echo 'selected="selected"'; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <br/><br/>

        <p>Производитель</p>
        <input type="text" name="brand" placeholder="" value="<?php echo $product->get('brand'); ?>">

        <p>Изображение товара</p>
        <img src="<?php echo Product::getImage($product->get('id')); ?>" width="200" alt=""/>
        <input type="file" name="image" placeholder="" value="<?php echo $product->get('image'); ?>">

        <p>Детальное описание</p>
        <textarea name="description"><?php echo $product->get('description'); ?></textarea>

        <br/><br/>

        <p>Наличие на складе</p>
        <select name="available">
            <option value="1" <?php if ($product->get('available') == 1) echo 'selected="selected"'; ?>>Да</option>
            <option value="0" <?php if ($product->get('available') == 0) echo 'selected="selected"'; ?>>Нет</option>
        </select>

        <br/><br/>

        <p>Новинка</p>
        <select name="is_new">
            <option value="1" <?php if ($product->get('is_new') == 1) echo 'selected="selected"'; ?>>Да</option>
            <option value="0" <?php if ($product->get('is_new') == 0) echo 'selected="selected"'; ?>>Нет</option>
        </select>

        <br/><br/>

        <p>Рекомендуемые</p>
        <select name="is_recomended">
            <option value="1" <?php if ($product->get('is_recomended') == 1) echo 'selected="selected"'; ?>>Да</option>
            <option value="0" <?php if ($product->get('is_recomended') == 0) echo 'selected="selected"'; ?>>Нет</option>
        </select>

        <br/><br/>

        <p>Статус</p>
        <select name="status">
            <option value="1" <?php if ($product->get('status') == 1) echo 'selected="selected"'; ?>>Отображается
            </option>
            <option value="0" <?php if ($product->get('status') == 0) echo 'selected="selected"'; ?>>Скрыт</option>
        </select>

        <br/><br/>

        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

        <br/><br/>

    </form>
</div>
</div>


