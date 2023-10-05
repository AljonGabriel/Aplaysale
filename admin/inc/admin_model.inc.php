<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_users_count(object $pdo)
{

    $query = "SELECT COUNT(*) as user_count FROM users";
    $stmt = $pdo->query($query);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['user_count'];
}

function get_all_users(object $pdo)
{
    $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return [];
}

function update_user(object $pdo, string $userId, string $name, string $address, string $city, string $role)
{

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

function add_product(object $pdo, array|bool $uploaded_files, string $product_name, string $product_price, string $single_product_stock, string $multiple_product_stock, string $product_brand, string $product_category, string $product_description, string $user_id)
{
    try {
        /*  highlight_string("<?php " . var_export ($multiple_product_stock, true) . ";?>"); */

        $stockValue = null;

        if ($single_product_stock === "multipleItem") {
            $stockValue = $multiple_product_stock;
        } else {
            $stockValue = $single_product_stock;
        }


        // Insert product information into the products table
        $productQuery = "INSERT INTO products (product_name, product_price, product_stocks, product_brand, category_id, product_description, added_by) VALUES (:product_name, :product_price, :product_stocks, :product_brand, :product_category, :product_description, :user_id);";
        $productStmt = $pdo->prepare($productQuery);
        $productStmt->bindValue(":product_name", $product_name);
        $productStmt->bindValue(":product_price", $product_price);
        $productStmt->bindValue(":product_stocks", $stockValue);
        $productStmt->bindValue(":product_brand", $product_brand);
        $productStmt->bindValue(":product_category", $product_category);
        $productStmt->bindValue(":product_description", $product_description);
        $productStmt->bindValue(":user_id", $user_id);
        $productStmt->execute();

        // Get the ID of the last inserted product
        $lastProductId = $pdo->lastInsertId();

        // Determine the subfolder name (e.g., using the category name or category ID)
        $category_subfolder_name = $product_category; // Use category name or category ID

        // Define the upload directory and subfolder
        $uploadDirectory = "../../assets/product_images/";
        $subfolderDirectory = $uploadDirectory . $category_subfolder_name . "/"; // ../../assets/product_images/category name"

        // Create the subfolder if it doesn't exist
        if (!is_dir($subfolderDirectory)) {
            mkdir($subfolderDirectory, 0777, true); // Use appropriate permissions
        }

        $fileNames = $uploaded_files['name'];
        $tmp_file_names = $uploaded_files['tmp_name'];

        $files_array = array_combine($tmp_file_names, $fileNames);

        foreach ($files_array as $tmp_folder => $image_name) {
            // Generate a unique filename based on product name, category, and timestamp
            $timestamp = time();

            $imageExtension = pathinfo($image_name, PATHINFO_EXTENSION); // Assuming the uploaded_files array
            /* contains the uploaded file information */
            $baseFilename = "{$product_name}_{$category_subfolder_name}_{$timestamp}";
            $uniqueFilename = $baseFilename . "_" . "." . $imageExtension;
            $counter = 1;

            while (file_exists($subfolderDirectory . $uniqueFilename)) {
                $uniqueFilename = $baseFilename . '_' . '.' . $counter . "." . $imageExtension;
                $counter++;
            }

            $targetFile = $subfolderDirectory . $uniqueFilename;
            $moveFiles = move_uploaded_file($tmp_folder, $targetFile);

            if ($moveFiles) {

                $baseUrl = "http://localhost/";

                $url = $baseUrl . "Aplaysale/assets/product_images/" . $category_subfolder_name . "/" . $uniqueFilename;


                // Insert image URL and product_id into product_images table
                $imageQuery = "INSERT INTO product_images (product_id, image_url) VALUES (:product_id, :image_url);";
                $imageStmt = $pdo->prepare($imageQuery);
                $imageStmt->bindValue(":product_id", $lastProductId);
                $imageStmt->bindValue(":image_url", $url);
                $imageStmt->execute();

                echo "Product and image added successfully.";
            }
        }
    } catch (PDOException $e) {
        echo "Error Inserting Product: " . $e->getMessage();
    }
}

function get_user_feedback(object $pdo)
{
    $query = "SELECT r.id, r.user_id, r.product_id, r.rating, r.review, u.fullname, p.product_name
                    FROM ratings r
                    INNER JOIN users u ON r.user_id = u.id
                    INNEr JOIN products p ON r.product_id = p.id";

    $stmt = $pdo->query($query);
    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function get_products_count(object $pdo)
{

    $query = "SELECT COUNT(*) as user_count FROM products";
    $stmt = $pdo->query($query);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['user_count'];
}

// Retrieve product data with concatenated image URLs
function get_all_product_data(object $pdo)
{
    $query = "
        SELECT
        p.id AS product_id,
        p.product_name,
        p.product_description,
        p.product_price,
        p.product_stocks,
        p.product_brand,
        p.is_new_item,
        p.added_date,
        u.fullname AS user_name,
        u.completeaddress AS address,
        c.name AS category_name,
        GROUP_CONCAT(pi.image_url) AS image_urls
        FROM products p
        JOIN product_images pi ON p.id = pi.product_id
        JOIN categories c ON p.category_id = c.id
        JOIN users u ON p.added_by = u.id
        GROUP BY p.id, p.product_name, p.product_description, p.product_price, c.name;
        ";

    $stmt = $pdo->query($query);

    $result = $stmt ? ($stmt->fetchAll(PDO::FETCH_ASSOC)) : [];
    return $result;
}

function get_new_product(object $pdo)
{

    $query = "SELECT p.id AS product_id, p.product_name, p.product_price, p.is_new_item, MAX(p.added_date) AS added_date, GROUP_CONCAT(pi.image_url) AS image_urls
    FROM products p
    JOIN product_images pi ON p.id = pi.product_id
    WHERE is_new_item = true
    GROUP BY product_id
    ORDER BY added_date DESC;
    ";

    $stmt = $pdo->query($query);

    $result = $stmt ? ($stmt->fetchAll(PDO::FETCH_ASSOC)) : [];
    return $result;
}

function get_stocks_count(object $pdo, int|string $productID)
{

    $query = "SELECT product_stocks FROM products WHERE id = :productID;";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue("productID", $productID);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row['product_stocks'];
    } else {
        return null; // Return null or handle the case where the product is not found.
    }
}


function get_product_by_ID(object $pdo, int|string $PID)
{
    $query = "SELECT p.id AS product_id, p.product_name, p.product_price, p.product_stocks, p.product_brand, p.product_description,  GROUP_CONCAT(pi.image_url) AS image_urls
    FROM products p 
    JOIN product_images pi ON p.id = pi.product_id
    WHERE p.id = :product_ID;
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":product_ID", $PID);
    $stmt->execute();

    $result = $stmt ? ($stmt->fetchAll(PDO::FETCH_ASSOC)) : [];
    return $result;
}
