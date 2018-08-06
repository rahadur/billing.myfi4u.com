<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/5/2018
 * Time: 7:20 PM
 */
session_start();
date_default_timezone_set('Asia/Dhaka');

require 'database.php';


if (isset($_SESSION['router']) && !is_null($_SESSION['router'])){

    $router = $_SESSION['router'];

    $mac        = $router['mac'];
    $ip         = $router['ip'];
    $username   = $router['username'];
    $linklogin  = $router['link-login'];
    $linkorig   = $router['link-orig'];
    $error      = $router['error'];
    $chapid     = $router['chap-id'];
    $chapchallenge = $router['chap-challenge'];
    $linkloginonly = $router['link-login-only'];
    $linkorigesc   = $router['link-orig-esc'];
    $macesc        = $router['mac-esc'];

} else {

    // TODO redirect to index.php
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php include 'shared/header.php' ?>
</head>
<body>
<div class="container">

    <div class="row h-100">
        <div class="col-sm-12 col-md-6 offset-md-3 my-auto">
            <div class="card card-block mx-auto">

                <!-- Card body -->

                <div class="card-body">

                    <div class="text-center mt-4">
                        <img src="assets/img/logo.png" class="img-responsive" alt="MYFI">
                    </div>

                    <div class="title">

                        <p class="text-center text-muted">Please Login with your MYFI ID</p>
                    </div>

                    <form class="" action="" method="post">

                        <div class="form-group">
                            <label for="email" class="text-muted">Email</label>
                            <input type="email" name="email" value="" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="password" class="text-muted">Password</label>
                            <input type="password" name="password" value="" class="form-control">
                            <a href="#"><small class="form-text">Forgot password!</small></a>
                        </div>


                        <button type="submit" class="btn-block btn btn-light my-4">Login</button>

                    </form>

                    <p class="text-center text-muted mt-3">Not member yet! <a href="signup.php">Sign Up</a> Now </p>

                </div>

                <!-- / end card body -->

            </div>
        </div>
    </div>


</div>
</body>
</html>
