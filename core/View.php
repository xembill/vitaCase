<?php
/**
 * Created by Seçkin Kılınç.
 */

// Core/View.php

/**
 * View sınıfı, belirli bir template dosyasını yükler ve değişkenleri işler.
 */
class View
{
    public static function render($path, $data = [])
    {
        extract($data); // Değişkenleri sayfa içinde kullanmak için çıkar
        ob_start();
        require "views/{$path}.php";
        return ob_get_clean(); // Çıktıyı tampondan çek
    }
}
