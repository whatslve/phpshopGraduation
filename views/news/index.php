<img class="head-img" src="/views/template/images/big-image.jpg" width="1920" height="600"/>
<div class="content-news">
    <h1 class="title">Новости:</h1>
    <?php foreach ($newsList as $news): ?>
        <div class="post">
            <h2><a href="/news/view/<?php echo $news['id'] ?>"><?php echo $news['title'] ?></a><span class="date">Дата создания: <?php echo $news['data'] ?></span>
            </h2>

            <p><?php echo $news['description'] ?></p>
            <div class="button-news"><a href="/news/view/<?php echo $news['id'] ?>">Читать дальше</a></div>
        </div>
    <?php endforeach ?>
</div>

