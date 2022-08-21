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
    <!-- TODO: work with DATABASE for this section and get data from database -->
    <section class="our-commitment-section">
        <div class="our-commitment-item">
            <div class="our-commitment-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                </svg>
            </div>
            <h1 class="our-commitment-title">EASY TO ORDER</h1>
            <p class="our-commitment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus hic
                illo, eos veritatis velit corporis.</p>
        </div>

        <div class="our-commitment-item">
            <div class="our-commitment-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cup" viewBox="0 0 16 16">
                    <path d="M1 2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v1h.5A1.5 1.5 0 0 1 16 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-.55a2.5 2.5 0 0 1-2.45 2h-8A2.5 2.5 0 0 1 1 12.5V2zm13 10h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5H14v8zM13 2H2v10.5A1.5 1.5 0 0 0 3.5 14h8a1.5 1.5 0 0 0 1.5-1.5V2z" />
                </svg>
            </div>
            <h1 class="our-commitment-title">HIGH QUALITY</h1>
            <p class="our-commitment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus hic
                illo, eos veritatis velit corporis.</p>
        </div>

        <div class="our-commitment-item">
            <div class="our-commitment-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                </svg>
            </div>
            <h1 class="our-commitment-title">FAST DELIVERY</h1>
            <p class="our-commitment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus hic
                illo, eos veritatis velit corporis.</p>
        </div>

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
        <!-- TODO: work with DATABASE for this section and get data from database -->
        <div class="best-coffe-seller-header">
            <h1 class="best-coffe-seller-header-title">Discover</h1>
            <h1 class="best-coffe-seller-header-title">BEST COFFE SELLER</h1>
            <p class="best-coffe-seller-header-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia
                asperiores suscipit nesciunt, in perspiciatis sunt. Ab consectetur pariatur quod a, ullam iusto magnam
                in consequuntur?</p>
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
                    <span class="best-coffe-seller-item-title">
                        <i class="bi bi-currency-dollar"></i>
                        <?= number_format($product['price'], 2) ?>
                    </span>
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