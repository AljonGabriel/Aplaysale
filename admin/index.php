<?php 
$page = 'admin';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-5Vc5aZBb7rOVLAg8H5fvLvNlGOA9KzVfUJAzGgdfB7fy8Mv0759V2n2a0r4Pk9rN" crossorigin="anonymous">

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
                            <i class="fa-regular fa-user"></i>
                        </div>
                    </div>
                    <div class="admin-grid-item products">
                        <div class="admin-grid-header">
                            <h2>Products</h2>
                        </div>
                    </div>
                    <div class="admin-grid-item orders">
                        <div class="admin-grid-header">
                            <h2>Orders</h2>
                        </div>
                    </div>
                    <div class="admin-grid-item sales">
                        <div class="admin-grid-header">
                            <h2>Sales</h2>
                        </div>
                    </div>
                </div>
                <div class="admin-users-table">
                    <div class="admin-users-table-header">
                        <h2>Users Table</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Savings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>$80</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>$80</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>$80</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>$80</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Sum</td>
                                <td>$180</td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
        </div>

    </main>

</body>

</html>