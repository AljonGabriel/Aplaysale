<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
error_reporting(-1);
require_once "../../inc/config_session.inc.php";

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
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
            $user_id = $_SESSION["user_id"];

            require_once "../../inc/dbh.inc.php";
            require_once "admin_model.inc.php";

            // Call the add_product function with the uploaded file details
            add_product($pdo, $uploaded_files, $prod_name, $prod_price, $single_prod_stock, $multiple_prod_stock, $prod_brand, $prod_cat, $prod_desc, $user_id);

            $pdo = null;
            $stmt = null;

            header("Location: ../admin_products.php?Insert=Success");
            die();
        } else {
            header("Location: ../index.php?Image=Error");
            die();
        }
    } catch (PDOException $e) {
        // Handle database-related errors
        $errorMessage = "Database Error: " . $e->getMessage();
        exit(); // Stop script execution
    }
} else {
    header("Location: ../index.php");
    die();
}
