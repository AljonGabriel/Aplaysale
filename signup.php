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

                <form id="myForm" action="inc/signup/signup.inc.php" method="POST">
                    <div class="signup-header">
                        <h2>Sign-up</h2>
                    </div>

                    <fieldset>
                        <!--Full Name input -->
                        <div class="signup-full-name-input-container">
                            <label for="fullname">Complete Name:</label>
                            <input class="signup-input" type="text" id="fullName" name="fullname"
                                placeholder="Complete name">
                            <div class="formError">
                                <p id="fullNameError" class="error-message" style="color: red;"></p>
                            </div>
                        </div>

                        <!--Address input -->
                        <div class="signup-address-input-container">
                            <label for="address">Complete Address:</label>
                            <input class="signup-input" type="text" id="fullName" name="fullname"
                                placeholder="Enter Address">
                            <div>
                                <select id="country" name="country">
                                    <option value="" disabled selected>Select a country</option>
                                    <option value="Philippines">Philippines</option>
                                    <!-- Add more country options as needed -->
                                </select>
                            </div>
                            <div>
                                <select id="city" name="city">
                                    <option value="" disabled selected>Select a city</option>
                                </select>
                            </div>
                        </div>

                        <div class="signup-phone-number-input-container">
                            <input class="signup-input" type="number" id="phoneNo" name="phoneno" placeholder="+63">
                        </div>






                    </fieldset>


                    <input class="signup-input" type="text" id="username" name="username" placeholder="Username">
                    <div class="formError">
                        <p id="usernameError" class="error-message" style="color: red;"></p>
                    </div>


                    <input class="signup-input" type="email" id="email" name="email" placeholder="Email">
                    <div class="formError">
                        <p id="emailError" class="error-message" style="color: red;"></p>
                    </div>

                    <input class="signup-input" type="password" id="pwd" name="pwd" placeholder="Password">
                    <div class="formError">
                        <p id="pwdError" class="error-message" style="color: red;"></p>
                    </div>

                    <input class="signup-input" type="password" id="re-pwd" name="pwd"
                        placeholder="Confirm your password">
                    <div class="formError">
                        <p id="pwdError" class="error-message" style="color: red;"></p>
                    </div>


                    <button type="submit" class="signup-btn">Submit</button>

                </form>


            </div>
        </div>
    </main>

    <script src="js/modal.js"></script>
    <script src="js/errorHandlers.js"></script>
    <script src="js/dropdownAddressHandler.js"></script>


</body>

</html>