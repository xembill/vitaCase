<?php
/**
 * Created by Seçkin Kılınç.
 */

// Core/DB.php

/**
 * DB sınıfı, PDO ile veri tabanı bağlantısını yönetir.
 */
class DB
{
    private static $pdo;

    public static function init()
    {
        self::$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    }

    public static function query($sql, $params = [])
    {
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
