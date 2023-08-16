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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

                <form id="myForm" action="inc/signup/signup.inc.php" method="POST">
                    <div class="signup-header">
                        <h2>Sign-up</h2>
                    </div>

                    <fieldset>
                        <legend class="fieldset-legend">User Information</legend>
                        <!--Full Name input -->
                        <div class="signup-full-name-input-container">
                            <label for="fullname">Complete Name:</label>

                            <input class="signup-input" type="text" id="fullName" name="fullname"
                                placeholder="Complete name">
                            <div class="fieldErrors">
                                <p class="error-message" id="fullNameError"></p>
                            </div>
                        </div>

                        <!--Address input -->
                        <div class="signup-address-input-container">
                            <label for="address">Complete Address:</label>
                            <input class="signup-input" type="address" id="address" name="address"
                                placeholder="Enter Address">
                            <div class="fieldErrors">
                                <p class="error-message" id="addressError"></p>
                            </div>
                            <div>
                                <select class="signup-select" id="country" name="country">
                                    <option value="" disabled selected>Select a country</option>
                                    <option value="Philippines">Philippines</option>
                                    <!-- Add more country options as needed -->
                                </select>
                            </div>
                            <div>
                                <select class="signup-select" id="city" name="city">
                                    <option value="" disabled selected>Select a city</option>
                                </select>
                            </div>
                        </div>

                        <div class="signup-phone-number-input-container">
                            <label for="contact">Phone Number: </label>
                            <small class="signup-small">Valid format: +63 9123456XXX</small>

                            <input class="signup-input" type="tel" id="phoneNumber" name="contact"
                                placeholder="Valid Number">
                            <div class="fieldErrors">
                                <p class="error-message" id="phoneNumberError" class="error-message"></p>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend class="fieldset-legend">Login Informaiton</legend>

                        <div class="signup-email-input-container">
                            <label for="email">Email:</label>
                            <input class="signup-input" type="email" id="email" name="email" placeholder="Email">
                            <div class="fieldErrors">
                                <p class="error-message" id="emailError"></p>
                            </div>
                        </div>

                        <div class="signup-password-input-container">
                            <label for="pwd">Password:</label>
                            <input class="signup-input" type="password" id="pwd" name="pwd" placeholder="Password">
                            <div class="fieldErrors">
                                <p class="error-message" id="pwdError"></p>
                            </div>

                            <label for="re-pwd">Confirm Password:</label>
                            <input class="signup-input" type="password" id="rePwd" name="pwd"
                                placeholder="Confirm your password">
                            <div class="fieldErrors">
                                <p class="error-message" id="rePwdError"></p>
                            </div>
                        </div>

                        <button type="submit" class="signup-btn">Submit</button>

                    </fieldset>
                </form>
            </div>
        </div>
    </main>

    <script src="js/modal.js"></script>
    <script src="js/errorHandlers.js"></script>
    <script src="js/dropdownAddressHandler.js"></script>


</body>

</html>