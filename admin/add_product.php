<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <nav>
        <?php require_once "comp/navbar.php"; ?>
    </nav>
    <main>
        <div class="admin-add-product">
            <div class="admin-add-product-container">
                <form action="inc/admin_add_product_handler.inc.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <div class="admin-add-product-input-container">
                            <label for="admAddProImgInp">Product image :</label>
                            <input id="admAddProImgInp" type="file" class="admin-add-prod-input" accept="image/*"
                                name="admAddProImgInp[]" multiple enctype="multipart/form-data">

                            <div class="fieldErrors">
                                <p class="error-message" id="admAddProImgInpError" class="error-message"></p>
                            </div>
                        </div>
                        <div class="admin-add-product-input-container">
                            <label for="admAddProNamInp">Product name :</label>
                            <input id="admAddProNamInp" type="text" class="admin-add-prod-input" name="admAddProNamInp">
                            <div class="fieldErrors">
                                <p class="error-message" id="admAddProNamInpError" class="error-message"></p>
                            </div>

                        </div>
                        <div class="admin-add-product-input-container">
                            <label for="admAddProPriInp">Product price :</label>
                            <input id="admAddProPriInp" type="text" class="admin-add-prod-input" name="admAddProPriInp">
                            <div class="fieldErrors">
                                <p class="error-message" id="admAddProPriInpError" class="error-message"></p>
                            </div>

                        </div>
                        <div class="admin-add-product-input-container">
                            <label for="admAddProCatSel">Product category :</label>
                            <select name="admAddProCatSel" id="admAddProCatSel">
                                <option value="" selected disabled>Select Category</option>
                                <option value="1">Electronics</option>
                                <option value="2">Clothing & Fashion</option>
                                <option value="3">Books & Stationery</option>
                                <option value="4">Beauty & Personal Care</option>
                                <option value="5">Toys & Games</option>
                                <option value="6">Food & Groceries</option>
                                <option value="7">Health & Wellness</option>
                                <option value="8">Jewelry & Watches</option>
                            </select>
                            <div class="fieldErrors">
                                <p class="error-message" id="admAddProCatSelError" class="error-message"></p>
                            </div>
                        </div>
                        <div class="admin-add-product-input-container">
                            <label for="admAddProDesTex">Product description :</label>
                            <textarea id="admAddProDesTex" name="admAddProDesTex" rows="5" cols="40"></textarea>
                            <div class="fieldErrors">
                                <p class="error-message" id="admAddProDesTexError" class="error-message"></p>
                            </div>
                        </div>

                        <div class="admin-add-product-button-container">
                            <button class="admin-add-product-submit" type="submit">Submit</button>
                        </div>
                    </fieldset>

                </form>

            </div>
        </div>
    </main>

</body>

</html>