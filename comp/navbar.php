<?php require_once 'inc/config_session.inc.php';?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

</style>

<body>
    <div class="nav-container">

        <div class="nav-top-container">
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') { ?>
            <li class="nav-item"><a href="admin/index.php">Admin</a></li>
            <?php } ?>
        </div>

        <div class="nav-middle-container">
            <div class="nav-middle-logo-container">
                <h2>Aplaysale</h2>
            </div>
            <div class="nav-middle-li-container">
                <ul>
                    <li class="nav-item">
                        <a class="<?php echo ($page === 'index') ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo ($page === 'product') ? 'active' : ''; ?>" href="index.php">Products</a>
                    </li>

                </ul>

            </div>
            <div class="nav-middle-search-container">
                <input type="search" placeholder="Search Product">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>

            </div>

            <?php  if(!isset($_SESSION['user_id'])) { ?>
            <div class="nav-middle-modal-login">
                <button class="nav-login-register-btn" id="modalBtn">Log-in</button>

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
                                        <button type="submit" class="nav-login-register-btn">Submit</button>
                                    </div>

                                </fieldset>
                            </form>
                            <a href="signup.php" class="dhay">don't have account yet ?</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } else {?>
            <div class="nav-middle-user-icon-cart-container">
                <div class="nav-middle-dropdown-settings-container" data-dropdown>
                    <i class="fa-solid fa-user nav-middle-dropdown-menu-item" data-dropdown-button></i>
                    <div class="nav-middle-dropdown-menu-container">
                        <ul>
                            <li><a class="nav-middle-dropdown-menu-item" href="">Settings</a></li>
                            <li><a class="nav-middle-dropdown-menu-item" href="">Orders</a></li>
                            <div class="nav-middle-logout-container">
                                <form action="inc/login/logout.inc.php" method="post">
                                    <li><button class="nav-middle-dropdown-menu-item">Logout</button></li>
                                </form>
                            </div>
                        </ul>

                    </div>

                </div>
                <div class="nav-middle-cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- NAV BOTTOM -->
        <div class="nav-bottom-container">
            <div class="nav-bottom-li-container">
                <ul>
                    <li class="nav-item"><a href="index.php">Electronics</a></li>
                    <li class="nav-item"><a href="index.php">Clothing & Fashion</a></li>
                    <li class="nav-item"><a href="index.php">Books & Stationery</a></li>
                    <li class="nav-item"><a href="index.php">Beauty & Personal Care
                        </a></li>
                    <li class="nav-item"><a href="index.php">Food & Groceries</a></li>
                    <li class="nav-item"><a href="index.php">Health & Wellness</a></li>
                    <li class="nav-item"><a href="index.php">Toys & Games</a></li>
                    <li class="nav-item"><a href="index.php">Jewelry & Watches</a></li>
                </ul>
            </div>
        </div>

    </div>
</body>
<script src="js/modal.js"></script>
<script src="js/loginErrorHandlers.js"></script>
<script>
// Listen for clicks anywhere on the page
document.addEventListener('mouseover', (e) => {
    // Check if the clicked element is a dropdown button
    const isDropdownButton = e.target.matches('[data-dropdown-button]');

    // If the clicked element is inside a dropdown, do nothing
    if (!isDropdownButton && e.target.closest('[data-dropdown]') != null) return;

    let currentDropdown;

    // If the clicked element is a dropdown button, toggle the dropdown's active state
    if (isDropdownButton) {
        currentDropdown = e.target.closest('[data-dropdown]');
        currentDropdown.classList.toggle('active');
    }

    // Loop through all active dropdowns and close them, except for the current one
    document.querySelectorAll('[data-dropdown].active').forEach((dropdown) => {
        if (dropdown === currentDropdown) return;
        dropdown.classList.remove('active');
    });
});
</script>

</html>