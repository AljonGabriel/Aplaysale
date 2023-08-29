<?php

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_FILES['admAddProImgInp'])) {
         // Get the temporary file name of the uploaded image
       $uploaded_files = $_FILES["admAddProImgInp"];
       
        $prod_name = $_POST["admAddProNamInp"];
        $prod_price = $_POST["admAddProPriInp"];
        $prod_des = $_POST["admAddProDesTex"];
        $prod_cat = $_POST["admAddProCatSel"];

        require_once "../../inc/dbh.inc.php";
        require_once "admin.model.inc.php";

       
        // Call the add_product function with the uploaded file details
        add_product($pdo, $uploaded_files , $prod_name, $prod_price, $prod_des, $prod_cat);

    }
   

           
} else {
    header("Location: ../../../index.php");
}
        

?>