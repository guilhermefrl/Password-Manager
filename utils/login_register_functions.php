<?php

    function emailExists($conn, $email){
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: /Password-Manager/register/register.php?error=error");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultSQL = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultSQL)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function passwordMatch($password, $password_confirmation){
        if ($password !== $password_confirmation){
            $result = true;
        }
        else{
            $result = false;
        }

        return $result;
    }

    function passwordStrength($email, $password){
        // Mininum 12 characters
        // At least 1 number
        // At least 1 lowercase letter
        // At least 1 uppercase letter
        // Not equal to the email

        if (strlen($password) < 12){
            return true;
            exit();
        }

        if ($email === $password){
            return true;
            exit();
        }

        return false; 
    }

    function createUser($conn, $email, $password){
        $sql = "INSERT INTO users (email, password, salt) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: /Password-Manager/register/register.php?error=error");
            exit();
        }
        
        $iterations = 100000;
        $salt = openssl_random_pseudo_bytes(16);
        $param_salt = bin2hex($salt);
        $param_password = hash_pbkdf2("sha256", $password, $param_salt, $iterations, 150);

        mysqli_stmt_bind_param($stmt, "sss", $email, $param_password, $param_salt);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: /Password-Manager/register/register.php?error=none");
        exit();
    }

