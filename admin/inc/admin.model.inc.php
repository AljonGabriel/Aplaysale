<?php

declare(strict_types = 1);

function get_users_count(object $pdo) {

    $query = "SELECT COUNT(*) as user_count FROM users";
    $stmt = $pdo->query($query);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
     return $result['user_count'];
    
}

function get_all_users(object $pdo) {
    $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);

    if($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return [];
}

function update_user(object $pdo, string $userId, string $name, string $address, string $city, string $role) {

    try {
        $query = "UPDATE users SET fullname = :name, completeaddress = :address, city = :city, role = :role WHERE id = :userId";
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":address", $address);
        $stmt->bindValue(":city", $city);
        $stmt->bindValue(":role", $role);
        
        $stmt->bindValue(":userId", $userId);
        $stmt->execute();
        
        // Optionally, you can return a success message or value here
    } catch (PDOException $e) {
        // Handle the exception (log, display an error message, etc.)
        echo "Error updating user: " . $e->getMessage();
        // Optionally, you can throw the exception again to propagate it
        // throw $e;
    }
    
}

function add_product(object $pdo, string $uploaded_file_tmp, string $product_name, string $product_price, string $product_description, string $product_category) {
    try {
        // Determine the subfolder name (e.g., using the category name or category ID)
        $category_subfolder = $product_category; // Use category name or category ID
        
        // Define the upload directory and subfolder
        $uploadDirectory = "../../assets/product_images";
        $subfolderDirectory = $uploadDirectory . $category_subfolder . "/";

        // Create the subfolder if it doesn't exist
        if (!is_dir($subfolderDirectory)) {
            mkdir($subfolderDirectory, 0777, true);  // Use appropriate permissions
        }

        // Generate a unique filename based on product name, category, and timestamp
        $timestamp = time();
        $uniqueFilename = $product_name . "_" . $category_subfolder . "_" . $timestamp . "_" . basename($uploaded_file_tmp);

        $targetFile = $subfolderDirectory . $uniqueFilename;

        var_dump($targetFile);

        if (move_uploaded_file($uploaded_file_tmp, $targetFile)) {
           // Insert product information into the products table
           $productQuery = "INSERT INTO products (product_name, product_price, product_description, category_id) VALUES (:nam, :price, :desc, :cat);";
           $productStmt = $pdo->prepare($productQuery);
           $productStmt->bindValue(":nam", $product_name);
           $productStmt->bindValue(":price", $product_price);
           $productStmt->bindValue(":desc", $product_description);
           $productStmt->bindValue(":cat", $product_category);
           $productStmt->execute();

            // Get the ID of the last inserted product
            $lastProductId = $pdo->lastInsertId();
       
            // Insert image URL and product_id into product_images table
            $imageQuery = "INSERT INTO product_images (product_id, image_url) VALUES (:product_id, :image_url);";
            $imageStmt = $pdo->prepare($imageQuery);
            $imageStmt->bindValue(":product_id", $lastProductId);
            $imageStmt->bindValue(":image_url", $targetFile);
            $imageStmt->execute();

            echo "Product and image added successfully.";
        } else {
            echo "Failed to move the uploaded image.";
        }
    } catch (PDOException $e) {
        echo "Error Inserting Product: " . $e->getMessage();
    }
}