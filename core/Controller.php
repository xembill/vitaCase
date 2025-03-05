<?php
/**
 * Created by Seçkin Kılınç.
 */

// Core/Controller.php

/**
 * Controller sınıfı, temel controller fonksiyonlarını içerir.
 */
class Controller
{
    protected function view($path, $data = [])
    {
        return View::render($path, $data);
    }
}
