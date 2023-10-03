<?php require_once 'inc/config_session.inc.php'; ?>


<section class="container-fluid m-0 p-0">
    <section class="navbar align-items-center justify-content-end gap-3 primary-bg px-3">
        <p class="fs-6 text-white fw-lighter m-0">E-mail: Aljongabrielambasvaldez@gmail.com</p>
        <p class="fs-6 text-white fw-lighter m-0">Contact: +63-9397179384</p>
    </section>
</section>


<section class="container">
    <section class="navbar align-items-center justify-content-between align-items-center">
        <div class="d-flex navbar-brand align-items-center">
            <div class="text-center">
                <h2 class="display-6 text-primary m-0 p-0">A Playsale</h2>
                <p class="lead m-0 p-0">Online Tech Garage</p>
            </div>
            <div>
                <ul class="d-flex gap-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page === 'index') ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page === 'product') ? 'active' : ''; ?>" href="index.php">Products</a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="d-flex">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Products" aria-label="Search Items" aria-describedby="basic-addon2">
                <button type="button"><i class="bi bi-search"></i></button>
            </div>
            <?php if (!isset($_SESSION['user_id'])) { ?>
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
                                            <input type="text" class="nav-login-input" id="lgnEmaInp" name="lgnEmaInp" type="email" placeholder="Please enter credential">
                                            <div class="fieldErrors">
                                                <p class="error-message" id="lgnEmaInpError"></p>
                                            </div>
                                        </div>

                                        <div class="nav-login-password-input-container">
                                            <label for="email">Password:</label>
                                            <input type="password" class="nav-login-input" id="lgnPwdInp" placeholder="Please enter credential" name="lgnPwdInp">
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

            <?php } else { ?>
                <div class="nav-middle-user-icon-cart-container">
                    <div class="nav-middle-dropdown-settings-container" data-dropdown>
                        <i class="fa-solid fa-user nav-middle-dropdown-menu-item" data-dropdown-button></i>
                        <div class="nav-middle-dropdown-menu-container">
                            <ul>
                                <li><a class="nav-middle-dropdown-menu-item" href="">Settings</a></li>
                                <li><a class="nav-middle-dropdown-menu-item" href="">Orders</a></li>
                                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') { ?>
                                    <li class="nav-middle-dropdown-menu-item"><a href="admin/index.php">Admin</a></li>
                                <?php } ?>
                                <div class="nav-middle-logout-container">
                                    <form action="inc/login/logout.inc.php" method="post">
                                        <li><button class="nav-middle-dropdown-menu-item">Logout</button></li>
                                    </form>
                                </div>
                            </ul>

                        </div>

                    </div>
                    <div class="nav-middle-cart">
                        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            <?php } ?>

        </div>


    </section>

</section>




</div>
<!-- NAV BOTTOM -->
<div class="nav-bottom-container">
    <div class="nav-bottom-li-container">
        <ul>
            <li class="nav-item"><a href="index.php">Video Games</a></li>
            <li class="nav-item"><a href="index.php">Laptops & Computers</a></li>
            <li class="nav-item"><a href="index.php">Consoles & Handheld Devices</a></li>
            <li class="nav-item"><a href="index.php">Computer Components</a></li>
            <li class="nav-item"><a href="index.php">Apparel & Clothing</a></li>
            <li class="nav-item"><a href="index.php">Gaming Gear & Accessories</a></li>
            <li class="nav-item"><a href="index.php">Footwear & Shoes</a></li>
            <li class="nav-item"><a href="index.php">Cameras & Lens</a></li>
        </ul>
    </div>
</div>