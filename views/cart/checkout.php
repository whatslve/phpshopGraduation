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

            <h2 class="title text-center">Корзина</h2>


            <?php if ($result): ?>

                <p>Заказ оформлен. Мы Вам перезвоним.</p>

            <?php else: ?>

                <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, $.</p><br/>


                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>


                <form action="#" method="post" class="login_form">

                    <p>Вашe имя</p>
                    <input type="text" name="userName" placeholder="Имя" value="<?php echo $userName; ?>"/>

                    <p>Номер телефона</p>
                    <input type="text" name="userPhone" placeholder="Телефон" value="<?php echo $userPhone; ?>"/>

                    <p>Комментарий к заказу</p>
                    <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                    <br/>
                    <br/>
                    <input type="submit" name="submit" class="button_form" value="Оформить"/>
                </form>


            <?php endif; ?>
        </div>
    </div>
</div>
