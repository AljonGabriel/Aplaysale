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
                            <p>0</p>
                        </div>
                    </div>
                    <div class="admin-grid-item orders">
                        <div class="admin-grid-header">
                            <h2>Orders</h2>
                        </div>
                        <div class="admin-grid-count">
                            <p>0</p>
                        </div>
                    </div>
                    <div class="admin-grid-item sales">
                        <div class="admin-grid-header">
                            <h2>Sales</h2>
                        </div>
                        <div class="admin-grid-count">
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <div class="admin-users-table">
                    <div class="admin-table-header">

                        <h2>Users</h2>
                        <button class="admin-add-user-btn modal-btn" data-modal-id="addUser">Add user</button>
                        <div class="modal" id="addUser">
                            <div class="modal-content">
                                <span class="close" data-modal-id="addUser">&times;</span>
                                <div class="modeal-header">
                                    <h2>Add users</h2>
                                </div>
                                <div class="modal-body">
                                    <p>Body</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <table>
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
                                <td><?php echo htmlspecialchars($userData['role']); ?></td>
                                <td><?php echo htmlspecialchars($userData['created_at']); ?></td>
                                <td> <button class="admin-add-user-btn modal-btn modal-btn"
                                        data-modal-id="updateUser">Update</button>
                                    <div class="modal" id="updateUser">
                                        <div class="modal-content">
                                            <span class="close" data-modal-id="updateUser">&times;</span>
                                            <div class="modeal-header">
                                                <h2>Update this user</h2>
                                            </div>
                                            <div class="modal-body">
                                                <p>Body</p>
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



            </div>
        </div>

    </main>
    <script src="js/modal-array.js"></script>
</body>

</html>