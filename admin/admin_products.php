<?php
require_once '../inc/config_session.inc.php';
$page = "admin-products";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
}
require_once "inc/admin_view.inc.php";


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
                    <h3>All Products</h3>
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
                    <button class="modal-trigger" id="adminProductsAddProduct" data-modal-id="addProduct">Add Product</button>
                    <div class="admin-products-add-item-modal modal-container" id="addProduct">
                        <div class="admin-products-modal-content" id="addProduct">
                            <form class="admin-products-modal-content-form" enctype="multipart/form-data" action="inc/admin_add_product_handler.inc.php" method="post">

                                <!--Fieldset Basic Information-->

                                <fieldset class="admin-products-fieldset">
                                    <div class="admin-products-modal-content-form-header">
                                        <h3>Add Product</h3>
                                        <br>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdImgInp"><small class="asterisk">*</small>Product Image
                                        </label>
                                        <input id="admPrdImgInp" type="file" accept="image/*" name="admPrdImgInp[]" multiple enctype="multipart/form-data">
                                        <div class="fieldErrors">
                                            <p id="admPrdImgInpError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdNamInp"><small class="asterisk">*</small>Product Name
                                        </label>
                                        <input name="admPrdNamInp" id="admPrdNamInp" type="text" placeholder="Nike Shoes">
                                        <div class="fieldErrors">
                                            <p id="admPrdNamInpError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdPrcInp"><small class="asterisk">*</small>Product Price
                                        </label>
                                        <input name="admPrdPrcInp" id="admPrdPrcInp" type="number" placeholder="599">
                                        <div class="fieldErrors">
                                            <p id="admPrdPrcInpError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdStkSel"><small class="asterisk">*</small>Stock
                                        </label>
                                        <select name="admPrdStkSel" id="admPrdStkSel">
                                            <option value="Single Stock Item">Single Stock Item</option>
                                            <option value="multipleItem">Multiple Stock Item</option>
                                        </select>
                                        <div class="fieldErrors">
                                            <p id="admPrdStkSelError" class="error-message">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="admin-products-input-container" id="admPrdMItmContainer">
                                        <label for="admPrdMItmInp"><small class="asterisk">*</small>Quantity
                                        </label>
                                        <input type="number" name="admPrdMItmInp" placeholder="1 - 99">
                                        <div class="fieldErrors">
                                            <p id="admPrdMItmInpError" class="error-message">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="admin-products-input-container">
                                        <label for="admPrdBrdInp"><small class="asterisk">*</small>Product Brand
                                        </label>
                                        <input id="admPrdBrdInp" type="text" placeholder="Sony" name="admPrdBrdInp">
                                        <div class="fieldErrors">
                                            <p id="admPrdBrdInpError" class="error-message">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="admin-products-input-container">
                                        <label for="admPrdCat"><small class="asterisk">*</small>Product Category</label>
                                        <select name="admPrdCat" id="admPrdCat">
                                            <option value="" disabled selected>Select an Option</option>
                                            <option value="1">Video Games</option>
                                            <option value="2">Laptops & Computers</option>
                                            <option value="3">Consoles & Handheld Devices</option>
                                            <option value="4">Computer Components</option>
                                            <option value="5">Apparel & Clothing</option>
                                            <option value="6">Footwear & Shoes</option>
                                            <option value="7">Cameras & Lens</option>
                                        </select>

                                        <div class="fieldErrors">
                                            <p id="admPrdCatError" class="error-message">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="admin-products-input-container">
                                        <label for="admPrdDesc"><small class="asterisk">*</small>Product Description :
                                        </label>
                                        <textarea name="admPrdDesc" id="admPrdDesc" type="text" placeholder="Detailed item information"></textarea>
                                        <div class="fieldErrors">
                                            <p id="admPrdDescError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="admin-products-submit-container">
                                    <button class="admin-products-submit-container-submit" type="submit">Add</button>
                                    <span class="modal-close" data-modal-id="addProduct">Cancel</span>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stocks</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Is new item</th>
                            <th>Date Added</th>
                            <th>Added By</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productData as $product) {
                            $images = explode(",", $product['image_urls']) ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['product_id']) ?></td>
                                <td><img src="<?php echo htmlspecialchars($images[0]) ?>" alt="<?php echo htmlspecialchars($product['product_name']) ?>">
                                </td>
                                <td><?php echo htmlspecialchars($product['product_name']) ?></td>
                                <td>
                                    <pre><?php echo htmlspecialchars($product['product_description']) ?></pre>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['product_price']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['product_stocks']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['product_brand']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['category_name']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['is_new_item']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['added_date']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['user_name']) ?>
                                </td>
                                <td>Live View/Update/Delete</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!--New Product-->


            </div>

            <div class="admin-products-table-container">
                <div class="admin-products-table-header">
                    <h3>New Items</h3>
                    <input type="text" placeholder="Search..">
                    <button>Add Categories</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Is New</th>
                            <th>Date Added</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($new_products as $product) {
                            $images = explode(",", $product['image_urls']) ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['product_id']) ?></td>
                                <td><img src="<?php echo htmlspecialchars($images[0]) ?>" alt="<?php echo htmlspecialchars($product['product_name']) ?>">
                                </td>
                                <td><?php echo htmlspecialchars($product['product_name']) ?></td>

                                <td>
                                    <?php echo htmlspecialchars($product['is_new_item']) ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($product['added_date']) ?>
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
<script src="js/adminProductInputStock.js"></script>
<script src="js/generalModal.js"></script>

</html>