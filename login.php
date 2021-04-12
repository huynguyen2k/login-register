<?php
    session_start();

    if (isset($_SESSION["username"])) {
        header("location: home.php");
    }

    $notifyModal = "";

    if (isset($_SESSION["notify"])) {
        foreach ($_SESSION["notify"] as $key => $value) {
            if ($key == "error") {
                $notifyModal .= '<div class="modal modal--active" id="notify-modal">
                                    <div class="modal__content">
                                        <div class="notify-modal">
                                            <div class="notify-modal__icon notify-modal__icon--danger">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-triangle" class="svg-inline--fa fa-exclamation-triangle fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                            </div>
                                            <h3 class="notify-modal__title">Error!</h3>
                                            <p class="notify-modal__message">'. $value .'</p>
                                            <span class="button">OK</span>
                                        </div>
                                    </div>
                                </div>';
            }
            if ($key == "success") {
                $notifyModal .= '<div class="modal modal--active" id="notify-modal">
                                    <div class="modal__content">
                                        <div class="notify-modal">
                                            <div class="notify-modal__icon notify-modal__icon--success">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
                                            </div>
                                            <h3 class="notify-modal__title">Success!</h3>
                                            <p class="notify-modal__message">'. $value .'</p>
                                            <span class="button">OK</span>
                                        </div>
                                    </div>
                                </div>';
            }
            unset($_SESSION["notify"][$key]);
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

</head>
<body>
    
    <?php echo $notifyModal ?>

    <div class="modal" id="register-modal">
        <div class="modal__content">
            <form action="process.php" method="post" enctype="multipart/form-data" class="register" id="register">
                <h3 class="register__title">Register</h3>
                <span class="close-btn">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </span>
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