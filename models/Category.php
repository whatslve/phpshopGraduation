<?php

class Category extends Model
{
    protected $tableName = 'categories';

    public static function getCategoriesList()
    {
        $categories = [];
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM categories ORDER BY sort_order ASC");

        $categories = $result->fetchAll();

        return $categories;

    }

    public static function getCategoriesListAdmin()
    {
        $categories = [];
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM categories ORDER BY sort_order ASC");

        return $categories = $result->fetchAll();


    }

    public static function deleteCategoryById($id)
    {
        $category = new Category($id);
        $category->delete();
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public static function createCategory($name, $sortOrder, $status)
    {
        $options['name'] = $name;
        $options['sort_order'] = $sortOrder;
        $options['status'] = $status;
        $categoryCreate = new Category($options);
        $categoryCreate->insert();
        return $categoryCreate;

    }

    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $category = new Category($id);

        $category->set('name', $name);
        $category->set('sort_order', $sortOrder);
        $category->set('status', $status);
        $category->save();
    }

    public static function getCategoryById($id)
    {

        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM categories WHERE id = :id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();
    }
}