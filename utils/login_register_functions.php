<?php

    function login($conn, $email, $password){
        $user_exists = emailExists($conn, $email);

        if($user_exists === false){
            header("Location: /Password-Manager/login.php?error=Error");
            exit();
        }

        $password_hashed = $user_exists["password"];
        $salt = $user_exists["salt"];

        $iterations = 100000;

        // Calculate Vault Key
        $secret = $email.$password;
        $vault_key = calculate_vault_key($iterations, $salt, $secret);

        // Calculate Authentication Key
        $auth_secret = $vault_key.$password;
        $auth_key = calculate_auth_key($iterations, $salt, $auth_secret);

        if(verify_password($password_hashed, $auth_key) === false){
            header("Location: /Password-Manager/login.php?error=Error");
            exit();
        }
        else if(verify_password($password_hashed, $auth_key) === true){
            session_start();
            session_regenerate_id(true);

            $_SESSION["user_id"] = $user_exists["id"];
            $_SESSION["email"] = $user_exists["email"];

            header("Location: /Password-Manager/users/vault.php");
            exit();
        }
    }


    function verify_password($password, $password1){
        if($password === $password1){
            return true;
        }
        else{
            return false;
        }
    }


    function emailExists($conn, $email){
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: /Password-Manager/register/register.php?error=Error");
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

        $count_numbers = preg_match_all('/[0-9]/', $password);
        $count_lowercase = mb_strlen(preg_replace('![^a-z]+!', '', $password));
        $count_uppercase = mb_strlen(preg_replace('![^A-Z]+!', '', $password));

        if ($count_numbers < 1){
            return true;
            exit();
        }

        if ($count_lowercase < 1){
            return true;
            exit();
        }

        if ($count_uppercase < 1){
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
            header("Location: /Password-Manager/register/register.php?error=Error");
            exit();
        }
        
        //----------------------------------------------------------------------------------

        $iterations = 100000;
        $salt = openssl_random_pseudo_bytes(16);
        $param_salt = bin2hex($salt);

        // Calculate Vault Key
        $secret = $email.$password;
        $vault_key = calculate_vault_key($iterations, $param_salt, $secret);

        // Calculate Authentication Key
        $auth_secret = $vault_key.$password;
        $auth_key = calculate_auth_key($iterations, $param_salt, $auth_secret);

        //----------------------------------------------------------------------------------

        mysqli_stmt_bind_param($stmt, "sss", $email, $auth_key, $param_salt);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: /Password-Manager/login.php?success=Account_Created");
        exit();
    }


    function calculate_vault_key($iterations, $salt, $secret){
        $vault_key = hash_pbkdf2("sha256", $secret, $salt, $iterations, 32);

        return $vault_key;
        exit();
    }
    

    function calculate_auth_key($iterations, $salt, $auth_secret){
        $auth_key = hash_pbkdf2("sha256", $auth_secret, $salt, $iterations, 32);

        return $auth_key;
        exit();
    }

