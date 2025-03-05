<?php
/**
 * Created by Seçkin Kılınç.
 */

// Controllers/UserController.php

/**
 * Kullanıcı işlemlerini yöneten Controller.
 */
class UserController extends Controller
{
    public function show($id)
    {
        echo View::render('user', ['user_id' => $id]);
    }

    public function getir($id)
    {
        return 'User ID: ' . $id;
    }

    public function dbconnect($id)
    {
        $user = DB::query("SELECT * FROM users WHERE id = ?", [$id]); // DB üzerinden veri çekme
        return $user ? $user[0] : ['error' => 'Kullanıcı Bulunamadı']; // JSON olarak dönecek
    }

}