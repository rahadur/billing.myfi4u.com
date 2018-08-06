<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/5/2018
 * Time: 6:16 PM
 */

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_DATABASE = 'myfi';


$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);


if (!$link) {
    printf('Failed to stabilise database connection. Error: %s ', mysqli_error($link));
    exit();
}