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



if ($_SERVER['REQUEST_METHOD'] == 'post') {

    if (empty($_POST['chap-id'])) {
        header('Location: '. ROUTER_ADDRESS);
    }elseif (empty($_POST['chap-challenge'])) {
        header('Location: '. ROUTER_ADDRESS);
    }elseif (empty($_POST['mac'])){
        header('Location: '. ROUTER_ADDRESS);
    }elseif ($_POST['ip']){
        header('Location: '. ROUTER_ADDRESS);
    }elseif ($_POST['mac']){
        header('Location: '. ROUTER_ADDRESS);
    }else {

        $_SESSION['router'] = $_POST;

        header('Location: login.php');
    }

} else {

    /**
     * If request is not a post request redirect to router public IP address.
     * in our case 192.168.2.1
     */
    return header('Location: '. ROUTER_ADDRESS);

}