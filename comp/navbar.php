<?php require_once 'inc/config_session.inc.php'; ?>

<script src="js/loginErrorHandlers.js" defer></script>


<!-- Top Navbar Layer -->
<section class="container-fluid m-0 p-0 ">
    <section class="navbar align-items-center justify-content-end gap-3 primary-bg px-5">

        <div class="d-flex gap-3">
            <p class="fs-6 text-white fw-lighter m-0 p-0"><i class="bi bi-envelope-fill"></i> Aljongabrielambasvaldez@gmail.com</p>
            <p class="fs-6 text-white fw-lighter m-0 p-0"><i class="bi bi-telephone-fill"></i> +63-9397179384</p>
        </div>

    </section>
</section>

<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand text-primary fw-bold" href="#">Aplaysale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <!--       <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
            <form class="d-flex" role="search">
                <div class="input-group">
                    <input class="form-control me-0" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </form>
            <div class="d-flex align-items-center mx-3 gap-3">
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary h-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Sign-in
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sign-in</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="fieldErrors">
                                        <p style="text-align: center" class="error-message" id="headError"></p>
                                    </div>
                                    <form action="inc/login/login.inc.php" id="loginForm" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="lgnEmaInp" name="lgnEmaInp" type="email" placeholder="Please enter credential">
                                            <label for="lgnEmaInp">Email</label>
                                            <div class="fieldErrors my-1">
                                                <p class="error-message text-danger" id="lgnEmaInpError"></p>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="lgnPwdInp" placeholder="Please enter credential" name="lgnPwdInp">
                                            <label for="lgnPwdInp">Password:</label>
                                            <div class="fieldErrors my-1">
                                                <p class="error-message  text-danger" id="lgnPwdInpError"></p>
                                            </div>
                                        </div>
                                        <span class="fs-6 text-secondary">Don't have an account yet? <a href="signup.php" class="lead">Sign-up</a></span>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-center"> <!-- Add dropdown-menu-center class -->
                            <li><a class="dropdown-item" href="">Settings</a></li>
                            <li><a class="dropdown-item" href="">Orders</a></li>
                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') { ?>
                                <li><a class="dropdown-item" href="admin/index.php">Admin</a></li>
                            <?php } ?>
                            <div class="nav-middle-logout-container">
                                <form action="inc/login/logout.inc.php" method="post">
                                    <li><button class="dropdown-item">Logout</button></li>
                                </form>
                            </div>
                        </ul>
                    </div>
                    <a class="fs-3 text-secondary" href="cart.php"><i class="bi bi-cart3"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>

<section class="container-fluid bg-body-tertiary">
    <!-- NAV BOTTOM -->
    <ul class="nav align-items-center justify-content-center flex-wrap">
        <li class="nav-item">
            <a class="nav-link " href="index.php">Video Games</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Laptops & Computers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Consoles & Handheld Devices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Computer Components</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Apparel & Clothing</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Gaming Gear & Accessories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Footwear & Shoes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Cameras & Lens</a>
        </li>
    </ul>

</section>