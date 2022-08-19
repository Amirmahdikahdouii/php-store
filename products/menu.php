<?php
include_once "../settings/dbconfig.php";
$sql = "SELECT * FROM `product` WHERE is_active='1'";
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
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <?php
    // Include the footer component
    include_once "../components/footer.php";

    // Include The Main Scripts Files
    include_once "../components/mainScript.php";
    ?>
    <script src="../static/js/products/menu.js"></script>
</body>

</html>