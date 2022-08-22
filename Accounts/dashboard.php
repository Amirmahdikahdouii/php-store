<?php
include_once '../settings/dbconfig.php';
session_start();
$userId = $_SESSION['user_id'];
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
                    <li class="sideBar-menu-item"><span>Settings</span></li>
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
                <button id="edit-personal-info-button" onclick="showContentHandler('main-section-content-container-change-personal-info', 'edit-personal-info-button')">Edit Prodile</button>
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
            <form class="change-personal-info">
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-username" class="change-personal-info-form-label">Username</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="username" id="change-personal-info-form-username" class="change-personal-info-form-input" placeholder="Username">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-name" class="change-personal-info-form-label">Name</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="name" id="change-personal-info-form-name" class="change-personal-info-form-input" placeholder="Name">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-birthday" class="change-personal-info-form-label">Birthday</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="date" name="birthday" id="change-personal-info-form-birthday" class="change-personal-info-form-input">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-email" class="change-personal-info-form-label">E-Mail</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="email" id="change-personal-info-form-email" class="change-personal-info-form-input" placeholder="E-Mail">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-phoneNumber" class="change-personal-info-form-label">Phone</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="text" name="phone-number" id="change-personal-info-form-phoneNumber" class="change-personal-info-form-input" placeholder="Phone Number">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-personal-info-form-profile-photo" class="change-personal-info-form-label">Profile Photo</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="file" name="profile-photo" id="change-personal-info-form-profile-photo" class="change-personal-info-form-input" placeholder="File">
                    </div>
                </div>
                <button class="change-personal-info-form-submit-button" type="button">Confirm</button>
            </form>
        </div>

        <div class="main-section-content-container" id="main-section-content-container-change-password">
            <h1 class="main-section-content-title">Change password</h1>
            <form class="change-personal-info">
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-password-form-old-password" class="change-personal-info-form-label">Old
                            Password</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="password" name="old-password" id="change-password-form-old-password" class="change-personal-info-form-input" placeholder="Old Password">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-password-form-new-password" class="change-personal-info-form-label">New
                            Password</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="password" name="new-password" id="change-password-form-new-password" class="change-personal-info-form-input" placeholder="New Password">
                    </div>
                </div>
                <div class="change-personal-info-form-row center">
                    <div class="change-personal-info-form-column center">
                        <label for="change-password-form-new-password-confirm" class="change-personal-info-form-label">Confirm Password</label>
                    </div>
                    <div class="change-personal-info-form-column center">
                        <input type="password" name="new-password-confirm" id="change-password-form-new-password-confirm" class="change-personal-info-form-input" placeholder="Confirm Password">
                    </div>
                </div>
                <button class="change-password-form-submit-button" type="button">Confirm</button>
            </form>
        </div>

    </section>


    <footer class="footer">
        <div class="footer-item">
            <h3 class="footer-item-address-title">Coffe Shop</h3>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z">
                    </path>
                </svg>
            </div>
        </div>
    </footer>

    <?php
    // Include Main Scripts
    include_once "../components/mainScript.php";
    ?>
    <script src="/php-store/static/js/accounts/dashboard.js"></script>

</body>

</html>