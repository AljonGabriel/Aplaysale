<?php 
  require_once '../inc/config_session.inc.php';
  $page = "admin-products";

  if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
 }
    require_once "inc/admin.view.inc.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin-product.css">
    <title>Products</title>
</head>

<body>
    <?php require_once "comp/navbar.php" ?>
    <div class="admin-products">
        <main>
            <div class="admin-products-table-container">
                <div class="admin-products-table-header">
                    <input type="text" placeholder="Search..">
                    <select id="roleFilter" class="admin-users-table-filter">
                        <option value="" disabled selected>Select Category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothing & Fashion">Clothing & Fashion</option>
                        <option value="Books & Stationery">Books & Stationery</option>
                        <option value="Beauty & Personal Care">Beauty & Personal Care</option>
                        <option value="Toys & Games">Toys & Games</option>
                        <option value="Food & Groceries">Food & Groceries</option>
                        <option value="Health & Wellness">Health & Wellness</option>
                        <option value="Jewelry & Watches">Jewelry & Watches</option>
                    </select>
                    <button>Add Categories</button>
                    <button>Add Product</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productData as $product) { $images = explode(",", $product['image_urls'])?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['product_id']) ?></td>
                            <td><img src="<?php echo htmlspecialchars($images[0]) ?>"
                                    alt="<?php echo htmlspecialchars($product['product_name']) ?>" width="100">
                            </td>
                            <td><?php echo htmlspecialchars($product['product_name']) ?></td>
                            <td>
                                <pre><?php echo htmlspecialchars($product['product_description']) ?></pre>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($product['product_price']) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($product['category_name']) ?>
                            </td>
                            <td>Live View/Update/Delete</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>