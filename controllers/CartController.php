<?php

class CartController extends Controller
{
    public function actionIndex()
    {
        $params['categories'] = Category::getCategoriesList(false);

        $productsInCart = false;

        $productsInCart = Cart::getProducts();
        $params['productsInCart'] = $productsInCart;
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $params['products'] = $products;
            $params['totalPrice'] = Cart::getTotalPrice($products);
        }
        $params['title'] = 'Корзина';
        $this->view->make('cart/index', $params);
        return true;
    }

    public function actionAdd($id)
    {

        Cart::addProduct($id);

        $this->goBack();
    }


    public function actionCheckout()
    {

        // Список категорий для левого меню
        $params['categories'] = Category::getCategoriesList(false);
        $params['title'] = 'Оформление заказа';
        // Статус успешного оформления заказа
        $result = false;
        $errors = false;

        // Форма отправлена?
        if (isset($_POST['submit'])) {
            // Форма отправлена? - Да
            // Считываем данные формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            // Валидация полей
            $errors = false;
            if (!Utils::chekName($userName))
                $errors[] = 'Неправильное имя';
            if (!Utils::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            // Форма заполнена корректно?
            if ($errors == false) {
                // Форма заполнена корректно? - Да
                // Сохраняем заказ в базе данных
                // Собираем информацию о заказе
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = '5';
                } else {
                    if (!$userId = User::checkLogged()) {
                        $this->redirect('/user/login');
                    }
                }

                // Сохраняем заказ в БД
                $id_order = Order::cartSave($userName, $userPhone, $userComment, $userId, $productsInCart);
                if ($id_order != false) {
                    foreach ($productsInCart as $id_product => $counts) {
                        Order::LinksSave($id_order, $id_product,$counts);
                    }
                }
                $result = true;
                if ($result) {
                    // Очищаем корзину
                    Cart::clear();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $params['totalPrice'] = Cart::getTotalPrice($products);
                $params['totalQuantity'] = Cart::countItems();
            }
        } else {
            // Форма отправлена? - Нет
            // Получием данные из корзины
            $productsInCart = Cart::getProducts();

            // В корзине есть товары?
            if ($productsInCart == false) {
                // В корзине есть товары? - Нет
                // Отправляем пользователя на главную искать товары
                $this->goHome();
            } else {
                // В корзине есть товары? - Да
                // Итоги: общая стоимость, количество товаров
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $params['totalPrice'] = Cart::getTotalPrice($products);
                $params['totalQuantity'] = Cart::countItems();


                $params['userName'] = false;
                $params['userPhone'] = false;
                $params['userComment'] = false;

                // Пользователь авторизирован?
                if (User::isGuest()) {
                    // Нет
                    // Значения для формы пустые
                } else {
                    // Да, авторизирован
                    // Получаем информацию о пользователе из БД по id
                    $userId = User::checkLogged();
                    $user = new User($userId);
                    // Подставляем в форму
                    $params['userName'] = $user->get('name');
                }
            }
        }


        $params['userName'] = false;
        $params['userPhone'] = false;
        $params['userComment'] = false;
        $params['result'] = $result;
        $params['errors'] = $errors;
        $this->view->make('cart/checkout', $params);

        return true;
    }

    public function actionDelete($id)
    {
        Cart::delete($id);

        $this->redirect('/cart');
    }

    public function actionClear()
    {
        Cart::clear();

        $this->redirect('/cart');
    }

}

