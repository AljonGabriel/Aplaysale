<?php 

if(/* isset($_SERVER['REQUEST_METHOD']) &&  */$_SERVER['REQUEST_METHOD'] === "POST") {

    try {

        require_once '../../inc/dbh.inc.php';
        require_once 'admin.model.inc.php';
        require_once 'admin.contr.inc.php';

   /*      $name = $_POST['admModUpdNamInp'];
        $address = $_POST['admModUpdAddInp'];
        $city = $_POST['admModCitSel'];
        $role = $_POST['admModUpdRolSel'];
        $pwd = $_POST['admModUpdPasInp']; 


        update_user($pdo, $userId, $name, $address, $city, $role, $pwd); */

        header("Location: ../index.php?admin=updateSuccess");
        die();
         
        
    } catch (PDOException $e) {
       echo 'Error' . $e;
    }
    

} else {
    header("Location: ../index.php");
    die();
}