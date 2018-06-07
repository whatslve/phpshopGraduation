<?php

class NewsController extends Controller
{
    public function actionIndex()
    {
        $params['newsList'] = News::getNewsList();
        $params['title'] = 'Новости';
        $this->view->make('news/index', $params);
        return true;
    }

    public function actionView($id)
    {

        $params['newsItem'] = News::getNewsById($id);
        $params['title'] = $params['newsItem']['title'];
        $this->view->make('news/view', $params);
        return true;
    }
}