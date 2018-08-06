<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/5/2018
 * Time: 7:38 PM
 */
require('database.php');

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//    $router = $_SESSION['router'];
//
//    $mac        = $router['mac'];
//    $ip         = $router['ip'];
//    $username   = $router['username'];
//    $linklogin  = $router['link-login'];
//    $linkorig   = $router['link-orig'];
//    $error      = $router['error'];
//    $chapid     = $router['chap-id'];
//    $chapchallenge = $router['chap-challenge'];
//    $linkloginonly = $router['link-login-only'];
//    $linkorigesc   = $router['link-orig-esc'];
//    $macesc        = $router['mac-esc'];

    /**
     * Retriever user POST data
     */


    $name     = mysqli_real_escape_string($link, $_POST['name']);
    $email    = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $phone    = mysqli_real_escape_string($link, $_POST['phone']);
    $dob      = mysqli_real_escape_string($link, $_POST['dob']);
    $address  = mysqli_real_escape_string($link, $_POST['address']);


    $created_at  = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    $expired_at  = date("Y-m-d H:i:s", strtotime('+30 days'));


    $errors = array();


    $fields = ['name', 'email', 'password', 'phone', 'dob', 'address'];

    foreach ($fields as $key) {
        if (empty($_POST[$key]) || is_null($_POST[$key]) || !isset($_POST[$key])) {
            $errors[$key] = ucfirst($key). ' field is required!';
        }
    }


    if (count($errors) > 0){

        $_SESSION['errors'] = $errors;

        header('Location: error.php');

    }else {


        $query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `dob`, `address`, `expired_at`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);

        // check statement error
        if (!$stmt) {
            // printf('Statement Error: %s', mysqli_error($link));
            die(mysqli_error($link));
            exit();
        }

        mysqli_stmt_bind_param($stmt, 'sssssssss', $name, $email, $password, $phone, $dob, $address, $expired_at, $created_at, $updated_at);
        mysqli_stmt_execute($stmt);

        $user_id = mysqli_insert_id($link);


        if ($result = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = $user_id")) {

            $user = mysqli_fetch_assoc($result);

            $_SESSION['user'] = $user;

            header('Location: packages.php');

        }else {

            header('Location: signup.php');

        }

    }

} else {
    header('Location: signup.php');
}



function check_email($link, $email) {

    $query = "SELECT `email` FROM `users` WHERE `email` = ?";

    $stmt = mysqli_prepare($link, $query);

    mysqli_stmt_bind_param($stmt, 's', $email);

    mysqli_stmt_execute($stmt);

    //$result = mysqli_stmt_get_result($stmt);

    var_dump(mysqli_stmt_get_result($stmt));
    exit();



    $user = mysqli_fetch_assoc($result);



    if (!is_null($user) && isset($user)){
        return true;
    }

    return false;

}

function check_phone($link, $phone) {

    $query = "SELECT `phone` FROM `users` WHERE `phone` = ?";
    $stmt = mysqli_prepare($link, $query);

    mysqli_stmt_bind_param($stmt, 's', $phone);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $user = mysqli_fetch_assoc($result);


    if (!is_null($user) && isset($user) ) {
        return true;
    }

    return false;
}