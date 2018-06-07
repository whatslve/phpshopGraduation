<img class="head-img" src="/views/template/images/big-image.jpg" width="1920" height="600"/>
<div class="content">
    <div class="left_col">
        <div class="left_col_item">


            <h1>Каталог
            </h1>
            <?php foreach ($categories as $categoryItem): ?>
                <a href="/category/<?php echo $categoryItem['id']; ?>">
                    <?php echo $categoryItem['name']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="right_col">
        <div class="cart">
            <?php if ($productsInCart): ?>
                <p>Вы выбрали такие товары:</p>
                <table class="table_col">
                    <tr>
                        <th>Код товара</th>
                        <th>Название</th>
                        <th>Стомость, $</th>
                        <th>Количество, шт</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['code']; ?></td>
                            <td>
                                <a href="/product/<?php echo $product['id']; ?>">
                                    <?php echo $product['name']; ?>
                                </a>
                            </td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $productsInCart[$product['id']]; ?></td>
                            <td>
                                <div class="delete-button"><a href="/cart/delete/<?php echo $product['id']; ?>">×</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="total_price">
                        <td colspan="4" class="total_price">Общая стоимость, :</td>
                        <td align="center">$<?php echo $totalPrice; ?></td>
                    </tr>

                </table>
                <a href="/cart/clear">Очистить корзину</a><br/>
                <div class="button-news"><a class="btn btn-default checkout" href="/cart/checkout"><i
                                class="fa fa-shopping-cart"></i> Оформить заказ</a></div>
            <?php else: ?>
                <p>Корзина пуста</p>
                <a href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
            <?php endif; ?>
        </div>
    </div>
</div>


