<?php

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        $params['categoriesList'] = Category::getCategoriesListAdmin();
        $this->view->make('admin_category/index', $params, 'admin_layout');
        return true;
    }

    public function actionCreate()
    {
        $errors = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($name, $sortOrder, $status);
                // Перенаправляем пользователя на страницу управлениями категориями
                $this->redirect('/admin/category');
            }
        }
        $params['errors'] = $errors;
        $this->view->make('admin_category/create', $params, 'admin_layout');
        return true;
    }

    public function actionUpdate($id)
    {

        // Получаем данные о конкретной категории
        $params['category'] = Category::getCategoryById($id);
        $params['erors'] = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);
            // Перенаправляем пользователя на страницу управлениями категориями
            $this->redirect('/admin/category');
        }
        // Подключаем вид
        $this->view->make('admin_category/update', $params, 'admin_layout');
        return true;
    }

    public function actionDelete($id)
    {
        if (isset ($_POST['submit'])) {
            Category::deleteCategoryById($id);
            $this->redirect('/admin/category');

        }
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
}