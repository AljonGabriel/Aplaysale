<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST["fullname"];
    $completeaddress = $_POST["completeaddress"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $phonenumber = $_POST["phonenumber"];
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once "../dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

      
        set_user($pdo, $fullname, $completeaddress, $city, $country, $phonenumber, $email, $pwd);

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