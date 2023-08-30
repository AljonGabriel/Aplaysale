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

function add_product(object $pdo, array|bool $uploaded_files, string $product_name, string $product_price, string $product_description, string $product_category) {
    try {
        highlight_string("<?php " . var_export ($uploaded_files, true) . ";?>");
// Insert product information into the products table
$productQuery = "INSERT INTO products (product_name, product_price, product_description, category_id) VALUES (:nam,
:price, :desc, :cat);";
$productStmt = $pdo->prepare($productQuery);
$productStmt->bindValue(":nam", $product_name);
$productStmt->bindValue(":price", $product_price);
$productStmt->bindValue(":desc", $product_description);
$productStmt->bindValue(":cat", $product_category);
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

foreach($files_array as $tmp_folder => $image_name) {
// Generate a unique filename based on product name, category, and timestamp
$timestamp = time();

$imageExtension = pathinfo($image_name, PATHINFO_EXTENSION); // Assuming the uploaded_files array
/* contains the uploaded file information */
$baseFilename = "{$product_name}_{$category_subfolder_name}_{$timestamp}";
$uniqueFilename = $baseFilename . "_" . "." . $imageExtension;
$counter = 1;

while(file_exists($subfolderDirectory.$uniqueFilename)) {
$uniqueFilename = $baseFilename . '_' . '.' . $counter . "." . $imageExtension;
$counter++;
}

$targetFile = $subfolderDirectory . $uniqueFilename;
$moveFiles = move_uploaded_file($tmp_folder, $targetFile);

if($moveFiles) {

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




// Retrieve product data with concatenated image URLs
function get_all_product_data(object $pdo) {
$query = "
SELECT
p.id AS product_id,
p.product_name,
p.product_description,
p.product_price,
c.name AS category_name,
GROUP_CONCAT(pi.image_url) AS image_urls
FROM products p
JOIN product_images pi ON p.id = pi.product_id
JOIN categories c ON p.category_id = c.id
GROUP BY p.id, p.product_name, p.product_description, p.product_price, c.name
";

$stmt = $pdo->query($query);

if ($stmt) {
return $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
return [];
}
}