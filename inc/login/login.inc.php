<?php 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $emailInput = $_POST['lgnEmaInp'];
    $pwdInput = $_POST['lgnPwdInp'];

    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        $email = json_decode(file_get_contents('php://input'), true)['email'];// Decode the JSON data
        $password = json_decode(file_get_contents('php://input'), true)['password']; // Decode the JSON data


        $result = is_user_match($pdo, $email, $password); // Check if user credentials match

        if ($result) {
            $response = ['message' => 'User Exist'];
        } else {
            $response = ['message' => 'Wrong Credentials'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);



        $stmt = null;
        $pdo = null;

        header('Location: ../../index.php?signup=success');
        die();
        
     } catch (PDOException $e) {
         echo 'Error' + $e;
     }
} else {
    header('Location: ../../index.php');
    die();

}

  