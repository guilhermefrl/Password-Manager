<?php
    session_start();

    if (isset($_SESSION['SESSION_ID'])){
        header("Location: /Password-Manager/users/vault.php");
        exit(); 
    }

    if(isset($_POST["submit"])){
        require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/conn/conn.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/utils/login_register_functions.php";

        $email = $password = $password_confirmation = "";

        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_confirmation = $_POST["password-confirmation"];

        if(emailExists($conn, $email) !== false){
            header("Location: /Password-Manager/register/register.php?error=error");
            exit();
        }

        if(passwordMatch($password, $password_confirmation) !== false){
            header("Location: /Password-Manager/register/register.php?error=error");
            exit();
        }

        if(passwordStrength($email, $password) !== false){
            header("Location: /Password-Manager/register/register.php?error=password_strength");
            exit();
        }

        createUser($conn, $email, $password);
    }
    else{
        header("Location: /Password-Manager/register/register.php");
        exit();
    }