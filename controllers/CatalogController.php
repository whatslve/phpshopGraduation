<?php

class CatalogController extends Controller
{
    //дефолтное действие
    public function actionIndex($page = 1)
    {

        $params['categories'] = Category::getCategoriesList(false);


        $params['productsList'] = Product::getProductsList($page);

        $total = Product::getTotalProducts();

        $params['pagination'] = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        $params['title'] = 'Каталог';
        $this->view->make('catalog/index', $params);

        return true;
    }

    //категории
    public function actionCategory($categoryId, $page = 1)
    {

        $params['categories'] = Category::getCategoriesList(false);
        $params['title'] = 'Категория';
        $params['productsByCategory'] = Product::getProductListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        $params['pagination'] = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $this->view->make('catalog/category', $params);

        return true;
    }

}