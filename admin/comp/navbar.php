<?php
require_once '../inc/config_session.inc.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin-navbar.css">
    <link>
</head>

</style>

<body>
    <nav>
        <div class="admin-nav">
            <div id="admNavSidBar" class="admin-nav-side-bar">
                <div class="admin-nav-side-bar-header">
                    <h3>Aplaysale</h3>
                </div>
                <a href="javascript:void(0)" id="admNavSidBarX" class="closebtn">×</a>
                <ul>
                    <li class="<?php echo ($page === 'admin-index') ? 'active' : ''; ?>"><i class="fa-solid fa-folder-tree"></i><a class="<?php echo ($page === 'admin-index') ? 'active' : ''; ?>" href="index.php">Dashboard</a></li>
                    <li class="<?php echo ($page === 'admin-users') ? 'active' : ''; ?>"><i class="fa-solid fa-user-plus"></i><a href="admin_users.php" class="<?php echo ($page === 'admin-users') ? 'active' : ''; ?>">Users</a></li>
                    <li class="<?php echo ($page === 'admin-products') ? 'active' : ''; ?>"><i class="fa-solid fa-cookie-bite"></i><a href="admin_products.php" class="<?php echo ($page === 'admin-products') ? 'active' : ''; ?>">Products</a></li>
                    <li><i class="fa-solid fa-border-all"></i><a href="#">Orders</a></li>
                    <li><i class="fa-solid fa-right-from-bracket"></i>
                        <form action="../inc/login/logout.inc.php" method="post">
                            <button style="" class="admin-index-nav-logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <button id="admNavSidBarBtn" class="openbtn">☰</button>
            <a class="admin-nav-go-back-store" href="../index.php">Go back to store</a>

        </div>
    </nav>

    <script>
        const sidebarBtn = document.querySelector("#admNavSidBarBtn")
        const sidebarX = document.querySelector("#admNavSidBarX")

        sidebarBtn.addEventListener("click", () => {
            document.getElementById("admNavSidBar").style.width = "250px";
            document.querySelector("main").style.marginLeft = "250px";
            document.querySelector("main").style.width = "auto";

        });

        sidebarX.addEventListener("click", () => {
            document.getElementById("admNavSidBar").style.width = "0";
            document.querySelector("main").style.marginLeft = "0";
            document.querySelector("main").style.width = "auto";

        })
    </script>

</body>


</html>