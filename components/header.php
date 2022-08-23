<header class="header">
    <div class="header-background"></div>
    <div class="header-menu-background">
        <nav class="header-nav-container">
            <div class="logo">
                <span>Coffee Shop</span>
                <i class="bi bi-list" id="header-nav-menu-icon"></i>
                <i class="bi bi-x-lg" id="header-nav-menu-close-icon"></i>
            </div>
            <!-- Header Menu List -->
            <ul class="header-menu" id="header-menu-id">
                <li class="header-menu-item"><a href="/php-store/index.php">Home</a></li>
                <li class="header-menu-item"><a href="/php-store/products/menu.php">Menu</a></li>
                <li class="header-menu-item"><a href="/php-store/pages/blog.html">Blog</a></li>
                <?php
                session_start();
                if (isset($_SESSION['user_login'])) {
                ?>
                    <li class="header-menu-item"><a href="/php-store/Accounts/dashboard.php">Dashboard</a></li>
                <?php
                } else {
                ?>
                    <li class="header-menu-item"><a href="/php-store/Accounts/login.php">Account</a></li>
                <?php
                }
                ?>
                <li class="header-menu-item"><a href="/php-store/pages/about-us.html">About</a></li>
                <li class="header-menu-item"><a href="/php-store/pages/contact-us.html">Contact</a></li>
                <?php
                if (isset($_SESSION['user_login'])) {
                ?>
                    <li class="header-menu-item">
                        <a href="/php-store/cart/cart.php">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <?php
    if ($_SERVER["PHP_SELF"] === "/php-store/index.php") {
        include_once "./settings/dbconfig.php";
        $sql = "SELECT * FROM `index_header_content_container` WHERE is_active='1'";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
        if ($result !== null) {
    ?>
            <div class="header-main-container">
                <h1 class="welcome">
                    <?= $result['welcome_title'] ?>
                </h1>
                <h1 class="header-main-title">
                    <?= $result['title'] ?>
                </h1>
                <p class="header-main-description">
                    <?= $result['message'] ?>
                </p>
                <div class="header-main-buttons-container">
                    <a class="header-main-button" href="<?= $result['leftButtonLink'] ?>" target="_blank">
                        <?= $result['leftButtonText'] ?>
                    </a>
                    <a class="header-main-button" href="<?= $result['rightButtonLink'] ?>" target="_blank">
                        <?= $result['rightButtonText'] ?>
                    </a>
                </div>
            </div>

            <div class="header-coffeshop-info-container">
                <?php
                $sql = "SELECT * FROM `coffee_shop_info` LIMIT 1";
                $result = mysqli_query($db_connection, $sql);
                $result = mysqli_fetch_assoc($result);
                ?>
                <div class="header-coffeshop-info">
                    <div class="header-coffeshop-info-title">
                        <i class="bi bi-telephone-fill"></i>
                        <span>
                            <?= $result['phone_number'] ?>
                        </span>
                    </div>
                    <!-- fillOut This tag with any message if you want! -->
                    <!-- <p class="header-coffeshop-info-description"></p> -->
                </div>
                <div class="header-coffeshop-info">
                    <div class="header-coffeshop-info-title">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>
                            <?= $result['address'] ?>
                        </span>
                    </div>
                    <!-- fillOut This tag with any message if you want! -->
                    <!-- <p class="header-coffeshop-info-description"></p> -->
                </div>

                <div class="header-coffeshop-info">
                    <div class="header-coffeshop-info-title">
                        <i class="bi bi-clock-fill"></i>
                        <span>
                            <?= $result['work_time'] ?>
                        </span>
                    </div>
                </div>

            </div>
    <?php
        }
    }
    ?>
</header>