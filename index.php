<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./static/css/style.css">
    <?php
    include_once "./components/header-footer-style.php";
    ?>
</head>

<body>
    <?php
    include_once "./settings/dbconfig.php";
    include_once "./components/header.php";
    include_once "./components/alertMessage.php";
    $sql = "SELECT * FROM `home-page-setions` WHERE is_active='1' LIMIT 1";
    $result = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_assoc($result);
    if ($result !== null) {
    ?>
        <section class="section-our-story">
            <div class="our-story-image">
                <img src="./media/home/img/<?= $result['image'] ?>" width="100%" alt="<?= $result['main-title'] ?>" />
            </div>
            <div class="our-story-description">
                <h1 class="our-story-description-title">
                    <?= $result['little-title'] ?>
                </h1>
                <h1 class="our-story-description-title our-story-description-title-2">
                    <?= $result['main-title'] ?>
                </h1>
                <p class="our-story-description-text">
                    <?= $result['text'] ?>
                </p>
                <p class="our-story-description-text our-story-description-text-mobile">
                    <?= substr($result['main-title'], 0, 100) . "..." ?>
                </p>
                <?php if ($result['button_text'] !== "" and $result['button_link'] !== "") {
                ?>
                    <div class="our-menu-button-container">
                        <a class="header-main-button our-menu-button" href="<?= $result['button_link'] ?>"><?= $result['button_text'] ?></a>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
    <?php } ?>

    <!-- Our Commitments Section -->
    <section class="our-commitment-section">
        <?php
        $sql = "SELECT * FROM home_commitments_info ORDER BY id DESC LIMIT 3";
        $ourCommitmentsResult = mysqli_query($db_connection, $sql);
        $ourCommitmentsResult = mysqli_fetch_all($ourCommitmentsResult, MYSQLI_ASSOC);
        foreach ($ourCommitmentsResult as $index => $commitmentsRow) {
        ?>
            <div class="our-commitment-item">
                <div class="our-commitment-icon">
                    <?php
                    if ($index === 0) {
                        echo '<i class="bi bi-bag-check"></i>';
                    } else if ($index === 1) {
                        echo '<i class="bi bi-cup"></i>';
                    } else {
                        echo '<i class="bi bi-truck"></i>';
                    }
                    ?>
                </div>
                <h1 class="our-commitment-title"><?= $commitmentsRow['title'] ?></h1>
                <p class="our-commitment-text">
                    <?= $commitmentsRow['text'] ?>
                </p>
            </div>
        <?php
        }
        ?>
    </section>
    <?php
    $sql = "SELECT * FROM `home-page-setions` WHERE is_active='1' AND id='2' LIMIT 1";
    $result = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_assoc($result);
    if ($result !== null) {
    ?>
        <section class="our-menu-section">
            <div class="our-menu-image-container">
                <img src="./media/home/img/<?= $result['image'] ?>" alt="<?= $result['main-title'] ?>" />
            </div>
            <div class="our-menu-description">
                <h1 class="our-story-description-title">
                    <?= $result['little-title'] ?>
                </h1>
                <h1 class="our-story-description-title our-story-description-title-2">
                    <?= $result['main-title'] ?>
                </h1>
                <p class="our-story-description-text">
                    <?= $result['text'] ?>
                </p>
                <p class="our-story-description-text our-story-description-text-mobile">
                    <?= substr($result['main-title'], 0, 100) . "..." ?>
                </p>

                <?php if ($result['button_text'] !== "" and $result['button_link'] !== "") {
                ?>
                    <div class="our-menu-button-container">
                        <a class="header-main-button our-menu-button" href="<?= $result['button_link'] ?>"><?= $result['button_text'] ?></a>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
    <?php } ?>

    <!-- TODO: work with DATABASE for this section and get data from database -->
    <section class="book-table-section">
        <div class="book-table-image-container">
            <img src="./static/img/coffe-table.jpg" alt="OUR-TABLE" width="100%" />
        </div>

        <div class="book-table-container">
            <form action="" method="post" class="book-table-form">
                <div class="row">
                    <div class="col-7 col-3">
                        <label for="name" class="book-table-form-label">Name:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-7 col-3">
                        <label for="last-name" class="book-table-form-label">Last Name:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="lastName" id="last-name" placeholder="Enter Your Last Name" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-7 col-3">
                        <label for="date" class="book-table-form-label">Date:</label>
                    </div>
                    <div class="col-7">
                        <input type="date" name="date" id="date" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-7 col-3">
                        <label for="time" class="book-table-form-label">Time:</label>
                    </div>
                    <div class="col-7">
                        <input list="browsers" name="browser" id="browser" placeholder="Choose ...">
                        <datalist id="browsers">
                            <option value="8:00 AM">
                            <option value="8:30 AM">
                            <option value="9:00 AM">
                            <option value="9:30 AM">
                            <option value="10:00 AM">
                            <option value="10:30 AM">
                            <option value="11:00 AM">
                            <option value="11:30 AM">
                            <option value="12:00 AM">
                            <option value="12:30 AM">
                            <option value="1:00 PM">
                            <option value="1:30 PM">
                            <option value="2:00 PM">
                            <option value="2:30 PM">
                            <option value="3:00 PM">
                            <option value="3:30 PM">
                            <option value="4:00 PM">
                            <option value="5:00 PM">
                            <option value="6:00 PM">
                            <option value="7:00 PM">
                            <option value="8:00 PM">
                            <option value="9:00 PM">
                            <option value="10:00 PM">
                        </datalist>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7 col-3">
                        <label for="phone" class="book-table-form-label">Phone:</label>
                    </div>
                    <div class="col-7">
                        <input type="tel" name="phone" id="phone" placeholder="Enter Your Number" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-7 col-3">
                        <label for="message" class="book-table-form-label">Message:</label>
                    </div>
                    <div class="col-7">
                        <textarea name="message" id="message" placeholder="Message"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button" class="book-table-button">Book</button>
                    </div>
                </div>

            </form>
        </div>

    </section>

    <section class="best-coffe-sellers-section">
        <?php
        $sql = "SELECT * FROM home_best_coffee_seller ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
        ?>
        <div class="best-coffe-seller-header">
            <h1 class="best-coffe-seller-header-title"><?= $result['main_title'] ?></h1>
            <h1 class="best-coffe-seller-header-title"><?= $result['title'] ?></h1>
            <p class="best-coffe-seller-header-text">
                <?= $result['text'] ?>
            </p>
        </div>
        <div class="best-coffe-seller-footer">
            <?php
            $sql = "SELECT * FROM `product` WHERE is_active='1' ORDER BY viewCount DESC LIMIT 4";
            $products = mysqli_query($db_connection, $sql);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            foreach ($products as $index => $product) {
            ?>
                <div class="best-coffe-seller-footer-item">
                    <a href="./products/product.php?id=<?= $product['id'] ?>" class="best-coffe-seller-item-image">
                        <img src="./media/product-image/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
                    </a>
                    <a href="./products/product.php?id=<?= $product['id'] ?>" class="best-coffe-seller-item-title"><?= $product['name'] ?></a>
                    <p class="best-coffe-seller-item-text"></p>
                    <?php
                    if (intval($product['have_price_with_off'])) {
                        $productId = intval($product['id']);
                        $sqlToSelectOffPrice = "SELECT * FROM `product_with_off_prices` WHERE product_id='$productId'";
                        $selectOffPrice = mysqli_query($db_connection, $sqlToSelectOffPrice);
                        $selectOffPrice = mysqli_fetch_assoc($selectOffPrice);
                    ?>
                        <span class="menu-item-old-price">
                            <i class="bi bi-currency-dollar"></i>
                            <?= number_format($product['price'], 2) ?>
                        </span>
                        <span class="menu-item-price">
                            <i class="bi bi-currency-dollar"></i>
                            <?= number_format($selectOffPrice['new_price'], 2) ?>
                        </span>
                    <?php } else { ?>
                        <span class="menu-item-price">
                            <i class="bi bi-currency-dollar"></i>
                            <?= number_format($product['price'], 2) ?>
                        </span>
                    <?php } ?>
                    <div class="best-coffe-seller-item-button-container">
                        <button class="best-coffe-seller-item-button" onclick="addToCartButton(<?= $product['id'] ?>)">Add To Cart</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="image-gallery-section">
        <?php
        $sql = "SELECT * FROM `home-image-gallery` ORDER BY RAND() LIMIT 4";
        $images = mysqli_query($db_connection, $sql);
        $images = mysqli_fetch_all($images, MYSQLI_ASSOC);
        foreach ($images as $rowIndex => $image) {
        ?>
            <div class="image-gallery-item">
                <img src="/php-store/media/home/img/<?= $image['image'] ?>" alt="<?= $image['title'] ?>" class="img-of-image-gallery" />
            </div>
        <?php } ?>
    </section>

    <section class="our-full-menu-section">
        <div class="our-full-menu-header-container">
            <h1 class="our-full-menu-header-title">Our Menu</h1>
            <p class="our-full-menu-header-description">Check Our Products !</p>
            <?php
            $sql = "SELECT * FROM `product_subcategory` ORDER BY RAND() LIMIT 4";
            $productCategories = mysqli_query($db_connection, $sql);
            $productCategories = mysqli_fetch_all($productCategories, MYSQLI_ASSOC);
            $productCategoriesId = array();
            ?>
            <div class="our-full-menu-header-button-container">
                <?php
                for ($i = 0; $i < count($productCategories); $i++) {
                ?>
                    <button class="our-full-menu-header-button <?php if ($i == 0) echo 'our-full-menu-header-button-active'; ?>" onclick="menuShow(<?= $i + 1 ?>)"><?= $productCategories[$i]['name'] ?></button>
                <?php
                    $productCategoriesId[$i] = intval($productCategories[$i]['id']);
                }
                ?>
            </div>
        </div>
        <div class="our-full-menu-body-container">
            <?php
            for ($i = 0; $i < count($productCategoriesId); $i++) {
                $productCategoryId = $productCategoriesId[$i];
                $sql = "SELECT * FROM `product` WHERE is_active='1' AND category_id='$productCategoryId' LIMIT 6";
                $categoryProducts = mysqli_query($db_connection, $sql);
                $categoryProducts = mysqli_fetch_all($categoryProducts, MYSQLI_ASSOC);
            ?>
                <div class="our-full-menu-items-container <?php if ($i === 0) echo 'our-full-menu-items-container-active'; ?>">
                    <?php
                    foreach ($categoryProducts as $productIndex => $product) {
                    ?>
                        <div class="menu-item-container">
                            <a href="./products/product.php?id=<?= $product['id'] ?>" class="center menu-item-image-container">
                                <img src="./media/product-image/<?= $product['image'] ?>" class="menu-item-image" />
                            </a>
                            <div class="menu-item-title-container">
                                <a href="./products/product.php?id=<?= $product['id'] ?>" class="menu-item-title"><?= $product['name'] ?></a>
                                <div class="menu-item-price-container">
                                    <div class="menu-item-prices">
                                        <?php
                                        if (intval($product['have_price_with_off'])) {
                                            $productId = intval($product['id']);
                                            $sqlToSelectOffPrice = "SELECT * FROM `product_with_off_prices` WHERE product_id='$productId'";
                                            $selectOffPrice = mysqli_query($db_connection, $sqlToSelectOffPrice);
                                            $selectOffPrice = mysqli_fetch_assoc($selectOffPrice);
                                        ?>
                                            <span class="menu-item-old-price">
                                                <i class="bi bi-currency-dollar"></i>
                                                <?= number_format($product['price'], 2) ?>
                                            </span>
                                            <span class="menu-item-price">
                                                <i class="bi bi-currency-dollar"></i>
                                                <?= number_format($selectOffPrice['new_price'], 2) ?>
                                            </span>
                                        <?php } else { ?>
                                            <span class="menu-item-price">
                                                <i class="bi bi-currency-dollar"></i>
                                                <?= number_format($product['price'], 2) ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    if (intval($product['have_price_with_off'])) {
                                        $offPricePercent = ((floatval($product['price']) - floatval($selectOffPrice['new_price'])) * 100) / floatval($product['price']);
                                        $offPricePercent = number_format($offPricePercent, 1);
                                    ?>
                                        <span class="menu-item-price-off center"><?= $offPricePercent ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="menu-item-buttons-container">
                                <button class="menu-item-add-to-cart-button" onclick="addToCartButton(<?= $product['id'] ?>)">Add to cart</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="full-menu-load-more-button-container">
                <a href="./products/menu.php?p=1" class="full-menu-load-more-button">More</a>
            </div>
        </div>
    </section>

    <?php
    include_once "./components/footer.php";
    include_once "./components/mainScript.php";
    ?>
    <script src="./static/js/script.js"></script>

</body>

</html>