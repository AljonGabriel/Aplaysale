<?php 

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

    require_once "../dbh.inc.php";
    require_once "rating_model.inc.php";

    // Check if 'product_id' is set in the URL
    if (isset($_GET['product_id'])) {
        $prod_id = $_GET['product_id']; // Correct the variable name here

    } 

    require_once '../config_session.inc.php';

    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        header("Location: ../../index.php?prod_id=NotFound");
        exit();
    }
    

    $review = $_POST['proDetPrvRatStrInp'];
    $rating = $_POST['proDetPrvRatStrHdnInp'];
    

    add_rating($pdo, $user_id, $prod_id, $rating, $review ); 

    $pdo = null;
    $stmt = null;

    header("Location: ../../product_details.php?product_id=$prod_id");
    exit();
   

} else {
    header("Location: ../../index.php");
}