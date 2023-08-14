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
    <title>Register</title>
</head>

<body>
    <nav>
        <?php require_once 'comp/navbar.php' ?>
    </nav>

    <main>

        <div class="register">
            <div class="register-container">
                <form id="myForm" action="inc/signup/signup.inc.php" method="post">
                    <input type="text" id="username" name="username" placeholder="Username">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="password" id="pwd" name="pwd" placeholder="Password">
                    <button type="submit">Submit</button>
                    <div id="errorMessage"></div>
                </form>
            </div>
        </div>


    </main>
    <script src="js/errorHandlers.js"></script>

</body>

</html>