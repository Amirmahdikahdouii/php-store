<?php
// TODO: Pagination and select by category should be add
session_start();
include_once "../settings/dbconfig.php";
$productCountInPage = 9;
if (isset($_GET["p"])) {
    $pageNumber = intval($_GET["p"]);
    $sql = "SELECT COUNT(*) FROM `product`";
    $countOfProducts = mysqli_query($db_connection, $sql);
    $countOfProducts = mysqli_fetch_assoc($countOfProducts);
    $countOfProducts = intval($countOfProducts["COUNT(*)"]);
    if ($pageNumber <= 0 || (($productCountInPage * ($pageNumber - 1)) > $countOfProducts)) {
        $pageNumber = 1;
    }
} else {
    $pageNumber = 1;
    $sql = "SELECT COUNT(*) FROM `product`";
    $countOfProducts = mysqli_query($db_connection, $sql);
    $countOfProducts = mysqli_fetch_assoc($countOfProducts);
    $countOfProducts = intval($countOfProducts["COUNT(*)"]);
    if (($productCountInPage * ($pageNumber - 1)) > $countOfProducts) {
        $pageNumber = 1;
    }
}
$limitProduct = $pageNumber *  $productCountInPage;
$beginNumber = ($pageNumber - 1) *  $productCountInPage;
$sql = "SELECT * FROM `product` WHERE is_active='1' ORDER BY viewCount LIMIT $limitProduct  OFFSET $beginNumber";
$result = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Header-Footer-Icon Css Style Links  -->
    <?php
    include_once "../components/header-footer-style.php"
    ?>
    <link rel="stylesheet" href="../static/css/products/menu.css" />
</head>

<body>
    <!-- Header Component -->
    <?php
    include_once "../components/header.php"
    ?>

    <section class="main-container">
        <?php
        // Include The Alert Message Container
        include_once "../components/alertMessage.php";
        ?>
        <?php
        for ($i = 0; $i < count($result); $i++) {
        ?>
            <div class="menu-item-container">
                <div class="center menu-item-image-container">
                    <img src="../media/product-image/<?= $result[$i]["image"] ?>" width="100%" height="100%" class="menu-item-image" />
                </div>
                <div class="menu-item-title-container">
                    <a href="./product.php?id=<?= $result[$i]["id"] ?>" class="menu-item-title"><?= $result[$i]["name"] ?></a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <?php
                            if ($result[$i]["have_price_with_off"]) {
                                $productId = $result[$i]["id"];
                                $offPriceSql = "SELECT * FROM product_with_off_prices WHERE product_id='$productId'";
                                $offPriceResult = mysqli_query($db_connection, $offPriceSql);
                                $offPriceResult = mysqli_fetch_assoc($offPriceResult);
                            ?>
                                <span class="menu-item-old-price">
                                    <i class="bi bi-currency-dollar"></i>
                                    <?= number_format($result[$i]["price"], 2) ?>
                                </span>
                                <span class="menu-item-price">
                                    <i class="bi bi-currency-dollar"></i>
                                    <?= number_format((float)$offPriceResult["new_price"], 2, ".", "") ?>
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="menu-item-price">
                                    <i class="bi bi-currency-dollar"></i>
                                    <?= number_format((float)$result[$i]["price"], 2, ".", "") ?>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <span class="menu-item-add-to-cart-button" onclick="addToCartButton(<?= $result[$i]["id"] ?>)">Add to cart</span>
                    <?php
                    if (isset($_SESSION['user_admin'])) {
                        $userAdmin = $_SESSION['user_admin'];
                    } else {
                        $userAdmin = false;
                    }
                    if ($userAdmin) {
                    ?>
                        <span class="menu-item-add-to-cart-button menu-item-update-product-button" productId="<?= $result[$i]['id'] ?>">Update</span>
                    <?php } ?>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <div class="page-counter-container">
        <?php
        for ($i = 1; $i <= ceil($countOfProducts / $productCountInPage); $i++) {
        ?>
            <a href="./menu.php?p=<?= $i ?>" class="center page-counter-link <?php if ($pageNumber === $i) echo 'page-counter-link-active'; ?>"><?= $i ?></a>
        <?php } ?>
    </div>
    <?php
    if ($userAdmin) {
    ?>
        <!-- Update Product Admin Section -->
        <div class="update-product-modal-container">
            <div class="update-modal-form-container">
                <i class="bi bi-x-lg" id="close-update-product-modal"></i>
                <input type="text" id="update-product-name" class="update-product-fields-input" />
                <input type="text" id="update-product-price" class="update-product-fields-input" />
                <input type="text" id="update-product-count" class="update-product-fields-input" />
                <label for="update-product-off-price" class="update-product-fields-label">
                    <span>Off Price:</span>
                    <input type="checkbox" id="update-product-off-price" class="update-product-fields-input" />
                </label>
                <label for="update-product-active" class="update-product-fields-label">
                    <span>Active:</span>
                    <input type="checkbox" id="update-product-active" class="update-product-fields-input" />
                </label>
                <div class="update-product-fields-buttons-container">
                    <button class="update-product-button delete-product-button" id="close-update-modal-button">Close</button>
                    <button class="update-product-button" id="update-product-info-button">Update</button>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    // Include the footer component
    include_once "../components/footer.php";

    // Include The Main Scripts Files
    include_once "../components/mainScript.php";
    ?>
    <script src="../static/js/products/menu.js"></script>
</body>

</html>