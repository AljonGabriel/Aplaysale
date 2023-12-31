<?php

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {

    try {

        require_once '../../inc/dbh.inc.php';
        require_once 'admin.model.inc.php';
        require_once 'admin.contr.inc.php';

        $id = $_POST['admModUpdUIDInp'];
        $name = $_POST['admModUpdNamInp'];
        $address = $_POST['admModUpdAddInp'];
        $city = $_POST['admModCitSel'];
        $role = $_POST['admModUpdRolSel'];


        update_user($pdo, $id, $name, $address, $city, $role);

        header("Location: ../index.php?admin=updateSuccess");
        die();
    } catch (PDOException $e) {
        echo 'Error' . $e;
    }
} else {
    header("Location: ../index.php");
    die();
}
