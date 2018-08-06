<?php

session_start();

define('GW_SANDBOX_HOST', 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php ');

define('IPN_LISTENER', 'http://myfi4u.com/payment/ipn_listener.php');

define('STORE_ID', 'myfi45b150addd31a2');

define('STORE_PASSWORD', 'myfi45b150addd31a2@ssl');



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user']) && isset($_SESSION['package'])){


    $user    = $_SESSION['user'];
    $package = $_SESSION['package'];


    $data = [
        'store_id'     => STORE_ID,
        'store_passwd' => STORE_PASSWORD,
        'total_amount' => $package['price'],
        'currency'     => 'BDT',
        'tran_id'      => date('YmdHis'),
        'success_url'  => 'http://myfi4u.com/billing/success.php',
        'fail_url'     => 'http://myfi4u.com/billing/fail.php',
        'cancel_url'   => 'http://myfi4u.com/billing/cancel.php',
        'emi_option'   => 0,
        'cus_name'     => $user['name'],
        'cus_email'    => $user['email'],
        'cus_phone'    => $user['phone'],
        'cus_add1'     => $user['address']
    ];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, GW_SANDBOX_HOST);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);



    $json = json_decode($response);


    header('Location: '. $json['redirectGatewayURL']);

    curl_close($ch);


}
else{

    header('Location: /login.php');
}




