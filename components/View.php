<?php

/**
 * Class View
 */
class View
{
    /**
     * Формирует отображение с заданными параметрами
     * @param string $viewName
     * @param array $params
     * @param string $layout
     */
    public function make($viewName = 'site/index', array $params = [], $layout = null)
    {
        //Создаем объект вида, что бы загрузить что-нибудь еще если необходимо
        $view = new View();

        //Импортируем переменные из массива в текущую таблицу символов.
        if ($params) {
            extract($params);
        }

        //Если не указан шаблон, то устанавливаем стандартный
        if ($layout === NULL) {
            $layout = 'site_layout';
        }
        //Загружаем шаблон если нужно
        if ($layout != false) {
            //Формируем путь к шаблону
            require_once(ROOT . '/views/layouts/' . $layout . '.php');

        } else {
            //формируем путь к отображению
            require_once(ROOT . '/views/' . $viewName . '.php');

        }

    }


}