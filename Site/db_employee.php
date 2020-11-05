<?php
// Подключаем библиотеку RedBeanPHP
require "libs/rb-mysql.php";

// Подключаемся к БД
R::setup( 'mysql:host=localhost; dbname=enterprise_products',
        'root', '' );

// Проверка подключения к БД
if(!R::testConnection()) die('No DB connection!');
session_start();
?>
