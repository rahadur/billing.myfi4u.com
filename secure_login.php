<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 8/13/2018
 * Time: 4:31 PM
 */
session_start();
date_default_timezone_set('Asia/Dhaka');

define('ROUTER_ADDRESS', 'http://192.168.2.1');

require 'database.php';


$email    = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);


$query = "SELECT * FROM `users` WHERE `email` = ? LIMIT 1";

$stmt = mysqli_prepare($link, $query);

// check statement error
if (!$stmt) {
    // printf('Statement Error: %s', mysqli_error($link));
    die(mysqli_error($link));
}


mysqli_stmt_bind_param($stmt,'s', $email);
mysqli_stmt_execute($stmt);

if (!$result = mysqli_stmt_get_result($stmt)){

    $_SESSION['error'] = 'Invalid Email and Password';
    header('Location: login.php');
}


$user = mysqli_fetch_assoc($result);


// Valid password

var_dump(password_verify($password, $user['password']));

