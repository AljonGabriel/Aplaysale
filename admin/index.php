<?php
require_once '../inc/config_session.inc.php';
require_once 'inc/admin_view.inc.php';
$page = 'admin-index';

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
                        <i class="fa-solid fa-users" href="admin-user.php"></i>
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
                        <p><?php echo ($productsCount !== false) ? htmlspecialchars($productsCount) : "Error getting products count."; ?>
                        </p>
                    </div>
                </div>
                <div class="admin-grid-item">
                    <div class="admin-grid-header">
                        <h3>Sales</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-piggy-bank"></i>
                        <p>0</p>
                    </div>
                </div>
                <div class="admin-grid-item">
                    <div class="admin-grid-header">
                        <h3>Orders</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-stamp"></i>
                        <p>0</p>
                    </div>
                </div>
            </div>

            <div class="admin-index-tables-container">
                <div class="admin-index-products-table-container">
                    <div class="admin-index-products-table-header">
                        <h3>Products</h3>
                        <input type="text" placeholder="Search..">
                        <p>Edit Products</p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <!-- <th>Product Description</th> -->
                                <th>Category</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productData as $product) {
                                $imgUrls = explode(",", $product['image_urls']); ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($product['product_id']) ?></td>
                                    <td><img src="<?php echo htmlspecialchars($imgUrls[0]); ?>" alt="<?php echo htmlspecialchars($product['product_name']) ?>"></td>
                                    <td><?php echo htmlspecialchars($product['product_name']) ?></td>
                                    <!--  <td>
                            <pre><?php echo htmlspecialchars($product['product_description']) ?></pre>
                        </td> -->
                                    <td><?php echo htmlspecialchars($product['category_name']) ?></td>
                                    <td><?php echo htmlspecialchars($product['product_price']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <div class="admin-index-users-table-container">
                    <div class="admin-index-users-table-header">
                        <h3>Users</h3>
                        <input type="text" placeholder="Search..">
                        <p>Edit Users</p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Complete Name</th>
                                <th>Address</th>
                                <th>Phone no.</th>
                                <th>E-mail</th>
                                <th>role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usersData as $user) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user['id']) ?></td>
                                    <td><?php echo htmlspecialchars($user['fullname']) ?></td>
                                    <td><?php echo htmlspecialchars($user['completeaddress']) ?></td>
                                    <td><?php echo htmlspecialchars($user['phonenumber']) ?></td>
                                    <td><?php echo htmlspecialchars($user['email']) ?></td>
                                    <td><?php echo htmlspecialchars($user['role']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="admin-index-tables-container">
                <div class="admin-index-products-table-container">
                    <div class="admin-index-products-table-header">
                        <h3>User Feedback</h3>
                        <input type="text" placeholder="Search..">
                        <p>Edit Ratings</p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Buyer ID</th>
                                <th>Buyer Name</th>
                                <th>Ratings</th>
                                <th>Reviews</th>
                                <th>Product ID</th>
                                <th>Product Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($userFeedback as $feedback) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($feedback['user_id']) ?></td>
                                    <td><?php echo htmlspecialchars($feedback['fullname']) ?></td>
                                    <td><?php echo htmlspecialchars($feedback['rating']) ?></td>
                                    <td><?php echo htmlspecialchars($feedback['review']) ?></td>
                                    <td><?php echo htmlspecialchars($feedback['product_id']) ?></td>
                                    <td><?php echo htmlspecialchars($feedback['product_name']) ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </main>
    </div>





</body>

</html>