<?php
/**
 * Created by Seçkin Kılınç.
 */

// Tests/RouteTest.php

/**
 * Route sisteminin doğru çalıştığını test eden birim test dosyası.
 */
class RouteTest
{
    public static function run()
    {
        $_SERVER['REQUEST_URI'] = '/getir/4';
        ob_start();
        (new App())->run();
        $output = ob_get_clean();

        if (strpos($output, 'User ID: 4') !== false) {
            echo "Test Passed: /getir/4 route çalışıyor.\n";
        } else {
            echo "Test Failed: /getir/4 route çalışmıyor.\n";
        }
    }
}
