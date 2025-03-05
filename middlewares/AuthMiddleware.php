<?php
/**
 * Created by Seçkin Kılınç.
 */

// Middleware/AuthMiddleware.php

/**
 * Kimlik doğrulama işlemlerini yöneten middleware.
 */
class AuthMiddleware extends Middleware
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            die('Unauthorized');
        }
    }
}
