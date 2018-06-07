<img class="head-img" src="/views/template/images/big-image.jpg" width="1920" height="600"/>
<div class="content-news">
    <div class="product_full">


        <div class="product_item">
            <h1><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h1>
            <img src="  <?php echo Product::getImage($product['id']); ?>">
            <div class="button">
                <a href="/">В корзину</a>
            </div>
            <p class="price">Цена:$<?php echo $product['price']; ?></p>
        </div>
        <div class="description_product">
            <p>
                <?php echo $product['description']; ?>
            </p>
        </div>
    </div>
</div>


