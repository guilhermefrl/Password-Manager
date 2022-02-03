<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/header/head.php";

    session_start();

    if (isset($_SESSION['SESSION_ID'])){
        header("Location: /Password-Manager/users/vault.php");
        exit(); 
    }
?>

<!-- Register Page -->

    <body class="body_style">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand">
                <img src="/Password-Manager/images/icon_navbar.png" width="30" height="30" class="d-inline-block align-top navbar_icon" alt="" loading="lazy">
                Password Manager
            </a>
            <div class="navbar_button">
                <a href="/Password-Manager/login.php" class="btn btn-outline-info my-2 my-sm-0" role="button">Login</a>
            </div>
        </nav>

        <form action="create_account.php" method="POST">
            <div class="login_card_style">
                <div class="card w-50 d-flex justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="login_card_form">
                        <div class="register_title">
                            <h3 class="card-title register_title">Create new account</h3>
                        </div>
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
                                <label>Confirm Master Password</label>
                                <input type="password" class="form-control" name="password-confirmation" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login_card_button">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>

        <?php
            if (isset($_GET["error"])){
                if($_GET["error"] == "Email_Exists"){
                    echo '
                        <div class="register_alert_style alert alert-danger alert-dismissible" id="Alert" role="alert">
                            <div class="d-flex align-items-center register_alert_text1">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <strong>Error!</strong> Email already exists.
                                </div>
                            </div>
                        </div>
                    ';
                }
                else if($_GET["error"] == "Passwords_Dont_Match"){
                    echo '
                        <div class="register_alert_style alert alert-danger alert-dismissible" id="Alert" role="alert">
                            <div class="d-flex align-items-center register_alert_text2">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>';
                                    echo "<strong>Error!</strong> Passwords don't match.";
                                    echo'
                                </div>
                            </div>
                        </div>
                    ';
                }
                else if($_GET["error"] == "Password_Strength"){
                    echo '
                        <div class="register_alert_style alert alert-danger alert-dismissible" id="Alert" role="alert">
                            <div class="d-flex align-items-center register_alert_text3">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <strong>Error!</strong> Please, use a stronger password.
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
        window.location.href = '/Password-Manager/register/register.php';
    })
</script>