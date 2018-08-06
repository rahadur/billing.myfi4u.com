<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/10/2018
 * Time: 2:14 PM
 */

define('GW_HOST', 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php ');

define('IPN_LISTENER', 'http://myfi4u.com/billing/ipn_listener.php');


$data = [
    'store_id' => 'myfi45b150addd31a2',
    'store_passwd' => 'myfi45b150addd31a2@ssl',
    'total_amount' => 10.00,
    'currency' => 'BDT',
    'tran_id' => date('YmdHis'),
    'success_url' => 'http://myfi4u.com/billing/success.php',
    'fail_url' => 'http://myfi4u.com/billing/fail.php',
    'cancel_url' => 'http://myfi4u.com/billing/cancel.php',
    'emi_option' => 0,
    'cus_name' => 'Rahadur Rahman',
    'cus_email' => 'get.rahadur@gmail.com',
    'cus_phone' => '01777414009',


];


$ch = curl_init(GW_HOST);
//curl_setopt($ch, CURLOPT_URL, GW_HOST);
//curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

var_dump($response);
exit();

$json = json_decode($response, JSON_OBJECT_AS_ARRAY);



header('Location: '. $json['redirectGatewayURL']);

curl_close($ch);



?>