<?php

class User extends Model
{
    protected $tableName = 'users';

    public function register()
    {
        $this->insert();
    }

    public static function chekEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;

    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sqlpass = 'SELECT password FROM users WHERE email = :email';

        $passresult = $db->prepare($sqlpass);

        $passresult->bindParam(':email', $email, PDO::PARAM_STR);

        $passresult->execute();

        $hash = $passresult->fetch();

        $hash = $hash['password'];

        if (password_verify($password, $hash)) {

            $sql = 'SELECT * FROM users WHERE email = :email';
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_INT);
            $result->execute();
            $user = $result->fetch();
            if ($user) {
                return $user['id'];
            }

            return false;
        }

    }

    public static function auth($userId)
    {

        $_SESSION['user'] = $userId;

    }

    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return false;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


}