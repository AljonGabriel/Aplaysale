<?php 
require_once "inc/signup/signup_view.inc.php";
require_once "inc/config_session.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Register</title>
</head>

<body>
    <nav>
        <?php require_once 'comp/navbar.php' ?>
    </nav>
    <main>
        <div class="signup">
            <div class="signup-container">
                <form class="signup-form" id="sgnForm" action="inc/signup/signup.inc.php" method="POST">
                    <fieldset class="signup-fieldset">
                        <legend class="fieldset-legend">User Information</legend>
                        <div class="fieldErrors">
                            <p class="error-message" id="sgnHeadError"></p>
                        </div>

                        <!--Full Name input -->
                        <div class="signup-full-name-input-container">
                            <label for="sgnNamInp">Complete Name:</label>
                            <input class="signup-input" type="text" id="sgnNamInp" name="sgnNamInp"
                                placeholder="John Doe">
                            <div class="fieldErrors">
                                <p class="error-message" id="sgnNamInpError"></p>
                            </div>
                        </div>
                        <!--Address input -->
                        <div class="signup-address-input-container">
                            <label for="sgnAddInp">Complete Address:</label>
                            <input class="signup-input" type="text" id="sgnAddInp" name="sgnAddInp"
                                placeholder="123 Main Street, City, Country">
                            <div class="fieldErrors">
                                <p class="error-message" id="sgnAddInpError"></p>
                            </div>
                            <div>
                                <select class="signup-select" id="sgnCouSel" name="sgnCouSel">
                                    <option value="" disabled selected>Select a country</option>
                                    <option value="Philippines">Philippines</option>
                                </select>
                            </div>
                            <div>
                                <select class="signup-select" id="sgnCitSel" name="sgnCitSel">
                                    <option value="" disabled selected>Select a city</option>
                                </select>
                            </div>
                        </div>
                        <!--Phone input -->
                        <div class="signup-phone-number-input-container">
                            <label for="sgnPhoInp">Phone Number: </label>
                            <small class="signup-small">Valid format: +63 9123456XXX or 09xx xxx xxxx</small>

                            <input class="signup-input" type="tel" id="sgnPhoInp" name="sgnPhoInp"
                                placeholder="+63 9123456XXX">
                            <div class="fieldErrors">
                                <p class="error-message" id="sgnPhoInpError" class="error-message"></p>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset class="signup-fieldset">
                        <legend class="fieldset-legend">Login Informaiton</legend>
                        <!--Email input -->
                        <div class="signup-email-input-container">
                            <label for="sgnEmaInp">Email:</label>
                            <input class="signup-input" type="email" id="sgnEmaInp" name="sgnEmaInp"
                                placeholder="johndoe@example.com">
                            <div class="fieldErrors">
                                <p class="error-message" id="sgnEmaInpError"></p>
                            </div>
                        </div>
                        <!--Password input -->
                        <div class="signup-password-input-container">
                            <label for="sgnPwdInp">Password:</label>
                            <small class="signup-small">"Your password should be at least 8 characters long and include
                                a mix of uppercase
                                and lowercase letters, numbers, and special characters (e.g., !, @, #, $). This will
                                help ensure the security of your account."</small>
                            <input class="signup-input" type="password" id="sgnPwdInp" name="sgnPwdInp"
                                placeholder="Your Password">
                            <div class="fieldErrors">
                                <p class="error-message" id="sgnPwdInpError"></p>
                            </div>
                            <!--RePassword input -->
                            <label for="sgnRePwdInp">Confirm Password:</label>
                            <input class="signup-input" type="password" id="sgnRePwdInp" name="sgnRePwdInp"
                                placeholder="Confirm your password">
                            <div class="fieldErrors">
                                <p class="error-message" id="sgnRePwdInpError" class="error-message"></p>
                            </div>
                        </div>
                        <button type="submit" class="signup-btn">Submit</button>

                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <script src="js/modal.js"></script>
    <script src="js/signupErrorHandlers.js"></script>
    <script src="js/dropdownAddressHandler.js"></script>
</body>

</html>