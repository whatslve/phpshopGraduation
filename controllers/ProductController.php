<?php

class ProductController extends Controller
{
    public function actionView($id)
    {
        $params['product'] = Product::getProductById($id);
        $this->view->make('product/view', $params);
        return true;
    }
}