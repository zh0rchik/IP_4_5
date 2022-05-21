<?php

class DB {
    protected static $_instance;

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self; // экземпляр текущего класса
        }

        return self::$_instance;
    }

    private  function __construct() {
        $this->connect = mysqli_connect("localhost", "root", "") or die("Невозможно установить соединение".mysqli_error($this->connect));
        mysqli_select_db($this->connect, "test") or die ("Невозможно выбрать указанную базу".mysqli_error($this->connect));
        $this->query('SET names "utf8"');
    }

    private function __clone() {
        //запрещаем клонирование объекта модификатором private
    }

    public static function query($sql) {
        $obj = self::$_instance;

        if (isset($obj->connect)){           //isset - наличие переменной
            $result = mysqli_query($obj->connect, $sql) or die("<br/><span style='color:red'>Ошибка в SQL запросе:</span> ".$obj->connect->error);
            return $result;
        }

        return false;
    }

    // возвращает запись в виде объекта
    public static function fetch_object($object) {
        return @mysqli_fetch_object($object);
    }

    // возвращает запись в виде массива
    public static function fetch_array($object) {
        return @mysqli_fetch_array($object);
    }

}