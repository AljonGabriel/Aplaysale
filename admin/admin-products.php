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
                    <div class="admin-products-add-item-modal">
                        <div class="admin-products-modal-content">
                            <form class="admin-products-modal-content-form"
                                action="inc/admin_add_product_handler.inc.php" method="POST">

                                <!--Fieldset Basic Information-->

                                <fieldset class="admin-products-fieldset">
                                    <div class="admin-products-modal-content-form-header">
                                        <h3>Basic Information</h3>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdImg"><small class="asterisk">*</small>Product Image
                                        </label>
                                        <input id="admPrdImg" type="file" accept="image/*" name="admPrdImg[]" multiple
                                            enctype="multipart/form-data">
                                        <div class="fieldErrors">
                                            <p id="admPrdImgError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdNam"><small class="asterisk">*</small>Product Name
                                        </label>
                                        <input id="admPrdNam" type="text" placeholder="Nike Shoes">
                                        <div class="fieldErrors">
                                            <p id="admPrdNamError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdPrc"><small class="asterisk">*</small>Product Price
                                        </label>
                                        <input id="admPrdPrc" type="number" placeholder="599">
                                        <div class="fieldErrors">
                                            <p id="admPrdPrcError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="admin-products-input-container">
                                        <label for="admPrdStk"><small class="asterisk">*</small>Stock
                                        </label>
                                        <select name="admPrdStk" id="admPrdStk">
                                            <option value="singleItem">Single Item Stock</option>
                                            <option value="multipleItem">Multiple Item Stock</option>
                                        </select>
                                        <div class="fieldErrors">
                                            <p id="admPrdStkError" class="error-message">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="admin-products-input-container" id="admPrdMItmContainer"></div>

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
                                        </select>

                                        <div class="fieldErrors">
                                            <p id="admPrdCatError" class="error-message">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="admin-products-input-container">
                                        <label for="admPrdDesc"><small class="asterisk">*</small>Product Description :
                                        </label>
                                        <textarea id="admPrdDesc" type="text"
                                            placeholder="Detailed item information"></textarea>
                                        <div class="fieldErrors">
                                            <p id="admPrdDescError" class="error-message">
                                            </p>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="admin-products-submit-container">
                                    <button class="admin-products-submit-container-submit" type="submit">Add</button>
                                    <button class="admin-products-submit-container-cancel">Cancel</button>
                                </div>

                            </form>
                        </div>

                    </div>

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
<script src="js/adminProductInputStock.js"></script>

</html>