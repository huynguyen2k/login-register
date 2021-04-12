<?php
    session_start();
    $loginSuccess = false;

    $con = new mysqli("localhost", "root", "", "test");
    if ($con->connect_error) {
        die("Connection Failed" . $con->connect_error);
    }
    $con->set_charset("utf8");

    if (isset($_POST) && $_POST['formType'] == 'register') {
        $maxID = $con->query("SELECT IFNULL(MAX(`id`), '0') AS `id` FROM `user`");
        $maxID = $maxID->fetch_assoc()['id'];
        $id = $maxID + 1;

        $query = "INSERT INTO `user` VALUES(?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("iss", $id, $_POST['username'], $_POST['password']);

        if ($stmt->execute()) {
            $_SESSION["notify"]["success"] = "You have successfully signed up";
        } else {
            $_SESSION["notify"]["error"] = "Username already exists please enter an other username!";
        }

        $stmt->close();
    }

    if (isset($_POST) && $_POST['formType'] == 'login') {
        $query = "SELECT * FROM `user` WHERE `username` = ? AND `password` = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            $_SESSION["username"] = $result->fetch_assoc()["username"];
            $loginSuccess = true;
        } else {
            $_SESSION["notify"]["error"] = "Your username or password is not valid please enter again!";
        }

        $stmt->close();
    }

    $con->close();

    if ($loginSuccess) {
        header("location: home.php");
    } else {
        header("location: login.php");
    }
?>