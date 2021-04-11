<?php
    session_start();

    $notifyModal = "";

    if (isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $key => $value) {
            $notifyModal .= '<div class="modal modal--active">
                                <div class="modal__content">
                                    <div class="notify-modal">
                                        <div class="notify-modal__icon notify-modal__icon--danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <h3 class="notify-modal__title">Error!</h3>
                                        <p class="notify-modal__message">'. $value .'</p>
                                        <span class="button">OK</span>
                                    </div>
                                </div>
                            </div>';
            unset($_SESSION['error'][$key]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- link css -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- link font-awesome -->
    <script src="https://kit.fontawesome.com/15e239e756.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php echo $notifyModal ?>

    <div class="modal">
        <div class="modal__content">
            <form action="process.php" method="post" enctype="multipart/form-data" class="register" id="register"">
                <h3 class="register__title">Register</h3>
                <span class="close-btn"><i class="fas fa-times"></i></span>
                <div class="register__row">
                    <input class="input-data" type="text" name="username" placeholder="Username">
                </div>
                <div class="register__row">
                    <input class="input-data" type="password" name="password" placeholder="Password">
                </div>
                <div class="register__row">
                    <input class="input-data" type="password" placeholder="Confirm password" id="confirm-password">
                </div>
                <div class="register__row flex-end">
                    <input type="hidden" name="formType" value="register">
                    <input class="button register__btn" type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <form action="process.php" method="post" enctype="multipart/form-data" class="login" id="login">
            <h3 class="login__title">Login</h3>
            <div class="login__row">
                <input class="input-data" type="text" name="username" placeholder="Username">
            </div>
            <div class="login__row">
                <input class="input-data" type="password" name="password" placeholder="Password">
            </div>
            <div class="login__row flex-end">
                <input type="hidden" name="formType" value="login">
                <input class="button" type="submit" value="Login">
                <span class="button login__register-btn">Register</span>
            </div>
        </form>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>