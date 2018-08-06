<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/7/2018
 * Time: 1:36 PM
 */

session_start();

include '../database.php';

$package_id = $_POST['package_id'];
$query      = "SELECT * FROM `packages` WHERE `id` = $package_id";
$result     = mysqli_query($link, $query);
$package    = mysqli_fetch_assoc($result);

$_SESSION['package'] = $package;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Packages | MYFI</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/icon/css/fontawesome-all.css">
</head>
<body>

<div class="container">

    <div class="row h-100">
        <div class="col-sm-12 col-md-6 offset-md-3 my-auto">
            <div class="card card-block mx-auto">

                <!-- Card body -->
                <div class="card-body">

                    <div class="text-center mt-2">
                        <img src="/assets/img/logo.png" class="img-responsive" alt="MYFI">
                    </div>

                    <div class="title">
                        <h3 class="text-center text-muted">Invoice</h3>
                    </div>


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Package</th>
                            <th scope="col">Validity</th>
                            <th scope="col">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $package['name'] ?></td>
                            <td><?= date('Y-M-d', strtotime($package['validity'])) ?></td>
                            <td>৳<?= $package['price'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                            <td class="text-success"><strong>৳<?= $package['price'] ?></strong></td>
                        </tr>
                        </tbody>
                    </table>


                    <form action="payment.php" method="post">
                        <button class="btn btn-primary" type="submit">Checkout</button>
                        <button class="btn btn-danger">Cancel</button>
                    </form>


                </div>
            </div>
        </div>
    </div>




</div>


</body>
</html>

