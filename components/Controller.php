<?php

/**
 * Class Controller
 */
class Controller
{
    protected $view = null;

    function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
        return true;
    }

    /**
     *
     * @param string $url
     */
    public function redirect($url)
    {
        header('location:' . $url);
    }

    public function goBack()
    {
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }

    public function goHome()
    {
        header('Location:/');
        return true;
    }

    public function error404()
    {
        header("location:/404.php");
        exit;
    }


}