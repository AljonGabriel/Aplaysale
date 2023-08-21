<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

</style>

<body>
    <div class="nav-container">

        <div class="nav-li-container">
            <div class="nav-logo">
                <li>
                    <h2>Aplaysale</h2>
                </li>
            </div>
            <ul>
                <li class="nav-item"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="index.php">Products</a></li>
            </ul>

            <div class="nav-search-container">
                <input class="nav-search-input" type="search" placeholder="Search item ..">
            </div>

            <div class="nav-login-register">
                <button class="nav-login-register-btn" id="modalBtn">Sign-in</button>

                <div class="modal" id="modal">
                    <div class="modal-content" id="modalContent">

                        <div class="modal-header">
                            <h2>Log-in</h2>
                        </div>


                        <div class="modal-nav-login">
                            <span class="close">&times;</span>
                            <div class="fieldErrors">
                                <p style="text-align: center" class="error-message" id="headError"></p>
                            </div>


                            <form action="inc/login/login.inc.php" class="login-form" id="loginForm" method="post">

                                <fieldset class="login-fieldset">
                                    <div class="nav-login-email-input-container">
                                        <label for="email">Email:</label>
                                        <input type="text" class="nav-login-input" id="lgnEmaInp" name="lgnEmaInp"
                                            type="email" placeholder="Please enter credential">
                                        <div class="fieldErrors">
                                            <p class="error-message" id="lgnEmaInpError"></p>
                                        </div>
                                    </div>

                                    <div class="nav-login-password-input-container">
                                        <label for="email">Password:</label>
                                        <input type="password" class="nav-login-input" id="lgnPwdInp"
                                            placeholder="Please enter credential" name="lgnPwdInp">
                                        <div class="fieldErrors">
                                            <p class="error-message" id="lgnPwdInpError"></p>
                                        </div>
                                    </div>

                                    <div class="login-btn-container">
                                        <button class="nav-login-btn">Submit</button>
                                    </div>

                                </fieldset>
                            </form>
                            <a href="signup.php" class="dhay">don't have account yet ?</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="js/modal.js"></script>
    <script src="js/loginErrorHandlers.js"></script>


</body>

</html>