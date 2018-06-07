<?php

class Utils
{
    function __construct(Pagination $paginator, $govo)
    {
        var_dump($paginator->get());
    }

    public static function chekName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function chekPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function chekEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    public static function test()
    {
        echo 'оно робит вроде';
    }
}