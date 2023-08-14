<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once "../dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        //ERROR HANDLERS

        $errors = [];

        if(is_input_empty($username, $pwd, $email)) 
        {
            $errors["empty_strings"] = "Fill in all fields";

        }

        if(is_username_taken( $pdo,  $username)) 
        {
            $errors["Invalid_email"] = "Invalid email used";

        }

        if(is_email_regsitered( $pdo,  $email)) 
        {
            $errors["email_used"] = "Email already used";

        }

        require_once "../config_session.inc.php";

        if($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../../signup.php");
            die();
        }

        set_user( $pdo,  $username,  $email,  $pwd);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?signup=success');
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
       
    }
    
} else {
    header('Location: ../../index.php');
    die();
}