<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["sgnNamInp"];
    $completeaddress = $_POST["sgnAddInp"];
    $city = $_POST["sgnCitSel"];
    $country = $_POST["sgnCouSel"];
    $phonenumber = $_POST["sgnPhoInp"];

    $email = $_POST["sgnEmaInp"];
    $pwd = $_POST["sgnPwdInp"];

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
