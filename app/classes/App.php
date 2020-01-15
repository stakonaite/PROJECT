<?php


namespace App;


class App
{
    public static $file_db;

    public function __construct()
    {
        self::$file_db = new \Core\FileDB(DB_FILE);
    }
}