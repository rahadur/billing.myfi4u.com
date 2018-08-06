<?php
/**
 * Created by PhpStorm.
 * User: Rahadur
 * Date: 6/7/2018
 * Time: 4:07 PM
 */

session_start();

$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | MYFI</title>
    <?php include 'shared/header.php' ?>
</head>
<body>

<div class="container">

    <div class="row h-100">
        <div class="col-sm-12 col-md-6 offset-md-3 my-auto">
            <div class="card card-block mx-auto">

                <!-- Card body -->

                <div class="card-body mb-5">

                    <div class="text-center mt-4">
                        <img src="img/logo.png" class="img-responsive" alt="">
                    </div>

                    <div class="title">
                        <h2 class="text-center text-muted">Congratulation</h2>
                        <h5 class="text-center mt-4"><?= $user['name'] ?></h5>
                        <p class="text-center text-muted my-4">Your <span class="text-primary">MYFI ID</span> successfully created.</p>

                        <p class="text-center text-muted">Here is your login credential:</p>
                    </div>

                    <form class="row justify-content-center">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user['email']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user['password']?>">
                            </div>
                        </div>
                    </form>

                </div>

                <!-- / end card body -->


                <div class="card-footer bg-transparent">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                            <a href="login.php"><i class="far fa-share-square fa-sm"></i> Login in now</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



</div>


</body>
</html>

