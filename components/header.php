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
                <li class="header-menu-item"><a href="pages/blog.html">Blog</a></li>
                <li class="header-menu-item"><a href="/php-store/Accounts/login.php">Account</a></li>
                <li class="header-menu-item"><a href="pages/about-us.html">About</a></li>
                <li class="header-menu-item"><a href="pages/contact-us.html">Contact</a></li>
                <li class="header-menu-item">
                    <a href="pages/cart.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
    if (pathinfo($_SERVER["PHP_SELF"])["basename"] === "index.php") {
        ?>
        <div class="header-main-container">
            <h1 class="welcome">Welcome</h1>
            <h1 class="header-main-title">THE BEST COFFE TASTE AND EXPERIENCE!</h1>
            <p class="header-main-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo eius
                accusantium quibusdam unde cupiditate </p>
            <div class="header-main-buttons-container">
                <button class="header-main-button">Order Now</button>
                <button class="header-main-button">View Menu</button>
            </div>
        </div>

        <div class="header-coffeshop-info-container">

            <div class="header-coffeshop-info">
                <div class="header-coffeshop-info-title">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+98 903-378 2632</span>
                </div>
                <p class="header-coffeshop-info-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <div class="header-coffeshop-info">
                <div class="header-coffeshop-info-title">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Tehran - Jordan Street</span>
                </div>
                <p class="header-coffeshop-info-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                </p>

            </div>

            <div class="header-coffeshop-info">
                <div class="header-coffeshop-info-title">
                    <i class="bi bi-clock-fill"></i>
                    <span>Open Everyday</span>
                </div>
                <p class="header-coffeshop-info-description">8:00 AM-10:00 PM</p>

            </div>

        </div>
        <?php
    }
    ?>
</header>

