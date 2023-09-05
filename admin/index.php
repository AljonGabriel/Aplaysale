<?php 
$page = 'admin';
require_once '../inc/config_session.inc.php';
require_once 'inc/admin.view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin-index.css">
    <title>Admin Page</title>
</head>

<body>
    <?php require_once 'comp/navbar.php'; ?>


    <div class="admin">
        <main>
            <div class="admin-grids-container">
                <div class="admin-grid-item">
                    <div class="admin-grid-header">
                        <h3>Users</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-users"></i>
                        <p><?php echo ($usersCount !== false) ? htmlspecialchars($usersCount) : "Error getting user count."; ?>
                        </p>
                    </div>
                </div>
                <div class="admin-grid-item">
                    <div class="admin-grid-header">
                        <h3>Products</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-laptop"></i>
                        <p><?php echo ($usersCount !== false) ? htmlspecialchars($usersCount) : "Error getting user count."; ?>
                        </p>
                    </div>
                </div>
                <div class="admin-grid-item">
                    <div class="admin-grid-header">
                        <h3>Sales</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-piggy-bank"></i>
                        <p><?php echo ($usersCount !== false) ? htmlspecialchars($usersCount) : "Error getting user count."; ?>
                        </p>
                    </div>
                </div>
                <div class="admin-grid-item">
                    <div class="admin-grid-header">
                        <h3>Orders</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-stamp"></i>
                        <p><?php echo ($usersCount !== false) ? htmlspecialchars($usersCount) : "Error getting user count."; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="admin-tables">
                <div class="admin-table-header">
                    <h2>Products</h2>
                    <input type="text" class="admin-table-search" placeholder="Search products" id="admSeaPrd">
                    <select id="prdCatSel">
                        <option value="" selected disabled>Category</option>
                        <option value="">All</option>
                    </select>
                    <a href="add_product.php" class="admin-add-product-link">Add
                        product</a>
                    <div class="modal" id="addProduct_<?php echo $userData['id']; ?>">
                        <div class="modal-content">
                            <span class="close" data-modal-id="updateUser">&times;</span>
                            <div class="modal-header">
                                <h2>Add product</h2>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>

                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Price</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach($productData as $product) {?>
                        <tr>
                            <?php
                                // Explode the concatenated image URLs into an array
                                $imageUrls = explode(',', $product['image_urls']);
                                ?>
                            <td><img src="<?php echo htmlspecialchars($imageUrls[0]); ?>" alt="Product Image"
                                    width="100"></td>
                            </td>
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td>
                                <pre><?php echo htmlspecialchars($product['product_description']); ?></pre>
                            </td>
                            <td><?php echo htmlspecialchars($product['product_price']); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>



</body>
<script src="js/searchHandler.js"></script>
<script src="js/modal-array.js"></script>
<script src="js/updataErrorHandlers.js"></script>

</html>