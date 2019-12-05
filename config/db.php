<?php

define('BD_SERVIDOR', 'localhost');
define('BD_USUARIO', 'root');
define('BD_SENHA', 'root');
define('BD_BANCO', 'treinamento');

class Database
{
    public function __construct()
    {
        die('Init function is not allowed');
    }

    private static $conexao = null;

    public static function connect()
    {
        if (null == self::$conexao) {
            try {
                self::$conexao = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
                self::$conexao->set_charset("utf8");
            } catch (mysqli_error $e) {
                die($e->getMessage());
            }
        }

        return self::$conexao;
    }

    public static function disconnect()
    {
        self::$conexao = null;
    }
}
