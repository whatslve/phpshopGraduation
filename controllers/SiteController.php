<?php

//Контроллер главной страницы
class SiteController extends Controller
{
    public function actionIndex()
    {//Дефолтное действие
        $params['categories'] = Category::getCategoriesList();//Загрузка списка категорий из базы данных
        $params['latestProducts'] = Product::getLatestProudcts();//Загрузка последних добавленных продуктов в базу данных
        $params['recomendedProducts'] = Product::getRecommendedProudcts();
        $params['title'] = 'Главная';
        $this->view->make('site/index', $params);//Подключение шаблона страницы
        return true;
    }

}