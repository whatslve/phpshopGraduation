<?php

class News extends Model
{
    protected $tableName = 'news';

    public static function getNewsList()
    {

        $db = Db::getConnection();//Получаем подключение к базе данных

        $newsList = [];
        $sql = "SELECT `id`,`title`,`description`,`data` FROM news WHERE visible = '1' ORDER BY `data` DESC";
        $result = $db->query($sql);//Выполнение запроса
        $news = $result->fetchAll();
        return $news;
    }

    public static function getNewsById($id)
    {
        $db = Db::getConnection();//Получаем подключение к базе данных


        $sql = "SELECT `id`,`title`,`content`,`description`,`data` FROM news WHERE visible = 1 AND id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();

    }

    public static function getNewsAdminById($id)
    {
        $db = Db::getConnection();//Получаем подключение к базе данных


        $sql = "SELECT `id`,`title`,`content`,`description`,`visible`,`data` FROM news WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();

    }

    public static function createNews($title, $description, $content, $visible)
    {
        $db = Db::getConnection();

        $news = new News([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'visible' => $visible
        ]);
        $news->insert();
        return true;
    }

    public static function updateNews($title, $description, $content, $visible, $id)
    {
        $db = Db::getConnection();
        $news = new News($id);
        $news->set('title', $title);
        $news->set('description', $description);
        $news->set('content', $content);
        $news->set('visible', $visible);
        $news->save();
        return true;
    }

    public static function deleteNewsById($id)
    {
        $news = new News($id);
        $news->delete();
        return true;
    }
}