<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
error_reporting(-1);

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    try {

        if (isset($_FILES['admPrdImgInp'])) {
            // Get the temporary file name of the uploaded image
            $uploaded_files = $_FILES["admPrdImgInp"];
            
            $prod_name = $_POST["admPrdNamInp"];
            $prod_price = $_POST["admPrdPrcInp"];
            $single_prod_stock = $_POST["admPrdStkSel"];
            $multiple_prod_stock = $_POST["admPrdMItmInp"];
            $prod_brand = $_POST["admPrdBrdInp"];
            $prod_cat = $_POST["admPrdCat"];
            $prod_desc = $_POST["admPrdDesc"];
    
            require_once "../../inc/dbh.inc.php";
            require_once "admin.model.inc.php";
    
            // Call the add_product function with the uploaded file details
            add_product($pdo, $uploaded_files, $prod_name, $prod_price, $single_prod_stock, $multiple_prod_stock, $prod_brand, $prod_cat, $prod_desc);
    
            $pdo = null;
            $stmt = null;
    
            header("Location: ../index.php");
            die();
        }
    } catch (PDOException $e) {
    // Handle database-related errors
    $errorMessage = "Database Error: " . $e->getMessage();
    error_log($errorMessage, 3, "error_log.txt"); // Log to a file
    exit(); // Stop script execution
    }
} else {
    header("Location: ../index.php");
    die();
}

?>