<?php

class CabinetController extends Controller
{
    public function actionIndex()
    {
        $params['title'] = 'Кабинет';
        if (!$userId = User::checkLogged()) {
            $this->redirect('/user/login');
        }
        $params['user'] = new User($userId);
        $this->view->make('cabinet/index', $params);

        return true;
    }

    public function actionEdit()
    {

        if (!$userId = User::checkLogged()) {
            $this->redirect('/user/login');
        };
        $user = new User($userId);
        $email = $user->get('email');
        $userName = $user->get('name');
        $params['userName'] = $userName;
        $result = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $oldPassword = $_POST['old_password'];
            $password = $_POST['password'];
            $errors = false;

            if (Utils::chekName($name)) {

            } else {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (Utils::chekPassword($password)) {

            } else {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            if (User::checkUserData($email, $oldPassword)) {

            } else {
                $errors[] = 'Старый пароль введен неверно';
            }
            if ($errors == false) {
                $user->set('name', $name);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $user->set('password', $password);
                $user->save();
            }
        }
        $params['title'] = 'Редактирование';
        $this->view->make('cabinet/edit', $params);
        return true;
    }
}