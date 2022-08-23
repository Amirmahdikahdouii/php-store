<?php
include_once '../settings/dbconfig.php';
session_start();
$userId = intval($_SESSION['user_id']);
$sql = "SELECT * FROM account WHERE id='$userId';";
$result = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_assoc($result);
$userEmail = $result['email'];
$userName = $result['name'];
$userFamilyName = $result['family_name'];
$userPhoneNumber = $result['phone_number'];
$userProfileImage = $result['profile_image'];
$userLocation = $result['location'];
$userBirthday = $result['birthday'];
if (isset($_SESSION['user_admin'])) {
    $userAdmin = true;
} else {
    $userAdmin = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <?php
    // Include Style Of header and Footer and main Styles
    include_once "../components/header-footer-style.php";
    ?>
    <link href="/php-store/static/css/accounts/dashboard.css" rel="stylesheet" />
</head>

<body class="center">
    <?php
    include_once "../components/header.php";
    include_once "../components/alertMessage.php";
    ?>
    <section class="main-section">
        <div class="sideBar-menu-container" id="SideBar-menu-container">
            <div class="sideBar-menu-user-profile-photo-container">
                <a class="sideBar-menu-user-profile-photo-exit-botton center" href="./logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                </a>
                <div class="sideBar-menu-user-profile-photo-holder center">
                    <img src="../media/user-profile-pictures/<?= $userProfileImage ?>" alt="User" class="sideBar-menu-user-profile-photo" width="100%" />
                </div>
                <?php
                if ($userName !== null) {
                ?>
                    <h3 class="sideBar-menu-user-profile-photo-username"><?= $userName ?></h3>
                <?php
                } else {
                ?>
                    <h3 class="sideBar-menu-user-profile-photo-username"><?= $userEmail ?></h3>
                <?php
                }
                ?>
            </div>
            <div class="sideBar-menu-items-container center">
                <ul class="sideBar-menu-list">
                    <li class="sideBar-menu-item"><span class="sideBar-menu-item-active" id="dashboard" onclick="showContentHandler('main-section-content-container-dashboard', 'dashboard')">Dashboard</span>
                    </li>
                    <li class="sideBar-menu-item"><span id="cart" onclick="showContentHandler('main-section-content-container-cart', 'cart')">Cart</span>
                    </li>
                    <li class="sideBar-menu-item"><span onclick="showContentHandler('main-section-content-container-factors', 'factors')" id="factors">Factors</span></li>
                    <li class="sideBar-menu-item"><span onclick="showContentHandler('main-section-content-container-orders', 'orders')" id="orders">Orders</span></li>
                    <li class="sideBar-menu-item"><span onclick="showContentHandler('main-section-content-container-addresses', 'addresses')" id="addresses">Addresses</span></li>
                    <li class="sideBar-menu-item"><span onclick="showContentHandler('main-section-content-container-change-personal-info', 'change-personal-info')" id="change-personal-info">Change Personal Info</span></li>
                    <li class="sideBar-menu-item"><span onclick="showContentHandler('main-section-content-container-change-password', 'change-password')" id="change-password">Change Password</span></li>
                    <?php
                    if ($userAdmin) {
                    ?>
                        <li class="sideBar-menu-item"><span onclick="showContentHandler('main-section-content-container-add-new-product-admin', 'admin-add-new-product-button')" id='admin-add-new-product-button'>Add New Product</span></li>
                    <?php
                    }
                    ?>
                    <li class="sideBar-menu-item"><a href="./logout.php">Exit</a></li>
                </ul>
            </div>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-dashboard">
            <h1 class="main-section-content-title">Dashboard</h1>
            <ul class="dashboard-section-info-list">
                <li class="dashboard-section-info-list-title">
                    <h1>Personal Info</h1>
                </li>
                <?php
                if ($userName !== null) {
                ?>
                    <li class="dashboard-section-info-item">
                        <div class="dashboard-section-info-item-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <span class="dashboard-section-info-item-key">Name:</span>
                        <span class="dashboard-section-info-item-value"><?= $userName . $userFamilyName ?></span>
                    </li>
                <?php
                }
                if ($userBirthday !== null) {
                ?>
                    <li class="dashboard-section-info-item">
                        <div class="dashboard-section-info-item-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <span class="dashboard-section-info-item-key">Birthday:</span>
                        <?php #TODO: make birthday view for user, how to save date on database and convert it for showing 
                        ?>
                        <span class="dashboard-section-info-item-value"><?= $userBirthday ?></span>
                    </li>
                <?php
                }
                ?>
                <li class="dashboard-section-info-item">
                    <div class="dashboard-section-info-item-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <span class="dashboard-section-info-item-key">E-Mail:</span>
                    <span class="dashboard-section-info-item-value"><?= $userEmail ?></span>
                </li>
                <?php
                if ($userPhoneNumber !== null) {
                ?>
                    <li class="dashboard-section-info-item">
                        <div class="dashboard-section-info-item-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <span class="dashboard-section-info-item-key">Phone:</span>
                        <span class="dashboard-section-info-item-value"><?= $userPhoneNumber ?></span>
                    </li>
                <?php
                }
                if ($userLocation !== null) {
                ?>
                    <li class="dashboard-section-info-item">
                        <div class="dashboard-section-info-item-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <span class="dashboard-section-info-item-key">Location:</span>
                        <span class="dashboard-section-info-item-value"><?= $userLocation ?></span>
                    </li>
                <?php
                }
                ?>
                <button id="edit-personal-info-button" onclick="showContentHandler('main-section-content-container-change-personal-info', 'change-personal-info')">Edit Prodile</button>
            </ul>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-cart">
            <h1 class="main-section-content-title">Cart</h1>
            <?php
            $sql = "SELECT * FROM `cart` WHERE user_id='$userId'";
            $userCart = mysqli_query($db_connection, $sql);
            $userCart = mysqli_fetch_assoc($userCart);
            if ($userCart === null) {
                $sql = "INSERT INTO `cart` (user_id) VALUES ('$userId')";
                $userCart = mysqli_query($db_connection, $sql);
                $userCart = mysqli_fetch_assoc($userCart);
            }
            $userCartId = intval($userCart['id']);
            $sql = "SELECT * FROM `cart_products` WHERE cart_id='$userCartId' LIMIT 3";
            $userCartProducts = mysqli_query($db_connection, $sql);
            $userCartProducts = mysqli_fetch_all($userCartProducts, MYSQLI_ASSOC);
            if (count($userCartProducts) === 0) {
            ?>
                <h1 class="user-empty-cart-products-message">
                    You Dont Have Any Product in your cart!
                </h1>
                <a class="dashboard-button-link" href="/php-store/products/menu.php?p=1">Our Menu</a>
                <?php
            } else {
                echo '<div class="cart-items-list">';
                foreach ($userCartProducts as $userCartProduct) {
                    $productId = intval($userCartProduct['product_id']);
                    $productCountInCart = intval($userCartProduct['count']);
                    $sql = "SELECT * FROM `product` WHERE id='$productId'";
                    $userCartProduct = mysqli_query($db_connection, $sql);
                    $userCartProduct = mysqli_fetch_assoc($userCartProduct);
                ?>
                    <div class="cart-list-item">
                        <a class="center cart-list-item-image-container" href="/php-store/products/product.php?id=<?= $userCartProduct['id'] ?>">
                            <img src="/php-store/media/product-image/<?= $userCartProduct['image'] ?>" alt="<?= $userCartProduct['name'] ?>" class="cart-list-item-image">
                        </a>
                        <a href="/php-store/products/product.php?id=<?= $userCartProduct['id'] ?>" class="cart-list-item-title"><?= $userCartProduct['name'] ?></a>
                        <div class="cart-list-item-cart-info-container">
                            <span class="cart-list-item-cart-info-count"><?= $productCountInCart ?></span>
                            <div class="cart-list-item-cart-info-buttons-container">
                                <button class="center cart-list-item-cart-info-plus-count-button <?php if ($productCountInCart === 10) echo 'cart-list-item-cart-info-plus-count-button-deactive' ?>" productId="<?= $userCartProduct['id'] ?>">
                                    <i class="bi- bi-plus-lg"></i>
                                </button>
                                <button class="center cart-list-item-cart-info-mines-count-button <?php if ($productCountInCart === 1) echo 'cart-list-item-cart-info-plus-count-button-deactive' ?>" productId="<?= $userCartProduct['id'] ?>">
                                    <i class="bi- bi-dash-lg"></i>
                                </button>
                            </div>
                            <button class="cart-list-item-cart-info-remove-button" productId="<?= $userCartProduct['id'] ?>">Remove</button>
                        </div>
                        <a class="cart-list-item-product-button" href="./products.html">See Product</a>
                    </div>
            <?php
                }
                echo "</div>";
            }
            ?>
            <div class="see-full-cart-button-container center">
                <a class="cart-list-item-button" href="./cart.html">See Full Cart</a>
            </div>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-factors">
            <h1 class="main-section-content-title">Factors</h1>
            <div class="factors-container">
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Factor Item 1</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container">
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Payment Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Count</span>
                            <span class="factor-item-according-line-value">3</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Price</span>
                            <span class="factor-item-according-line-value">25.00 $</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Received</span>
                            <span class="factor-item-according-line-value">&#10004;</span>
                        </div>
                        <div class="more-detail-bottom-container center">
                            <a class="more-detail-bottom" href="#">More Detail</a>
                        </div>
                    </div>
                </div>
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Factor Item 2</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container">
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Payment Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Count</span>
                            <span class="factor-item-according-line-value">3</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Price</span>
                            <span class="factor-item-according-line-value">25.00 $</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Received</span>
                            <span class="factor-item-according-line-value">&#10004;</span>
                        </div>
                        <div class="more-detail-bottom-container center">
                            <a class="more-detail-bottom" href="#">More Detail</a>
                        </div>
                    </div>
                </div>
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Factor Item 3</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container">
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Payment Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Count</span>
                            <span class="factor-item-according-line-value">3</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Price</span>
                            <span class="factor-item-according-line-value">25.00 $</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Received</span>
                            <span class="factor-item-according-line-value">&#10004;</span>
                        </div>
                        <div class="more-detail-bottom-container center">
                            <a class="more-detail-bottom" href="#">More Detail</a>
                        </div>
                    </div>
                </div>
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Factor Item 4</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container">
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Payment Date</span>
                            <span class="factor-item-according-line-value">2021/02/01</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Count</span>
                            <span class="factor-item-according-line-value">3</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Price</span>
                            <span class="factor-item-according-line-value">25.00 $</span>
                        </div>
                        <div class="factor-item-according-line">
                            <span class="factor-item-according-line-title">Received</span>
                            <span class="factor-item-according-line-value">&#10007;</span>
                        </div>
                        <div class="more-detail-bottom-container center">
                            <a class="more-detail-bottom" href="#">More Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-orders">
            <h1 class="main-section-content-title">Orders</h1>
            <div class="factors-container">
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Order Item 1</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container orders-item-according-container">
                        <div class="orders-item-according-product">
                            <div class="factor-item-according-line orders-item-according-line-header">
                                <div class="orders-item-according-line-title-container">
                                    <h4 class="factor-item-according-line-title orders-item-according-line-title">
                                        Product
                                        Item 1</h4>
                                    <p class="orders-item-according-line-description">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Tenetur, dolorum.</p>
                                    <a href="./products.html" class="orders-see-product-bottom">See Product</a>
                                </div>
                                <div class="orders-item-according-line-image-container center">
                                    <img class="orders-item-according-line-image" src="../img/coffe-cup.jpg" alt="Product Item" />
                                </div>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">Count</span>
                                <span class="factor-item-according-line-value">4</span>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">price</span>
                                <span class="factor-item-according-line-value">5.00 $</span>
                            </div>
                        </div>
                        <div class="orders-item-according-product">
                            <div class="factor-item-according-line orders-item-according-line-header">
                                <div class="orders-item-according-line-title-container">
                                    <h4 class="factor-item-according-line-title orders-item-according-line-title">
                                        Product
                                        Item 2</h4>
                                    <p class="orders-item-according-line-description">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Tenetur, dolorum.</p>
                                    <a href="./products.html" class="orders-see-product-bottom">See Product</a>
                                </div>
                                <div class="orders-item-according-line-image-container center">
                                    <img class="orders-item-according-line-image" src="../img/coffe-cup.jpg" alt="Product Item" />
                                </div>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">Count</span>
                                <span class="factor-item-according-line-value">4</span>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">price</span>
                                <span class="factor-item-according-line-value">5.00 $</span>
                            </div>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">Total Price</span>
                            <span class="factor-item-according-line-value">40.00 $</span>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">State</span>
                            <span class="factor-item-according-line-value">Ready to Post</span>
                        </div>
                    </div>
                </div>
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Order Item 2</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container orders-item-according-container">
                        <div class="orders-item-according-product">
                            <div class="factor-item-according-line orders-item-according-line-header">
                                <div class="orders-item-according-line-title-container">
                                    <h4 class="factor-item-according-line-title orders-item-according-line-title">
                                        Product
                                        Item 1</h4>
                                    <p class="orders-item-according-line-description">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Tenetur, dolorum.</p>
                                    <a href="./products.html" class="orders-see-product-bottom">See Product</a>
                                </div>
                                <div class="orders-item-according-line-image-container center">
                                    <img class="orders-item-according-line-image" src="../img/coffe-cup.jpg" alt="Product Item" />
                                </div>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">Count</span>
                                <span class="factor-item-according-line-value">4</span>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">price</span>
                                <span class="factor-item-according-line-value">5.00 $</span>
                            </div>
                        </div>
                        <div class="orders-item-according-product">
                            <div class="factor-item-according-line orders-item-according-line-header">
                                <div class="orders-item-according-line-title-container">
                                    <h4 class="factor-item-according-line-title orders-item-according-line-title">
                                        Product
                                        Item 2</h4>
                                    <p class="orders-item-according-line-description">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Tenetur, dolorum.</p>
                                    <a href="./products.html" class="orders-see-product-bottom">See Product</a>
                                </div>
                                <div class="orders-item-according-line-image-container center">
                                    <img class="orders-item-according-line-image" src="../img/coffe-cup.jpg" alt="Product Item" />
                                </div>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">Count</span>
                                <span class="factor-item-according-line-value">4</span>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">price</span>
                                <span class="factor-item-according-line-value">5.00 $</span>
                            </div>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">Total Price</span>
                            <span class="factor-item-according-line-value">40.00 $</span>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">State</span>
                            <span class="factor-item-according-line-value">Ready to Post</span>
                        </div>
                    </div>
                </div>
                <div class="factor-item">
                    <div class="factor-item-header">
                        <h3 class="factor-item-title">Order Item 3</h3>
                        <div class="factor-item-date-container">
                            <span class="factor-item-date">2021/02/01</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                            <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                        </div>
                    </div>
                    <div class="factor-item-according-container orders-item-according-container">
                        <div class="orders-item-according-product">
                            <div class="factor-item-according-line orders-item-according-line-header">
                                <div class="orders-item-according-line-title-container">
                                    <h4 class="factor-item-according-line-title orders-item-according-line-title">
                                        Product
                                        Item 1</h4>
                                    <p class="orders-item-according-line-description">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Tenetur, dolorum.</p>
                                    <a href="./products.html" class="orders-see-product-bottom">See Product</a>
                                </div>
                                <div class="orders-item-according-line-image-container center">
                                    <img class="orders-item-according-line-image" src="../img/coffe-cup.jpg" alt="Product Item" />
                                </div>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">Count</span>
                                <span class="factor-item-according-line-value">4</span>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">price</span>
                                <span class="factor-item-according-line-value">5.00 $</span>
                            </div>
                        </div>
                        <div class="orders-item-according-product">
                            <div class="factor-item-according-line orders-item-according-line-header">
                                <div class="orders-item-according-line-title-container">
                                    <h4 class="factor-item-according-line-title orders-item-according-line-title">
                                        Product
                                        Item 2</h4>
                                    <p class="orders-item-according-line-description">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Tenetur, dolorum.</p>
                                    <a href="./products.html" class="orders-see-product-bottom">See Product</a>
                                </div>
                                <div class="orders-item-according-line-image-container center">
                                    <img class="orders-item-according-line-image" src="../img/coffe-cup.jpg" alt="Product Item" />
                                </div>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">Count</span>
                                <span class="factor-item-according-line-value">4</span>
                            </div>
                            <div class="factor-item-according-line orders-item-according-line">
                                <span class="factor-item-according-line-title">price</span>
                                <span class="factor-item-according-line-value">5.00 $</span>
                            </div>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">Total Price</span>
                            <span class="factor-item-according-line-value">40.00 $</span>
                        </div>
                        <div class="factor-item-according-line orders-item-according-line">
                            <span class="factor-item-according-line-title">State</span>
                            <span class="factor-item-according-line-value">Ready to Post</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-addresses">
            <h1 class="main-section-content-title">Addresses</h1>
            <div class="user-address-container">
                <div class="user-address-body">
                    <div class="user-address-title-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <h3 class="user-address-title">San Luis Obispo-California</h3>
                    </div>
                    <div class="user-full-address-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                        <p class="user-full-address">California, San Luis Obispo, 1474 Par Drive, 93401</p>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                        <span class="user-address-info user-address-info-name">Amir Mahdi Kahdouii</span>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        <span class="user-address-info user-address-info-telephone">805-784-6998</span>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        <span class="user-address-info user-address-info-phone">626-429-2967</span>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
                            <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                            <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
                        </svg>
                        <span class="user-address-info user-address-info-postCode">031-25485-52</span>
                    </div>

                    <div class="user-address-action-buttons-container center">
                        <button class="user-address-action-button-remove center">Remove</button>
                        <button class="user-address-action-button-edit center">Edit</button>
                    </div>
                </div>
                <div class="user-address-map-container center">
                    <img src="../img/dashboard-user-address-map.jpg" alt="Map" width="100%">
                </div>
                <div class="remove-address-modal-container">
                    <div class="remove-address-modal-body">
                        <h1 class="remove-address-modal-title">Are You Sure To Remove?</h1>
                        <div class="remove-address-modal-buttons-container center">
                            <button class="remove-address-modal-no-botton">No</button>
                            <button class="remove-address-modal-yes-botton">Yes</button>
                        </div>
                    </div>
                </div>
                <div class="edit-address-modal-container">
                    <div class="remove-address-modal-body">
                        <h1 class="remove-address-modal-title">Edit Address</h1>
                        <form class="address-modal-edit-form">
                            <input type="text" name="address" class="address-modal-edit-form-input" placeholder="Address" />
                            <input type="text" name="name" class="address-modal-edit-form-input" placeholder="Name" />
                            <input type="text" name="telephone" id="address-modal-edit-form-telephoneInput" class="address-modal-edit-form-input" placeholder="Telephone" />
                            <input type="text" name="phone" class="address-modal-edit-form-input" placeholder="Phone" />
                            <input type="text" name="postalCode" class="address-modal-edit-form-input" placeholder="Postal Code" />
                        </form>
                        <div class="remove-address-modal-buttons-container center">
                            <button class="edit-address-modal-cancel-botton">cancel</button>
                            <button class="edit-address-modal-confirm-botton">confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-address-container">
                <div class="user-address-body">
                    <div class="user-address-title-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <h3 class="user-address-title">San Luis Obispo-California</h3>
                    </div>
                    <div class="user-full-address-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                        <p class="user-full-address">California, San Luis Obispo, 1474 Par Drive, 93401</p>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                        <span class="user-address-info user-address-info-name">Amir Mahdi Kahdouii</span>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        <span class="user-address-info user-address-info-telephone">805-784-6998</span>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        <span class="user-address-info user-address-info-phone">626-429-2967</span>
                    </div>
                    <div class="user-address-info-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
                            <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                            <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
                        </svg>
                        <span class="user-address-info user-address-info-postCode">031-25485-52</span>
                    </div>

                    <div class="user-address-action-buttons-container center">
                        <button class="user-address-action-button-remove center">Remove</button>
                        <button class="user-address-action-button-edit center">Edit</button>
                    </div>
                </div>
                <div class="user-address-map-container center">
                    <img src="../img/dashboard-user-address-map.jpg" alt="Map" width="100%">
                </div>
                <div class="remove-address-modal-container">
                    <div class="remove-address-modal-body">
                        <h1 class="remove-address-modal-title">Are You Sure To Remove?</h1>
                        <div class="remove-address-modal-buttons-container center">
                            <button class="remove-address-modal-no-botton">No</button>
                            <button class="remove-address-modal-yes-botton">Yes</button>
                        </div>
                    </div>
                </div>
                <div class="edit-address-modal-container">
                    <div class="remove-address-modal-body">
                        <h1 class="remove-address-modal-title">Edit Address</h1>
                        <form class="address-modal-edit-form">
                            <input type="text" name="address" class="address-modal-edit-form-input" placeholder="Address" />
                            <input type="text" name="name" class="address-modal-edit-form-input" placeholder="Name" />
                            <input type="text" name="telephone" id="address-modal-edit-form-telephoneInput" class="address-modal-edit-form-input" placeholder="Telephone" />
                            <input type="text" name="phone" class="address-modal-edit-form-input" placeholder="Phone" />
                            <input type="text" name="postalCode" class="address-modal-edit-form-input" placeholder="Postal Code" />
                        </form>
                        <div class="remove-address-modal-buttons-container center">
                            <button class="edit-address-modal-cancel-botton">cancel</button>
                            <button class="edit-address-modal-confirm-botton">confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new-address-container" style="display: none;">
                <h2 class="add-new-address-title">Add New Address</h2>
                <form class="add-new-address-form">
                    <input type="text" name="address" class="add-new-address-input" placeholder="Address" id="add-new-address-form-input-address" />
                    <input type="text" name="name" class="add-new-address-input" placeholder="Name" id="add-new-address-form-input-name" />
                    <input type="text" name="telephone" class="add-new-address-input" placeholder="Telephone" id="add-new-address-form-input-telephone" />
                    <input type="text" name="phone" class="add-new-address-input" placeholder="Phone" id="add-new-address-form-input-phone" />
                    <input type="text" name="postalCode" class="add-new-address-input" placeholder="Postal Code" id="add-new-address-form-input-postalCode" />
                    <div class="add-new-address-buttons-container center">
                        <button class="add-new-address-botton-cancel" type="button">cancel</button>
                        <button class="add-new-address-botton-add" type="button">confirm</button>
                    </div>
                </form>

            </div>
            <div class="add-address-button-container center">
                <button class="add-address-button center">+ Add New Address</button>
            </div>

        </div>

        <div class="main-section-content-container" id="main-section-content-container-change-personal-info">
            <h1 class="main-section-content-title">Change Personal Info</h1>
            <div class="change-personal-info">
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-name" class="change-personal-info-form-label">Name</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="name" id="change-personal-info-form-name" class="change-personal-info-form-input" <?php if ($userName === null || $userName === "") { ?> placeholder="Name" <?php } else { ?> value="<?= $userName ?>" <?php } ?>>
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-family-name" class="change-personal-info-form-label">Family Name</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="family-name" id="change-personal-info-form-family-name" class="change-personal-info-form-input" <?php if ($userFamilyName === null || $userFamilyName === "") { ?> placeholder="Family Name" <?php } else { ?> value="<?= $userFamilyName ?>" <?php } ?>>
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-birthday" class="change-personal-info-form-label">Birthday</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="date" name="birthday" id="change-personal-info-form-birthday" class="change-personal-info-form-input" <?php if ($userBirthday === null) { ?> placeholder="mm/ dd/ yyyy" <?php } else { ?> value="<?= $userBirthday ?>" <?php } ?>>
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-phoneNumber" class="change-personal-info-form-label">Phone</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="phone-number" id="change-personal-info-form-phoneNumber" class="change-personal-info-form-input" <?php if ($userPhoneNumber === null || $userPhoneNumber === "") { ?> placeholder="Phone Number" <?php } else { ?> value="<?= $userPhoneNumber ?>" <?php } ?>>
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-profile-photo" class="change-personal-info-form-label">Profile Photo</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="file" name="profile-photo" id="change-personal-info-form-profile-photo" class="change-personal-info-form-input">
                    </div>
                </div>
                <button class="change-personal-info-form-submit-button" type="submit">Confirm</button>
            </div>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-change-password">
            <h1 class="main-section-content-title">Change password</h1>
            <div class="change-personal-info">
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-password-form-old-password" class="change-personal-info-form-label">Old
                            Password</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="password" id="change-password-form-old-password" class="change-personal-info-form-input" placeholder="Old Password">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-password-form-new-password" class="change-personal-info-form-label">New
                            Password</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="password" id="change-password-form-new-password" class="change-personal-info-form-input" placeholder="New Password">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-password-form-confirm-new-password" class="change-personal-info-form-label">Confirm Password</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="password" id="change-password-form-confirm-new-password" class="change-personal-info-form-input" placeholder="Confirm Password">
                    </div>
                </div>
                <button class="change-password-form-submit-button" id="change-password-button" type="button">Confirm</button>
            </div>
        </div>
        <?php
        if ($userAdmin) {
        ?>

            <div class="main-section-content-container" id="main-section-content-container-add-new-product-admin">
                <h1 class="main-section-content-title">Add new Product</h1>
                <div class="change-personal-info">
                    <div class="change-personal-info-form-row center">
                        <div class="change-personal-info-form-column center">
                            <label for="add-new-product-name" class="change-personal-info-form-label">Name</label>
                        </div>
                        <div class="change-personal-info-form-column center">
                            <input type="text" name="name" id="add-new-product-name" class="change-personal-info-form-input" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="change-personal-info-form-row center">
                        <div class="change-personal-info-form-column center">
                            <label for="add-new-product-count" class="change-personal-info-form-label">Count</label>
                        </div>
                        <div class="change-personal-info-form-column center">
                            <input type="number" name="family-name" id="add-new-product-count" class="change-personal-info-form-input" min='0' placeholder="0">
                        </div>
                    </div>
                    <div class="change-personal-info-form-row center">
                        <div class="change-personal-info-form-column center">
                            <label for="select-product-categories" class="change-personal-info-form-label">Category</label>
                        </div>
                        <div class="change-personal-info-form-column center">
                            <select id="select-product-categories"></select>
                        </div>
                    </div>
                    <div class="change-personal-info-form-row center">
                        <div class="change-personal-info-form-column center">
                            <label for="add-new-product-price" class="change-personal-info-form-label">Price</label>
                        </div>
                        <div class="change-personal-info-form-column center">
                            <input type="number" id="add-new-product-price" class="change-personal-info-form-input" placeholder="0.00">
                        </div>
                    </div>
                    <div class="change-personal-info-form-row center">
                        <div class="change-personal-info-form-column center">
                            <label for="add-new-product-photo" class="change-personal-info-form-label">Image</label>
                        </div>
                        <div class="change-personal-info-form-column center">
                            <input type="file" id="add-new-product-photo" class="change-personal-info-form-input">
                        </div>
                    </div>
                    <button class="change-personal-info-form-submit-button" type="submit" id="add-new-product-submit-button">Confirm</button>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <?php
    // Include Footer
    include_once "../components/footer.php";
    // Include Main Scripts
    include_once "../components/mainScript.php";
    if ($userAdmin) {
    ?>
        <script src="/php-store/static/js/accounts/admin.js"></script>
    <?php
    }
    ?>
    <script src="/php-store/static/js/accounts/dashboard.js"></script>

</body>

</html>