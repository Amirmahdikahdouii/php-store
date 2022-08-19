<!DOCTYPE html>
<html lang="en">
<?php
include_once '../settings/dbconfig.php';
session_start();
// Select User Cart if user is login
if (isset($_SESSION['user_id'])) {
    $user_id = intval($_SESSION["user_id"]);
    // Select User Cart
    $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
    $result = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_assoc($result);

    // Make feild if user doesnt have anyone
    if ($result === null) {
        $sql = "INSERT INTO `cart` (user_id) VAlUES ($user_id)";
        $result = mysqli_query($db_connection, $sql);
        $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
    }

    // Select Cart Products
    $cart_id = $result['id'];
    $sql = "SELECT * FROM cart_products WHERE cart_id='$cart_id'";
    $result = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    if (isset($_SESSION["userCart"])) {
        $result = array();
        foreach ($_SESSION["userCart"] as $productID => $productCount) {
            array_push($result, ["product_id" => $productID, "count" => $productCount]);
        }
    } else {
        $result = array();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>cart</title>
    <?php
    include_once "../components/header-footer-style.php";
    ?>
    <link rel="stylesheet" href="../static/css/cart/cart.css">
</head>

<body class="center">
    <?php
    include_once "../components/header.php";
    include_once "../components/alertMessage.php";
    if (count($result) > 0) {
    ?>
        <section class="main-container">
            <section class="cart-items-container">
                <?php
                $allProductPrice = 0;
                $allProductPriceToPay = 0;
                $offPriceSum = 0;
                $countOfAllCartProduct = 0;
                for ($i = 0; $i < sizeof($result); $i++) {
                    $productID = intval($result[$i]["product_id"]);
                    $countOfProduct = intval($result[$i]['count']);
                    $countOfAllCartProduct += $countOfProduct;
                    $sql = "SELECT * FROM `product` WHERE id='$productID'";
                    $product = mysqli_query($db_connection, $sql);
                    $product = mysqli_fetch_assoc($product);
                ?>
                    <div class="cart-list-item">
                        <div class="cart-list-item-image-count-container">
                            <div class="cart-list-item-image-container center">
                                <img src="/php-store/media/product-image/<?= $product['image']; ?>" alt="Coffee" class="cart-list-item-image">
                            </div>
                            <div class="cart-list-item-mobile-product-title-container">
                                <a class="cart-list-item-title" href="/php-store/products/product.php?id=<?= $product["id"] ?>">
                                    <?= $product['name'] ?>
                                </a>
                            </div>
                            <div class="center cart-list-item-count-container">
                                <!-- TODO:Make add, remove and delete product with ajax and by click on buttons -->
                                <button class="center cart-list-item-delete-button <?php if ($countOfProduct === 1) echo 'cart-list-item-button-active' ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <button class="center cart-list-item-mines-button <?php if ($countOfProduct > 1) echo 'cart-list-item-button-active' ?>">
                                    <i class="bi bi-dash-lg"></i>
                                </button>
                                <span class="cart-list-item-count center"><?= $countOfProduct; ?></span>
                                <button class="center cart-list-item-plus-button cart-list-item-button-active">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="cart-list-item-main-section">
                            <a class="cart-list-item-title" href="/php-store/products/product.php?id=<?= $product["id"] ?>">
                                <?= $product['name'] ?>
                            </a>
                            <div class="cart-list-item-sell-info center">
                                <i class="bi bi-shop"></i>
                                <span class="cart-list-item-sell-info-text">BEST SHOP IN TOWN</span>
                            </div>
                            <div class="cart-list-item-sell-info center">
                                <i class="bi bi-award"></i>
                                <span class="cart-list-item-sell-info-text">HIGH QUALITY</span>
                            </div>
                            <div class="cart-list-item-sell-info center">
                                <i class="bi bi-truck"></i>
                                <span class="cart-list-item-sell-info-text">FAST DELIVERY</span>
                            </div>
                            <div class="cart-list-item-sell-info center">
                                <i class="bi bi-check-circle"></i>
                                <span class="cart-list-item-sell-info-text">POPULAR</span>
                            </div>
                            <div class="cart-list-item-price-container">
                                <?php
                                if (intval($product["have_price_with_off"])) {
                                    $sql = "SELECT * FROM `product_with_off_prices` WHERE product_id='$productID' AND is_active='1'";
                                    $priceWithOff = mysqli_query($db_connection, $sql);
                                    $priceWithOff = mysqli_fetch_assoc($priceWithOff);
                                    $priceWithOff = floatval($priceWithOff['new_price']);
                                    $offPriceSum += (floatval(($product['price']) - $priceWithOff) * $countOfProduct);
                                    $allProductPrice += floatval($product['price'] * $countOfProduct);
                                    $allProductPriceToPay += floatval($priceWithOff * $countOfProduct);
                                ?>
                                    <span class="cart-list-item-price-without-off">
                                        <i class="bi bi-currency-dollar"></i>
                                        <?= number_format($countOfProduct * $product['price'], 2) ?>
                                    </span>
                                    <span class="cart-list-item-price">
                                        <i class="bi bi-currency-dollar"></i>
                                        <?= number_format($priceWithOff * $countOfProduct, 2) ?>
                                    </span>
                                <?php
                                } else {
                                    $allProductPrice += floatval($product['price'] * $countOfProduct);
                                    $allProductPriceToPay += floatval($product['price'] * $countOfProduct);
                                ?>
                                    <span class="cart-list-item-price">
                                        <i class="bi bi-currency-dollar"></i>
                                        <?= number_format($countOfProduct * $product['price'], 2) ?>
                                    </span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </section>
            <aside class="aside-checkout-container">
                <div class="items-sum-full-price-container">
                    <span class="items-sum-full-price-title">Products Price<span>(<?= $countOfAllCartProduct ?>)</span></span>
                    <span class="items-sum-full-price">
                        <i class="bi bi-currency-dollar"></i>
                        <?= number_format($allProductPrice, 2) ?>
                    </span>
                </div>
                <div class="items-sum-full-price-container">
                    <span class="items-sum-price-title">Products Price For Pay</span>
                    <span class="items-sum-price">
                        <i class="bi bi-currency-dollar"></i>
                        <?= number_format($allProductPriceToPay, 2) ?>
                    </span>
                </div>
                <div class="items-sum-full-price-container">
                    <span class="shopping-prices-procedure">We Are Here to give our customers the best products!</span>
                </div>
                <div class="items-sum-full-price-container">
                    <span class="items-sum-off-price-title">Products Off</span>
                    <span class="items-sum-off-price">
                        <i class="bi bi-currency-dollar"></i>
                        <?php
                        echo number_format($offPriceSum, 2);
                        $percentOffInAllPrice = ($offPriceSum * 100) / $allProductPrice;
                        ?>
                        <span>(<?= number_format($percentOffInAllPrice, 1) ?>%)</span>
                    </span>
                </div>
                <button class="continue-shopping-button">Continue</button>
            </aside>
        </section>
    <?php
    } else {
    ?>
        <div class="empty-cart-container">
            <h1 class="empty-cart-title">Your Cart Is Empty!</h1>
            <h4 class="empty-cart-message">Please Add Product To your Cart</h4>
            <a href="/php-store/products/menu.php" class="empty-cart-link" target="_blank">Menu</a>
        </div>
    <?php
    }
    include_once "../components/footer.php";
    include_once "../components/mainScript.php";
    ?>
    <script src="../static/js/cart.js"></script>
</body>

</html>