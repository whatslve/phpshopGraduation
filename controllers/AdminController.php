<?php

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        $this->view->make('admin/index', [], 'admin_layout');
        return true;
    }
}