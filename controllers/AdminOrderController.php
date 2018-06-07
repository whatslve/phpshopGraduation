<?php

class AdminOrderController
{
    public function actionIndex()
    {
        $ordersList = Order::getOrdersList();
        // Подключаем вид
        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);
            // Перенаправляем пользователя на страницу управлениями заказами
            $this->redirect('/admin/order/view/' . $id);
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

    public function actionView($id)
    {

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);
        // Подключаем вид
        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    }

    public function actionDelete($id)
    {

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            Order::deleteOrderById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            $this->redirect('/admin/order');
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }
}