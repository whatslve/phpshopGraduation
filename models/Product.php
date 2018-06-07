<?php

class Product extends Model
{
    protected $tableName = 'product';
    const SHOW_BY_DEFAULT = 9;

    public static function getLatestProudcts($count = self::SHOW_BY_DEFAULT)
    {//Метод выборки из базы данных
        $count = intval($count);

        $db = Db::getConnection();//Получаем подключение к базе данных

        $productsList = [];
        $sql = "SELECT `id`,`name`,`price`,`image`,`is_new`,`description` FROM `product` WHERE `status` = '1' ORDER BY `id` DESC LIMIT " . $count;
        $result = $db->query($sql);//Выполнение запроса
        $products = $result->fetchAll();
        return $products;
    }

    public static function getRecommendedProudcts()
    {//Метод выборки из базы данных


        $db = Db::getConnection();//Получаем подключение к базе данных

        $productsList = [];
        $sql = "SELECT `id` FROM `product` WHERE `status` = '1' AND is_recomended = '1' ORDER BY `id` DESC";
        $result = $db->query($sql);//Выполнение запроса
        $products = $result->fetchAll();
        return $products;
    }

    public static function getProductListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();
            $sql = "SELECT `id`,`name`,`price`,`image`,`is_new`,`description` FROM `product` WHERE `category_id` = '" . $categoryId . "' ORDER BY `id` DESC LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET " . $offset;
            $result = $db->query($sql);
            return $products = $result->fetchAll();
        }

    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(id) AS count FROM `product` WHERE status='1' AND `category_id`='" . $categoryId . "'";
        $result = $db->query($sql);
        $totalProducts = $result->fetch();
        return $totalProducts['count'];

    }

    public static function getTotalProducts()
    {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(id) AS count FROM `product` WHERE status='1'";
        $result = $db->query($sql);
        $totalProducts = $result->fetch();
        return $totalProducts['count'];

    }

    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getProductById($id)
    {
        $db = Db::getConnection();//Получаем подключение к базе данных


        $sql = "SELECT `id`, `name`,`price`,`description`,`code` FROM product WHERE status = 1 AND id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();
    }

    public static function getProductsList($page = null)
    {
        if ($page !== null) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();
            $sql = "SELECT `id`,`name`,`price`,`image`,`is_new`,`description` FROM `product` WHERE status='1' ORDER BY `id` DESC LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET " . $offset;
            $result = $db->query($sql);
            return $products = $result->fetchAll();
        } else {
            $db = Db::getConnection();
            $sql = "SELECT `id`, `name`, `price`, `code` FROM `product` ORDER BY `id` ASC";

            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result;
        }
    }

    public static function deleteProductById($id)
    {
        $productById = new Product($id);
        $productById->delete();
    }

    public static function createProduct($options)
    {
        $productCreate = new Product($options);
        $productCreate->insert();
        if ($productCreate) {
            return $productCreate->getLastId();
        }
        return 0;
    }

    public static function updateProductById($id, $options)
    {
        $product = new Product($id);
        $product->set('name', $options['name']);
        $product->set('code', $options['code']);
        $product->set('price', $options['price']);
        $product->set('category_id', $options['category_id']);
        $product->set('brand', $options['brand']);
        $product->set('available', $options['available']);
        $product->set('description', $options['description']);
        $product->set('is_new', $options['is_new']);
        $product->set('is_recomended', $options['is_recomended']);
        $product->set('status', $options['status']);
        $product->save();
        return true;


    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.png';
        // Путь к папке с товарами
        $path = '/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.png';
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}