<?php
    session_start();

    if (isset($_SESSION['user_id'])){
        header("Location: /Password-Manager/users/vault.php");
        exit(); 
    }

    if(isset($_POST["submit"])){
        require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/conn/conn.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/utils/login_register_functions.php";

        $email = $password = "";

        $email = $_POST["email"];
        $password = $_POST["password"];

        login($conn, $email, $password);
    }
    else{
        header("Location: /Password-Manager/login.php");
        exit();
    }