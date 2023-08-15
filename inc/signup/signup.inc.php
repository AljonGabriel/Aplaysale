<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

   
       
    
    

    try {

        require_once "../dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        ob_clean(); // Clean output buffer

        $response = array(); // Create a response array

  

        // Call the function to check if the email exists
        $emailExists = get_email($pdo, $email);

        // Set the response value based on email existence
        $response['emailExists'] = $emailExists['email']; // Assuming 'email' is the key in the fetched result
    

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);


        //ERROR HANDLERS

        $errors = [];

        if(is_input_empty($username, $pwd, $email)) 
        {
            $errors["empty_strings"] = "Fill in all fields";

        }

        if(is_username_taken( $pdo,  $username)) 
        {
            $errors["username_taken"] = "The username was already taken";

        }

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $errorData = urlencode(json_encode($errors));
            header("Location: ../../signup.php?signup=failed&error_data=$errorData");
            exit;
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