<?php
class Repository
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=minimo;charset=utf8', 'admin', 'admin');
        
        return $db;
    }
}
