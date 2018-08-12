<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/5/2018
 * Time: 6:16 PM
 */

session_start();
date_default_timezone_set('Asia/Dhaka');

define('ROUTER_ADDRESS', 'http://192.168.2.1');

require 'database.php';



var_dump($_POST);