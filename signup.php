<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/5/2018
 * Time: 7:31 PM
 */
session_start();

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

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup - MYFI4U</title>
    <?php include 'shared/header.php' ?>
</head>
<body>

<div class="container">

    <div class="row h-100">
        <div class="col-sm-12 col-md-6 offset-md-3 my-auto">
            <div class="card card-block mx-auto">

                <!-- Card body -->

                <div class="card-body">

                    <div class="text-center mt-2">
                        <img src="assets/img/logo.png" class="img-responsive" alt="MYFI">
                    </div>

                    <div class="title">

                        <h3 class="text-center text-muted">Create Your MYFI ID</h3>
                    </div>

                    <form action="register.php" method="post">

                        <div class="form-group">
                            <label for="name" class="text-muted">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>


                        <!-- <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                              <label for="username" class="text-muted">Username</label>
                              <input type="text" name="username" value="" class="form-control">
                            </div>
                          </div>

                          <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                              <label for="email" class="text-muted">Email</label>
                              <input type="text" name="email" value="" class="form-control">
                            </div>
                          </div>

                        </div> -->

                        <div class="form-group">
                            <label for="email" class="text-muted">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="password" class="text-muted">Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>


                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="text-muted">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="dob" class="text-muted">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="address" class="text-muted">Address</label>
                            <textarea name="address" rows="2" class="form-control"></textarea>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="condition" id="condition">
                            <label class="form-check-label" for="condition">
                                I agree to the <a href="#">trams of services.</a>
                            </label>
                        </div>


                        <button type="submit" class="btn-block btn btn-primary my-4" name="submit" value="submit">Signup</button>

                    </form>

                    <p class="text-center text-muted mt-3">Already a member <a href="login.php">Login</a> Now </p>

                </div>

                <!-- / end card body -->


            </div>
        </div>
    </div>



</div>


</body>
</html>
