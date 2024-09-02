<?php

// Database connection PDO
function db_connect(): PDO
{
    $db = new PDO('mysql:host=localhost:3306;dbname=meyko;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}