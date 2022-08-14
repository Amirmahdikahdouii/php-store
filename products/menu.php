<?php
include_once "../settings/dbconfig.php";
$sql = "SELECT * FROM `product`";
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
    <link rel="stylesheet" href="../static/css/menu.css"/>
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
            <div class="menu-item-image-container">
                <img src="../media/product-image/<?= $result[$i]["image"] ?>" width="100%" height="100%"
                     class="menu-item-image"/>
            </div>
            <div class="menu-item-title-container">
                <a href="./products.html" class="menu-item-title"><?= $result[$i]["name"] ?></a>
                <div class="menu-item-price-container">
                    <div class="menu-item-prices">
                        <?php
                        if ($result[$i]["have_price_with_off"]) {
                            $productId = $result[$i]["id"];
                            $offPriceSql = "SELECT * FROM product_with_off_prices WHERE product_id=$productId";
                            $offPriceResult = mysqli_query($db_connection, $offPriceSql);
                            $offPriceResult = mysqli_fetch_assoc($offPriceResult);
                            ?>
                            <span class="menu-item-old-price">
                                <i class="bi bi-currency-dollar"></i>
                                <?= number_format($result[$i]["price"], 2, ".") ?>
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
<footer class="footer">
    <div class="footer-item">
        <h3 class="footer-item-address-title">Coffee Shop</h3>
        <p class="footer-item-address">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint</p>
        <div class="footer-item-address-info">
            <span class="footer-item-address-info-name">Email:</span>
            <span class="footer-item-address-info-value">Example@info.com</span>
        </div>
        <div class="footer-item-address-info">
            <span class="footer-item-address-info-name">Telephone:</span>
            <span class="footer-item-address-info-value">021 28596</span>
        </div>
        <div class="footer-item-address-info">
            <span class="footer-item-address-info-name">Mobile:</span>
            <span class="footer-item-address-info-value">+98 903 378-2632</span>
        </div>

    </div>
    <div class="footer-item">
        <h3 class="footer-item-address-title">Our Family</h3>
        <div class="footer-item-address-info">
            <a class="footer-item-address-info-name" href="#">coffe.com</a>
        </div>
        <div class="footer-item-address-info">
            <a class="footer-item-address-info-name" href="#">coffeShop.com</a>
        </div>
        <div class="footer-item-address-info">
            <a class="footer-item-address-info-name" href="#">coffe-iran.com</a>
        </div>
        <p class="copyright">Copyright ©2022 All rights reserved | This template is made with
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-heart"
                 viewBox="0 0 16 16">
                <path
                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
                </path>
            </svg>
            by
            <a href="#">Amir Mahdi Kahdouii</a>
        </p>
    </div>
    <div class="footer-item">
        <h3 class="footer-item-address-title">Social Media</h3>
        <div class="footer-item-address-info">
            <span class="footer-item-address-info-name">Follow Us On Social Media</span>
        </div>
        <div class="footer-item-social-media-icons">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                 class="bi bi-facebook" viewBox="0 0 16 16">
                <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                </path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                 class="bi bi-instagram" viewBox="0 0 16 16">
                <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                </path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                 class="bi bi-telegram" viewBox="0 0 16 16">
                <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z">
                </path>
            </svg>
        </div>
    </div>
</footer>
<?php
// Include The Main Scripts Files
include_once "../components/mainScript.php";
?>
<script src="../static/js/products/menu.js"></script>
</body>

</html>