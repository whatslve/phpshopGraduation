<div class="admin-content">
    <h1>Управление продуктами</h1>
<?php
echo '<a href="/admin/product/create">Создать</a> <br>';
foreach ($productsList as $product) {
    echo '<a href="/admin/product/delete/' . $product['id'] . '"> Удалить </a>';
    echo '<a href="/admin/product/update/' . $product['id'] . '"> Редактировать </a>';

    echo $product['name'] . '<br>';
}
?>
</div>