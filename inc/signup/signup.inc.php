<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once "../dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

      
        set_user( $pdo, $email,  $pwd);

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