<?php

class Order extends Model
{
    protected $tableName = 'product_order';

    public static function cartSave($userName, $userPhone, $userComment, $userId, $productsInCart)
    {
        $order = new Order([
            'user_name' => 0,
            'user_phone' => 0,
            'user_comment' => 0,
            'user_id' => 0,
            'products' => 0,
        ]);
        $order->set('user_name', $userName);
        $order->set('user_phone', $userPhone);
        $order->set('user_comment', $userComment);
        $order->set('products', $productsInCart);
        if ($userId) {
            $order->set('user_id', $userId);
        }
        $order->insert();
        return $order->getLastId();
    }

    public static function linksSave($id_order, $id_product, $counts)
    {
        $order = new Order([
            'id_order' => 0,
            'id_product' => 0,
            'count' => 0,
        ]);
        $order->tableName = 'order_details';
        $order->set('id_order', $id_order);
        $order->set('id_product', $id_product);
        $order->set('count', $counts);

        $order->insert();
        $order->tableName = 'product_order';
    }

    public static function getOrdersList()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    public static function getOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();
    }

    public static function deleteOrderById($id)
    {
        $order = New Order($id);

        $order->delete($id);
    }

    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        $order = new Order($id);

        $order->set('user_name', $userName);
        $order->set('user_Phone', $userPhone);
        $order->set('user_Comment', $userComment);
        $order->set('date', $date);
        $order->set('status', $status);
        $order->save();
    }

}