<?php
namespace src\lib;

use Exception;
use PDO;
use PDOException;

abstract class Database {

    protected static ?PDO $connection = null;

    public static function get() {

        if (!self::$connection) {
			try {

				self::$connection = self::createConnection();

			} catch (PDOException $e) {

				throw new Exception('Database ERROR');
                
			}
		}

		return self::$connection;
    }

    protected static function createConnection() {

        try {

            $database = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            echo "Erreur de connexion : " /*. $e->getMessage()*/;

        }

        return $database;

    }

}