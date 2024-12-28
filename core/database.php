<?php

namespace App\core;
use PDOException;

class DB
{
    private static $pdo;
    private static function connect()
    {
        $string = DB_CONNECTION . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
        self::$pdo = new \PDO($string, DB_USER, DB_PASS);
    }
    public static function query($query, $data = [],$returnID=false) {
        self::connect(); // Ensure a connection is established
    
        try {
            $stmt = self::$pdo->prepare($query); // Prepare the statement
    
            // Bind parameters if any
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    // Check if the key is an integer (to bind as a param)
                    $paramType = is_int($value) ? self::$pdo::PARAM_INT : self::$pdo::PARAM_STR;
                    $stmt->bindValue($key, $value, $paramType);
                }
            }
    
            $stmt->execute(); // Execute the prepared statement

            if($returnID){
                $lastId = self::$pdo->lastInsertId();
                return $lastId;//ReturnID
            }

            return $stmt; // Return the statement for fetching results
        } catch (PDOException $e) {
            // Handle any errors
            echo "Database error: " . $e->getMessage();
            return false; // Return false on error
        } finally {
            self::$pdo = null; // Close the connection
        }
    }
    public static function close() {
        self::$pdo = null; // Fermer la connexion
    }
}
