<?php

class AdminNewsController extends AdminBase
{
    public function actionIndex()
    {
        $news = News::getNewsList();

        require_once(ROOT . '/views/admin_news/index.php');
        return true;
    }

    public function actionCreate()
    {
        if (isset ($_POST['submit'])) {
            $errors = false;

            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $visible = $_POST['visible'];

            if (!isset($title) || empty($title)) {
                $errors[] = 'Заполните название поста';
            }
            if (!isset($description) || empty($description)) {
                $errors[] = 'Заполните описание поста';
            }
            if (!isset($content) || empty($content)) {
                $errors[] = 'Заполните контент поста';
            }

            if ($errors == false) {
                $result = News::createNews($title, $description, $content, $visible);

            }


        }

        require_once(ROOT . '/views/admin_news/create.php');
        return true;
    }

    public function actionEdit($id)
    {
        $news = News::getNewsAdminById($id);
        if (isset ($_POST['submit'])) {
            $errors = false;

            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $visible = $_POST['visible'];

            if (!isset($title) || empty($title)) {
                $errors[] = 'Заполните название поста';
            }
            if (!isset($description) || empty($description)) {
                $errors[] = 'Заполните описание поста';
            }
            if (!isset($content) || empty($content)) {
                $errors[] = 'Заполните контент поста';
            }

            if ($errors == false) {
                $result = News::updateNews($title, $description, $content, $visible, $id);

            }


        }
        require_once(ROOT . '/views/admin_news/edit.php');
        return true;
    }

    public function actionDelete($id)
    {
        $result = News::deleteNewsById($id);
        $this->redirect('/admin/news');
        return true;
    }
}