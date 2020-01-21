<?php


namespace App;


class App
{
    public static $file_db;
    public static $session;


    public function __construct()
    {
        session_start();
        self::$file_db = new \Core\FileDB(DB_FILE);
        self::$session = new \Core\Session();
    }
}