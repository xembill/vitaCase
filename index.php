<?php
/**
 * Created by Seçkin Kılınç.
 */

// Entry Point (index.php)

/**
 * Uygulamanın başlatıldığı ana dosya.
 */

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
//require_once 'core/DB.php'; // DB sınıfı Veritabanına bağlanmak istiyorsak açabiliriz.
require_once 'core/View.php';
require_once 'core/Template.php';
require_once 'core/Middleware.php';
require_once 'controllers/UserController.php';
require_once 'middlewares/AuthMiddleware.php';
require_once 'routes.php'; // Rotalar dosyası
require_once 'tests/RouteTest.php'; // Test dosyası

session_start();
//DB::init(); // DB bağlantısı.  Veritabanına bağlanmak istiyorsak açabiliriz.

$app = new App();
$app->run();

// Testi çalıştır
//RouteTest::run(); // Route testi: istersek kapatabiliriz.