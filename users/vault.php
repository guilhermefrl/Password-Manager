<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/Password-Manager/header/head.php";

    session_start();

    if (isset($_SESSION["user_id"])) {
?>

<!-- Vault Page -->

    <body class="body_style">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand">
                <img src="/Password-Manager/images/icon_navbar.png" width="30" height="30" class="d-inline-block align-top navbar_icon" alt="" loading="lazy">
                Password Manager
            </a>
            <div class="navbar_button">
                <a href="/Password-Manager/register/register.php" class="btn btn-outline-info my-2 my-sm-0" role="button">C</a>
            </div>
        </nav>

        <div class="row">
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 vault_card_style">
                <div class="card justify-content-center shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="vault_card_image">
                            <img src="/Password-Manager/images/icon.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <hr/>
                            <h4 class="card-title">Google</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="btn-position">
            <button type="button" class="btn btn-secondary btn-circle" data-toggle="tooltip" data-bs-placement="left" title="Add Item">
                +
            </button>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php 
    }
    else {
        header("Location: /Password-Manager/login.php");
        exit();
    }
?>