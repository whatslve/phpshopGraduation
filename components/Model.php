<?php

class Model
{

    protected $data = null;

    protected $dataChange = null;

    protected $tableName = null;

    protected $isLoaded = false;

    protected $db = false;

    //В конструкторе проверяем тип выборки

    /**
     * Model constructor.
     * @param $data
     */
    public function __construct($data)
    {
        if (is_numeric($data)) {
            $db = Db::getConnection();
            $sql = "SELECT * FROM `" . $this->tableName . "` WHERE `id`=:id";
            $prepare = $db->prepare($sql);
            $values = ['id' => $data];
            $prepare->execute($values);
            $this->data = $prepare->fetch();
            if ($this->data) {//выставим что загружено только если есть результат из БД
                $this->isLoaded = true;
            }
        }
        if (is_array($data)) {
            $this->data = $data;
            $this->isLoaded = true;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @param $val
     * @return $this
     */
    public function set($name, $val)
    {
        $this->data[$name] = $val;
        $this->dataChange[$name] = $val;
        return $this;
    }

    /**
     * Метод вставки
     */
    public function save()
    {
        $db = Db::getConnection();
        $total = count($this->dataChange);
        $counter = 0;
        if (is_array($this->dataChange) && count($this->dataChange) > 0) {
            $sql = "UPDATE `" . $this->tableName . "` SET ";

            foreach ($this->dataChange as $key => $val) {

                $counter++;
                if ($counter != $total) {
                    $sql .= $key . " = " . "'" . $val . "',";
                } else {
                    $sql .= $key . " = " . "'" . $val . "'";
                }
            }
            $sql .= " WHERE `id`='" . $this->data['id'] . "'";
            $prepare = $db->prepare($sql);
            $prepare->execute();
        }
    }

    /**
     * Метод вставки
     * @return bool
     */
    public function insert()
    {

        $this->db = Db::getConnection();

        $db = $this->db;

        $total = count($this->data);

        $counter = 0;

        foreach ($this->data as $key => $val) {
            if (is_array($val)) {
                $val = json_encode($val);
                $this->set($key, $val);
            }
        }

        if ($this->data) {
            $sql = "INSERT INTO `" . $this->tableName . "` (";
            foreach ($this->data as $key => $val) {
                $counter++;
                if ($counter != $total) {
                    $sql .= $key . ",";
                } else {
                    $sql .= $key;
                }
            }


            $sql .= ") VALUES (";
            $counter = 0;
            foreach ($this->data as $key => $val) {
                $counter++;
                if ($counter != $total) {
                    $sql .= ":" . $key . ",";
                } else {
                    $sql .= ":" . $key;
                }
            }

            $sql .= ")";
            $result = $db->prepare($sql);

            foreach ($this->data as $key => $val) {
                $result->bindValue('' . $key, $val, PDO::PARAM_STR);
            }


            return $result->execute();
        }
    }

    public function getLastId()
    {
        $db = $this->db;
        return $db->lastInsertId();
    }

    /**
     * Метод удаления
     */
    public function delete()
    {
        //запрос на удаление из базы по id
        $db = Db::getConnection();
        $sql = "DELETE FROM `" . $this->tableName . "` WHERE `id`=:id";
        $prepare = $db->prepare($sql);
        $values = ['id' => $this->data['id']];
        $prepare->execute($values);
    }

    /**
     * Проверяет загрузился объет или нет
     */
    public function isLoaded()
    {
        return $this->isLoaded;
    }
}





