<?php

abstract class AdminBase extends Controller
{

    public function __construct()
    {
        $this->view = new View();

        if (!$userId = User::checkLogged()) {
            $this->redirect('/user/login');
        }

        $user = new User($userId);

        if ($user->get('role') == 'admin') {
            return true;
        }
        die('Access denied');
    }
}