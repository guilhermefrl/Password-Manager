<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/conn/conn.php";
    $sql = "INSERT INTO users (email, password, salt) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: /Password-Manager/register/register.php?error=error");
        exit();
    }

    $email = "Guilherme@fre.c";
    $salt = openssl_random_pseudo_bytes(16);
    $param_salt = bin2hex($salt);
    $auth_key = "fewfre";


    mysqli_stmt_bind_param($stmt, "sss", $email, $auth_key, $param_salt);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);