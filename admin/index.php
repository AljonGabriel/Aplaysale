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
    <!--  <link rel="stylesheet" href="styles/admin-index.css"> -->
    <link rel="stylesheet" href="styles/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous" defer></script>
    <title>Admin Page</title>
</head>

<body>
    <?php require_once 'comp/navbar.php'; ?>



    <main class="container-fluid bg-light h-auto">

        <section class="container">
            <div class="row align-items-center text-center">
                <div class="col mx-1 bg-white">
                    <div class="admin-grid-header">
                        <h3>Users</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-users" href="admin-user.php"></i>
                        <p><?php echo ($usersCount !== false) ? htmlspecialchars($usersCount) : "Error getting user count."; ?></p>
                    </div>
                </div>
                <div class="col mx-1 bg-white">
                    <div class="admin-grid-header">
                        <h3>Products</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-laptop"></i>
                        <p><?php echo ($productsCount !== false) ? htmlspecialchars($productsCount) : "Error getting products count."; ?></p>
                    </div>
                </div>
                <div class="col mx-1 bg-white">
                    <div class="admin-grid-header">
                        <h3>Sales</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-piggy-bank"></i>
                        <p>0</p>
                    </div>
                </div>
                <div class="col mx-1 bg-white">
                    <div class="admin-grid-header">
                        <h3>Orders</h3>
                    </div>
                    <div class="admin-grid-count">
                        <i class="fa-solid fa-stamp"></i>
                        <p>0</p>
                    </div>
                </div>
            </div>
        </section>




        <section class="container my-4 p-3 bg-white shadow-sm rounded-2">
            <div class="container ">
                <h4 class="display-5">Products</h3>
                    <input class="form-control my-3" type="text" placeholder="Search..">
                    <p>Edit Products</p>
            </div>
            <div class="overflow-scroll max-height-300">
                <table class="table table-striped table-hover text-center">
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
                                <td><img class="table-img-size" src="<?php echo htmlspecialchars($imgUrls[0]); ?>" alt="<?php echo htmlspecialchars($product['product_name']) ?>">
                                </td>
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

        </section>


        <section class="container my-4 bg-white shadow-sm">
            <div class="admin-index-users-table-header">
                <h3>Users</h3>
                <input type="text" placeholder="Search..">
                <p>Edit Users</p>
            </div>
            <table class="table table-striped table-hover">
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
        </section>


        <div class="container my-4 bg-white shadow-sm">
            <div class="admin-index-products-table-container">
                <div class="admin-index-products-table-header">
                    <h3>User Feedback</h3>
                    <input type="text" placeholder="Search..">
                    <p>Edit Ratings</p>
                </div>
                <table class="table table-striped table-hover">
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





</body>

</html>