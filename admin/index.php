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
    <link rel="stylesheet" href="../styles/admin/index.css">
    <title>Admin Page</title>
</head>

<body>
    <nav>
        <?php
            require_once 'comp/navbar.php';
        ?>
    </nav>
    <main>
        <div class="admin">
            <div class="admin-container">
                <div class="admin-grids-container">
                    <div class="admin-grid-item users">
                        <div class="admin-grid-header">
                            <h2>Users</h2>
                        </div>
                        <div class="admin-grid-count">
                            <p><?php echo ($usersCount !== false) ? htmlspecialchars($usersCount) : "Error getting user count."; ?>
                            </p>
                        </div>
                    </div>
                    <div class="admin-grid-item products">
                        <div class="admin-grid-header">
                            <h2>Products</h2>
                        </div>
                        <div class="admin-grid-count">
                            <p>675</p>
                        </div>
                    </div>
                    <div class="admin-grid-item orders">
                        <div class="admin-grid-header">
                            <h2>Orders</h2>
                        </div>
                        <div class="admin-grid-count">
                            <p>78</p>
                        </div>
                    </div>
                    <div class="admin-grid-item sales">
                        <div class="admin-grid-header">
                            <h2>Sales</h2>
                        </div>
                        <div class="admin-grid-count">
                            <p>$100000</p>
                        </div>
                    </div>
                </div>
                <div class="admin-tables">
                    <div class="admin-table-header">

                        <h2>Users</h2>
                        <input type="text" class="admin-table-search" placeholder="Search user" id="searchInput">
                        <select id="roleFilter">
                            <option value="">All</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>

                    </div>
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Phone no.</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Join</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usersData as $userData) {?>
                            <tr>
                                <td><?php echo htmlspecialchars($userData['id']); ?></td>
                                <td><?php echo htmlspecialchars($userData['fullname']); ?></td>
                                <td><?php echo htmlspecialchars($userData['completeaddress']); ?></td>
                                <td><?php echo htmlspecialchars($userData['city']); ?></td>
                                <td><?php echo htmlspecialchars($userData['country']); ?></td>
                                <td><?php echo htmlspecialchars($userData['phonenumber']); ?></td>
                                <td><?php echo htmlspecialchars($userData['email']); ?></td>
                                <td data-role="<?php echo htmlspecialchars($userData['role']); ?>">
                                    <?php echo htmlspecialchars($userData['role']); ?></td>
                                <td><?php echo htmlspecialchars($userData['created_at']); ?></td>
                                <td> <button data-user-id="<?php echo $userData['id']; ?>"
                                        class="admin-modal-update-user-btn-trg"
                                        data-modal-id="updateUser_<?php echo $userData['id']; ?>">Update</button>
                                    <div class="modal" id="updateUser_<?php echo $userData['id']; ?>">
                                        <div class="modal-content">
                                            <span class="close" data-modal-id="updateUser">&times;</span>
                                            <div class="modal-header">
                                                <h2>Update this user</h2>
                                            </div>
                                            <div class="modal-body">

                                                <fieldset class="admin-fieldset">
                                                    <form action="inc/admin_update_user.inc.php" method="post"
                                                        id="admModUpdForm_<?php echo $userData['id']; ?>">

                                                        <div class="admin-modal-update-user-input-container">
                                                            <label for="admModUpdUIDInp">Id:</label>
                                                            <input id="admModUpdUIDInp_<?php echo $userData['id'] ?>"
                                                                type="text" name="admModUpdUIDInp"
                                                                class="admin-modal-update-user-input" disabled>
                                                        </div>

                                                        <div class="admin-modal-update-user-input-container">
                                                            <input
                                                                id="admModUpdUIDInpHidden_<?php echo $userData['id'] ?>"
                                                                type="text" name="admModUpdUIDInp"
                                                                class="admin-modal-update-user-input" hidden>
                                                        </div>

                                                        <div class="admin-modal-update-user-input-container">
                                                            <label for="admModUpdNamInp">Name:</label>
                                                            <input id="admModUpdNamInp_<?php echo $userData['id'] ?>"
                                                                type="text" name="admModUpdNamInp"
                                                                class="admin-modal-update-user-input">
                                                            <div class="fieldErrors">
                                                                <p class="error-message"
                                                                    id="admModUpdNamInp_<?php echo $userData['id'] ?>Error"
                                                                    class="error-message"></p>
                                                            </div>
                                                        </div>
                                                        <div class="admin-modal-update-user-input-container">
                                                            <label for="admModUpdAddInp">Address:</label>
                                                            <input id="admModUpdAddInp_<?php echo $userData['id'] ?>"
                                                                type="text" name="admModUpdAddInp"
                                                                class="admin-modal-update-user-input">
                                                            <div class="fieldErrors">
                                                                <p class="error-message"
                                                                    id="admModUpdAddInp_<?php echo $userData['id'] ?>Error"
                                                                    class="error-message"></p>
                                                            </div>

                                                        </div>
                                                        <div class="admin-modal-update-user-input-container">
                                                            <label for="admModCitSel">City:</label>
                                                            <select class="admin-modal-update-user-city-select"
                                                                id="admModCitSel_<?php echo $userData['id'] ?>"
                                                                name="admModCitSel">
                                                                <option value="" disabled selected>Select a city
                                                                </option>
                                                                <option value="Philippines">Philiipines
                                                                </option>
                                                            </select>
                                                            <div class="fieldErrors">
                                                                <p class="error-message"
                                                                    id="admModCitSel_<?php echo $userData['id'] ?>Error"
                                                                    class="error-message"></p>
                                                            </div>
                                                        </div>
                                                        <div class="admin-modal-update-user-input-container">
                                                            <label for="admModUpdRolSel">Role:</label>
                                                            <select class="admin-modal-update-user-city-select"
                                                                id="admModUpdRolSel_<?php echo $userData['id'] ?>"
                                                                name="admModUpdRolSel">
                                                                <option value="" disabled selected>Select a role
                                                                </option>
                                                                <option value="admin">Admin</option>
                                                                <option value="user">User</option>
                                                            </select>
                                                            <div class="fieldErrors">
                                                                <p class="error-message"
                                                                    id="admModUpdRolSel_<?php echo $userData['id'] ?>Error"
                                                                    class="error-message"></p>
                                                            </div>
                                                        </div>

                                                        <div class="admin-updateuser-btn-container">
                                                            <button type="submit"
                                                                class="admin-modal-update-user-submit">Update</button>
                                                        </div>
                                                    </form>


                                                </fieldset>

                                            </div>
                                        </div>
                                    </div>
                                    <button class="admin-delete-user-btn" id="updateUser">Delete</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

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
                                <td><?php echo htmlspecialchars($product['product_description']); ?></td>
                                <td><?php echo htmlspecialchars($product['product_price']); ?></td>


                            </tr>
                            <?php } ?>
                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </main>


</body>
<script src="js/searchHandler.js"></script>
<script src="js/modal-array.js"></script>
<script src="js/updataErrorHandlers.js"></script>

</html>