<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        require_once '../../inc/dbh.inc.php';
        require_once 'admin.model.inc.php';
        require_once 'admin.view.inc.php';
        require_once 'admin.contr.inc.php';


        echo "Tarups";

        header("Location: ../index.php");
        die();

       
        
    } catch (PDOException $e) {
       echo 'Error' . $e;
    }
    

} else {
    header("Location: ../index.php");
    die();
}