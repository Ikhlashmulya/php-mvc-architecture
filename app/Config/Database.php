<?php

namespace Ikhlashmulya\Phpweb\Config;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function getInstance(): PDO
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO('mysql:host=localhost:3306;dbname=phpweb', 'root', '');
        }
        return self::$pdo;
    }
}
