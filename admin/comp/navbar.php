<?php require_once '../inc/config_session.inc.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link>
</head>

</style>

<body>
    <nav>
        <div class="admin-nav">
            <div id="admNavSidBar" class="admin-nav-side-bar">
                <a href="javascript:void(0)" id="admNavSidBarX" class="closebtn">×</a>
                <a href="index.php">Dashboard</a>
                <a href="admin-users.php">Users</a>
                <a href="#">Products</a>
                <a href="#">Orders</a>
            </div>
            <button id="admNavSidBarBtn" class="openbtn">☰</button>
            <form action="../inc/login/logout.inc.php" method="post">
                <button style="" class="nav-login-register-btn logout">Logout</button>
            </form>
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