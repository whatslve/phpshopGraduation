<div class="content">
    <div class="left_col">
        <div class="left_col_item">
            <h1>Фирмы:</h1>
            <ul>
                <?php foreach ($categories as $categoryItem): ?>
                    <li>
                        <a href="/category/<?php echo $categoryItem['id'] ?>"
                           class="<?php if ($categoryItem['id'] == $categoryId) {
                               echo 'left_col_active_a';
                           } ?>"><?php echo $categoryItem['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
    <div class="right_col">
        <h1 class="content-title">Каталог смартфонов:</h1>
        <?php foreach ($productsByCategory as $productItem): ?>
            <div class="product_item">
                <h1><a href="/product/<?php echo $productItem['id']; ?>"><?php echo $productItem['name']; ?></a></h1>
                <a href="/product/<?php echo $productItem['id']; ?>"><img
                            src="<?php echo Product::getImage($productItem['id']); ?>"></a>
                <p class="price">Цена:$<?php echo $productItem['price']; ?></p>
                <p>
                    <?php echo $productItem['description']; ?>
                </p>
                <div class="button">
                    <a href="/cart/add/<?php echo $productItem['id']; ?>">В корзину</a>
                </div>
            </div>
        <?php endforeach; ?>
        <?php echo $pagination->get(); ?>
    </div>
</div>
	
