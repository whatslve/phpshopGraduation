<?php

class ContactsController extends Controller
{
    public function actionIndex()
    {

        $this->view->make('contacts/index');

        return true;
    }
}