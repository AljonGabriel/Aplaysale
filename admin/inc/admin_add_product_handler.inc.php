<?php

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] === "POST") {
   
    $uploadedImageUrls = array();  // Initialize an array to store uploaded image URLs

    foreach ($_FILES["admAddProImgInp"]["error"] as $key => $error) {
        if ($error === UPLOAD_ERR_OK) {
            $prod_name = $_POST["admAddProNamInp"];
            $prod_price = $_POST["admAddProPriInp"];
            $prod_des = $_POST["admAddProDesTex"];
            $prod_cat = $_POST["admAddProCatSel"];
    
            require_once "../../inc/dbh.inc.php";
            require_once "admin.model.inc.php";

            // Get the temporary file name of the uploaded image
           $uploaded_file_tmp = $_FILES["admAddProImgInp"]["tmp_name"][$key];

          

            // Call the add_product function with the uploaded file details
            add_product($pdo, $uploaded_file_tmp, $prod_name, $prod_price, $prod_des, $prod_cat);
        } else {
            echo "Error uploading file.";
            // You might want to provide more specific error messages based on $error value
        }
    }
      
} else {
    header("Location: .../index.php");
}
?>