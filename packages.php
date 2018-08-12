<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/7/2018
 * Time: 1:36 PM
 */

session_start();

include 'database.php';


$query    = "SELECT * FROM `packages`";
$result   = mysqli_query($link, $query);
//$packages = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user       = $_SESSION['user'];
    $package_id = $_POST['package'];
    $user_id    = $user['id'];

    $query = "UPDATE `users` SET `package_id` = $package_id WHERE id = $user_id";

    if (mysqli_query($link, $query)){

        header('Location: confirmation.php');
    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Packages | MYFI</title>
    <?php include 'shared/header.php' ?>
</head>
<body>

<div class="container">

    <div class="row justify-content-md-center">
        <div class="col col-12">
            <div class="text-center mt-4">
                <img src="assets/img/logo.png" class="img-responsive" alt="MYFI">
            </div>
            <h2 class="text-center mt-3">Internet Package</h2>
        </div>
    </div>


    <div class="row mt-5">
        <?php while ($package = mysqli_fetch_assoc($result)): ?>
        <div class="col-sm-12 col-md-3 my-2">


            <div class="card card-block mx-auto">

                <!-- Card body -->
                <div class="card-body">

                    <h3 class="text-center mt-3"><?= $package['name'] ?></h3>
                    <hr>
                    <h4 class="text-center text-success">
                        <strong>৳<?= $package['price'] ?></strong></h4>
                    <p class="text-center">
                        <strong> <?= $package['data_limit'] ?> </strong>
                    </p>
                    <p class="text-center"><strong><?= $package['speed'] ?></strong></p>
                    <p class="text-center"><strong><?= $package['validity'] ?></strong></strong></p>


                    <form name="<?= $package['name'] ?>" action="payment/checkout.php" method="post">

                        <input type="hidden" name="package_name" value="<?= $package['name'] ?>">
                        <input type="hidden" name="package_id" value="<?= $package['id'] ?>">

                        <button type="submit" value="submit" class="btn btn-block btn-primary my-4">Select</button>

                    </form>

                </div>

                <!-- / end card body -->
            </div>

        </div>
        <?php endwhile; ?>
    </div>



</div>


</body>
</html>

