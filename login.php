<?php
    require_once "header/head.php";

    session_start();

    if (isset($_SESSION['SESSION_ID'])){
        header("Location: /Password-Manager/users/vault.php");
        exit(); 
    }
?>

<!-- Login Page -->

    <body class="body_style">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand">
                <img src="/Password-Manager/images/icon_navbar.png" width="30" height="30" class="d-inline-block align-top navbar_icon" alt="" loading="lazy">
                Password Manager
            </a>
            <div class="navbar_button">
                <a href="/Password-Manager/register/register.php" class="btn btn-outline-info my-2 my-sm-0" role="button">Register</a>
            </div>
        </nav>

        <div class="login_card_style">
            <div class="card w-50 d-flex justify-content-center shadow p-3 mb-5 bg-white rounded">
                <div class="login_card_form">
                    <div class="form-row">
                        <div class="login_card_header">
                            <img src="/Password-Manager/images/icon.png" width="90" height="90" class="d-inline-block align-top login_card_image" alt="" loading="lazy">
                        </div>
                    </div>

                    <h2 class="card-title">Login</h2>
                    <hr/>
                    <br/>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <button type="button" class="btn btn-primary btn-lg btn-block login_card_button">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
