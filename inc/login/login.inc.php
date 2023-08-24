<?php 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $emailInput = $_POST['lgnEmaInp'];
    $pwdInput = $_POST['lgnPwdInp'];

    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        

        $result = get_user_row( $pdo, $emailInput);

        require_once "../config_session.inc.php";

        if($result['user']['role'] === 'admin') {
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result['user']['id'];
            session_id($sessionId);

        
            $_SESSION['user_id'] =  $result['user']['id'];
            var_dump($_SESSION['user_id']);
            $_SESSION['user_role'] = $result['user']['role'];
            $_SESSION['user_name'] = htmlspecialchars($result['user']['fullname']);

            $_SESSION["last_regeneration"] = time();

            


            header('Location: ../../admin/index.php?Login=adminSuccess');
        

            $stmt = null;
            $pdo = null;

            die();

        } else if($result['user']['role'] === 'user') {
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result['user']['id'];
            session_id($sessionId);

        
            $_SESSION['user_id'] =  $result['user']['id'];
            $_SESSION['user_name'] = htmlspecialchars($result['user']['fullname']);

            $_SESSION["last_regeneration"] = time();

            


            header('Location: ../../index.php?Login=userSuccess');
        

            $stmt = null;
            $pdo = null;

            die();

        }

        
        
        
        
     } catch (PDOException $e) {
         echo 'Error' + $e;
     }
} else {
    header('Location: ../../index.php');
    die();

}

  