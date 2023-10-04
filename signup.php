<?php
require_once "inc/signup/signup_view.inc.php";
require_once "inc/config_session.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="styles/index.css"> -->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js" defer></script>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" defer></script>



    <title>Sign-up</title>
</head>

<body>
    <header>
        <nav>
            <?php require_once 'comp/navbar.php' ?>
        </nav>
    </header>
    <main class="container-fluid py-3 secondary-bg">
        <section class="container">

            <form class="signup-form" id="sgnForm" action="inc/signup/signup.inc.php" method="POST">
                <section class="row row-cols-1 row-cols-md-2 row-cols-sm-1">
                    <fieldset class="col">
                        <legend class="display-6 text-center mb-3">User Information</legend>
                        <div class="fieldErrors my-3">
                            <p class="error-message text-danger" id="sgnHeadError"></p>
                        </div>

                        <!--Full Name input -->
                        <div class="form-floating">
                            <input class="form-control" type="text" id="sgnNamInp" name="sgnNamInp" placeholder="John Doe">
                            <label for="sgnNamInp">Full Name</label>
                            <div class="fieldErrors mb-2">
                                <p class="error-message text-danger" id="sgnNamInpError"></p>
                            </div>
                        </div>
                        <!--Address input -->
                        <div class="form-floating">
                            <input class="form-control" type="text" id="sgnAddInp" name="sgnAddInp" placeholder="123 Main Street, City, Country">
                            <label for="sgnAddInp">Complete Address:</label>
                            <div class="fieldErrors mb-2">
                                <p class="error-message text-danger" id="sgnAddInpError"></p>
                            </div>
                        </div>

                        <div class="form-floating">
                            <select class="form-select mb-3" id="sgnCouSel" name="sgnCouSel" aria-label="Select Country First">
                                <option value="" disabled selected>Select a country</option>
                                <option value="Philippines">Philippines</option>
                            </select>
                            <label for="sgnCouSel">Country</label>

                        </div>

                        <div class="form-floating mb-3">

                            <select class="form-select" id="sgnCitSel" name="sgnCitSel">
                                <option value="" disabled selected>Select a city</option>
                            </select>
                            <label for="sgnCitSel">City</label>
                        </div>

                        <!--Phone input -->
                        <small class="fs-6 fw-italic text-secondary">Valid format: +63 9123456XXX or 09xx xxx xxxx</small>
                        <div class="form-floating">
                            <input class="form-control" type="tel" id="sgnPhoInp" name="sgnPhoInp" placeholder="+63 9123456XXX">
                            <label for="sgnPhoInp">Phone Number: </label>
                            <div class="fieldErrors mb-2">
                                <p class="error-message text-danger" id="sgnPhoInpError" class="error-message"></p>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset class="col">
                        <legend class="display-6 text-center mb-3">Login Informaiton</legend>
                        <!--Email input -->
                        <div class="form-floating mb-3">

                            <input class="form-control" type="email" id="sgnEmaInp" name="sgnEmaInp" placeholder="johndoe@example.com">
                            <label for="sgnEmaInp">Email:</label>
                            <div class="fieldErrors mb-2">
                                <p class="error-message text-danger" id="sgnEmaInpError"></p>
                            </div>
                        </div>
                        <small class="signup-small">"Your password should be at least 8 characters long and include
                            a mix of uppercase
                            and lowercase letters, numbers, and special characters (e.g., !, @, #, $). This will
                            help ensure the security of your account."</small>
                        <!--Password input -->
                        <div class="form-floating">


                            <input class="form-control" type="password" id="sgnPwdInp" name="sgnPwdInp" placeholder="Your Password">
                            <label for="sgnPwdInp">Password:</label>
                            <div class="fieldErrors mb-2">
                                <p class="error-message text-danger" id="sgnPwdInpError"></p>
                            </div>

                        </div>

                        <div class="form-floating">
                            <!--RePassword input -->

                            <input class="form-control" type="password" id="sgnRePwdInp" name="sgnRePwdInp" placeholder="Confirm your password">
                            <label for="sgnRePwdInp">Confirm Password:</label>
                            <div class="fieldErrors mb-2">
                                <p class="error-message text-danger" id="sgnRePwdInpError" class="error-message"></p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>

                    </fieldset>
                </section>

            </form>
        </section>
    </main>

    <script src="js/signupErrorHandlers.js"></script>

</body>

</html>