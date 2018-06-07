<?php

class AboutController extends Controller
{
    public function actionIndex()
    {
        $params['title'] = 'О нас';
        $this->view->make('about/index', $params);
        return true;

    }

}