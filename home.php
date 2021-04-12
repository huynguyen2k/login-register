<?php
    session_start();

    if (isset($_SESSION["username"]) == false) {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- link css -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <style>
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        h1 {
            font-size: 3.5rem;
            margin-bottom: 16px;
        }
        a {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THIS IS HOME PAGE</h1>
        <a href="logout.php">Đăng xuất</a>
    </div>
</body>
</html>