<?php
/**
 * Created by Seçkin Kılınç.
 */

// Core/App.php

/**
 * Uygulamanın ana giriş noktası. Route sistemini başlatır ve çalıştırır.
 */
class App
{
    protected $route;

    public function __construct()
    {
        $this->route = new Route();
    }

    public function run()
    {
        require_once 'routes.php'; // Route tanımlamalarını yükler.
        $this->route->dispatch(); // URL'yi işler ve ilgili controller'ı çalıştırır.
    }
}