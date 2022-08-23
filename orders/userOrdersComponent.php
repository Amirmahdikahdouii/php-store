<?php
require_once "../settings/dbconfig.php";
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_login'])) {
    header("Location: /php-store/Accounts/login.php");
}
$userID = intval($_SESSION['user_id']);
$userHaveOrder = false;
$sql = "SELECT * FROM user_orders WHERE user_id='$userID'";
$userOrders = mysqli_query($db_connection, $sql);
$userOrders = mysqli_fetch_all($userOrders, MYSQLI_ASSOC);
if (count($userOrders) > 0) {
    $userHaveOrder = true;
}
?>
<div class="main-section-content-container" id="main-section-content-container-orders">
    <h1 class="main-section-content-title">Orders</h1>
    <?php
    if ($userHaveOrder) {
    ?>
        <div class="factors-container">
            <?php
            for ($i = 0; $i < count($userOrders); $i++) {
                $orderID = intval($userOrders[$i]['id']);
                $sql = "SELECT * FROM user_orders_item WHERE order_id='$orderID'";
                $orderItems = mysqli_query($db_connection, $sql);
                $orderItems = mysqli_fetch_all($orderItems, MYSQLI_ASSOC);
            ?>
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Order Item <?= $i + 1 ?></h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date"><?= $userOrders[$i]['date'] ?></span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container orders-item-according-container">
                        <?php
                        $orderTotalPrice = 0;
                        for ($productIndex = 0; $productIndex < count($orderItems); $productIndex++) {
                            $orderTotalPrice += (floatval($orderItems[$productIndex]['unit_price']) * intval($orderItems[$productIndex]['count']));
                            $orderProductID = intval($orderItems[$productIndex]['product_id']);
                            $sqlToGetOrderProduct = "SELECT * FROM `product` WHERE id='$orderProductID'";
                            $orderProduct = mysqli_query($db_connection, $sqlToGetOrderProduct);
                            $orderProduct = mysqli_fetch_assoc($orderProduct);
                        ?>
                            <div class="orders-item-according-product">
                                <div class="factor-item-according-line orders-item-according-line-header">
                                    <div class="orders-item-according-line-title-container">
                                        <h4 class="factor-item-according-line-title orders-item-according-line-title"><?= $orderProduct['name'] ?></h4>
                                        <a href="/php-store/products/product.php?id=<?= $orderProduct['id'] ?>" class="orders-see-product-bottom"><?= $orderProduct['name'] ?></a>
                                    </div>
                                    <div class="orders-item-according-line-image-container center">
                                        <img class="orders-item-according-line-image" src="/php-store/media/product-image/<?= $orderProduct['image'] ?>" alt="<?= $orderProduct['name'] ?>" />
                                    </div>
                                </div>
                                <div class="factor-item-according-line orders-item-according-line">
                                    <span class="factor-item-according-line-title">Unit Price</span>
                                    <span class="factor-item-according-line-value">
                                        <i class="bi bi-currency-dollar"></i>
                                        <?= number_format(floatval($orderItems[$productIndex]['unit_price']), 2) ?>
                                    </span>
                                </div>

                                <div class="factor-item-according-line orders-item-according-line">
                                    <span class="factor-item-according-line-title">Count</span>
                                    <span class="factor-item-according-line-value"><?= $orderItems[$productIndex]['count'] ?></span>
                                </div>
                                <div class="factor-item-according-line orders-item-according-line">
                                    <span class="factor-item-according-line-title">Price</span>
                                    <span class="factor-item-according-line-value">
                                        <i class="bi bi-currency-dollar"></i>
                                        <?= number_format(intval($orderItems[$productIndex]['count']) * floatval($orderItems[$productIndex]['unit_price']), 2) ?>
                                    </span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">Total Price</span>
                            <span class="factor-item-according-line-value">
                                <i class="bi bi-currency-dollar"></i>
                                <?= number_format($orderTotalPrice, 2) ?>
                            </span>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">State</span>
                            <span class="factor-item-according-line-value">
                                <?php
                                $userOrderState = intval($userOrders[$i]['state']);
                                if ($userOrderState === 0) {
                                    echo "Awaiting For pay";
                                } else if ($userOrderState === 1) {
                                    echo "Preparing";
                                } else if ($userOrderState === 2) {
                                    echo "Post to Delivery";
                                } else if ($userOrderState === 3) {
                                    echo "Receive By User";
                                } else {
                                    echo "Canceled";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>