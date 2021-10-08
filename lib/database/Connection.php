<?php

abstract class Connection{

    private static $conn;

    public static function getConn(){

        if(self::$conn==null){
            //self::$conn utilizei self pois $conn é um atributo estático, senão usaria $this
            self::$conn = new PDO('mysql:host=localhost;dbname=teste_emprego','root','');
        }
        return self::$conn;

    }
}