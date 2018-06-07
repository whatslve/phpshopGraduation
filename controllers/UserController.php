<?php

class UserController extends Controller
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $errors = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if (Utils::chekName($name)) {

            } else {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (Utils::chekEmail($email)) {

            } else {
                $errors[] = 'Проверьте правильность написания e-mail';
            }

            if (Utils::chekPassword($password)) {

            } else {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            if (User::chekEmailExists($email)) {
                $errors[] = 'такой email уже используется';
            }
            if ($errors == false) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);//Хешируем пароль
                $user = new User([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password_hash,
                ]);
                $result = $user->register();
                $this->redirect('/user/login');
            }
        }
        $params['errors'] = $errors;
        $params['name'] = $name;
        $params['email'] = $email;
        $this->view->make('user/register', $params);
        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';
        $errors = false;


        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            //Валидцаия полей
            if (!Utils::chekEmail($email)) {
                $errors[] = 'Неправильный емайл';
            }
            if (!Utils::chekPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }

            $userId = User::checkUserData($email, $password);


            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
                $this->redirect('/cabinet');
            }
        }
        $params['errors'] = $errors;
        $this->view->make('user/login', $params);
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        $this->goHome();
    }
}