<a href="/admin/news/create">Создать новость</a>


<?php foreach ($news as $newsItem): ?>
    <p>
        <a href="/news/view/<?php echo $newsItem['id'] ?>"><?php echo $newsItem['title'] ?></a>
        <a href="/admin/news/edit/<?php echo $newsItem['id'] ?>">Редактировать новость</a>
        <a href="/admin/news/delete/<?php echo $newsItem['id'] ?>">Удалить новость</a>
    </p>
<?php endforeach ?>
