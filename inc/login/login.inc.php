<?php 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $emailInput = $_POST['lgnEmaInp'];
    $pwdInput = $_POST['lgnPwdInp'];

    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        

        $result = get_user_row( $pdo, $emailInput);


        $stmt = null;
        $pdo = null;

        header('Location: ../../index.php?succcess');
        die();

        
     } catch (PDOException $e) {
         echo 'Error' + $e;
     }
} else {
    header('Location: ../../index.php');
    die();

}

  