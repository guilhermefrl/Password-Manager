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
                            <label>Master Password</label>
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

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
        </svg>

        <?php
            if (isset($_GET["success"])){
                if($_GET["success"] == "Account_Created"){
                    echo '
                        <div class="register_alert_style alert alert-success alert-dismissible" id="Alert" role="alert">
                            <div class="d-flex align-items-center register_alert_text4">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                    <strong>Success!</strong> Account created.
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>
    </body>
</html>

<script>
    var myAlert = document.getElementById('Alert')
    myAlert.addEventListener('closed.bs.alert', function () {
        window.location.href = '/Password-Manager/login.php';
    })
</script>
