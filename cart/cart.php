<!DOCTYPE html>
<html lang="en">
<?php
include_once '../settings/dbconfig.php';
session_start();
// Select User Cart
// $user_id = intval($_SESSION["user_id"]);
$user_id = 2;
$sql = "SELECT * FROM cart WHERE user_id='$user_id'";
$result = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_assoc($result);

// Select Cart Products
$cart_id = $result['id'];
$sql = "SELECT * FROM cart_products WHERE cart_id='$cart_id'";
$result = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    ?>

    <section class="main-container">
        <aside class="aside-checkout-container">
            <div class="items-sum-full-price-container">
                <span class="items-sum-full-price-title">Products Price<span>(3)</span></span>
                <span class="items-sum-full-price">525.00 $</span>
            </div>
            <div class="items-sum-full-price-container">
                <span class="items-sum-price-title">Products Price</span>
                <span class="items-sum-price">500.00 $</span>
            </div>
            <div class="items-sum-full-price-container">
                <span class="shopping-prices-procedure">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                    deleniti mollitia cumque.</span>
            </div>
            <div class="items-sum-full-price-container">
                <span class="items-sum-off-price-title">Products Off</span>
                <span class="items-sum-off-price">25.00 $ <span>(10%)</span></span>
            </div>
            <button class="continue-shopping-button">Continue</button>
        </aside>
        <section class="cart-items-container">
            <?php
            for ($i = 0; $i < sizeof($result); $i++) {
                $productID = intval($result[$i]["product_id"]);
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
                        <div class="cart-list-item-count-container center">
                            <button class="cart-list-item-delete-button center">
                                <i class="bi bi-trash"></i>
                            </button>
                            <button class="cart-list-item-mines-button center">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                            <span class="cart-list-item-count center"><?= $result[$i]['count']; ?></span>
                            <button class="cart-list-item-plus-button center">
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
                            <span class="cart-list-item-price">
                                <i class="bi bi-currency-dollar"></i>
                                <?= number_format($result[$i]['count'] * $product['price'], 2) ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
    </section>

    <?php
    include_once "../components/footer.php";
    include_once "../components/mainScript.php";
    ?>
    <script src="../static/js/cart.js"></script>
</body>

</html>