<?php
include_once "../settings/dbconfig.php";
$productID = null;
if (isset($_GET["id"])) {
    $productID = $_GET["id"];
    $productID = intval($productID);
    // Check if Product ID is not define or is not an integer number, redirect to 404 page
    if ($productID <= 0) {
        header("Location: ../pages/404.php");
    }
} else {
    header("Location: ../pages/404.php");
}
// Method to check if productId is not exist, raise Error
function checkProductExists($productID)
{
    global $db_connection;
    $sql = "SELECT * FROM `product` WHERE id='$productID'";
    $result = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_assoc($result);
    if ($result === null) header("Location: ../pages/404.php");
    return $result;
}

$Product = checkProductExists($productID);

// Update View Counter Of Product Field
// TODO: Update ViewCount After every refresh!
$viewCount = intval($Product["view"]);
$viewCount++;
$sql = "UPDATE `product` SET viewCount='$viewCount' WHERE id='$productID'";
$updateViewCount = mysqli_query($db_connection, $sql);

// Select Product Category Field
$ProductSubCategoryID = $Product["category_id"];
$sql = "SELECT * FROM `product_subcategory` WHERE id='$ProductSubCategoryID'";
$productSubCategory = mysqli_query($db_connection, $sql);
$productSubCategory = mysqli_fetch_assoc($productSubCategory);

// Select Product Comments
$sql = "SELECT * FROM `product_comment` WHERE product_id='$productID'";
$Comments = mysqli_query($db_connection, $sql);
$Comments = mysqli_fetch_all($Comments, MYSQLI_ASSOC);

// Select Image Gallery Images
$sql = "SELECT * FROM `product_image_gallery` WHERE product_id='$productID'";
$ProductGalleryImages = mysqli_query($db_connection, $sql);
$ProductGalleryImages = mysqli_fetch_all($ProductGalleryImages, MYSQLI_ASSOC);

// Select Related Product
$sql = "SELECT * FROM `product` WHERE category_id='$ProductSubCategoryID' ORDER BY viewCount LIMIT 8";
$RelatedProducts = mysqli_query($db_connection, $sql);
$RelatedProducts = mysqli_fetch_all($RelatedProducts, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Product["name"] ?></title>
    <?php
    include_once "../components/header-footer-style.php";
    ?>
    <link rel="stylesheet" href="../static/css/products/products.css">
</head>

<body>

<?php
include_once "../components/header.php";
include_once "../components/alertMessage.php";
?>

<section class="main-section">
    <div class="product-info-container">
        <h1 class="product-info-title"><?= $Product["name"] ?></h1>
        <span class="product-info-full-name">
            Category:
            <a href="#" class="product-info-full-name"><?= $productSubCategory["name"] ?></a>
        </span>
        <div class="product-rate-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                 class="bi bi-star-fill" viewBox="0 0 16 16">
                <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
            <span class="product-rate-mark"><?= number_format($Product["rate"], 1, ".") ?></span>
            <span class="product-rate-mark"><span><?= $Product["viewCount"] ?></span> View</span>
            <a href="#comment-section" class="product-rate-mark"><span><?= count($Comments) ?></span> comments</a>
        </div>
        <div class="coffe-type">
            <h3 class="coffe-type-title">Please Choose Your Cup</h3>
            <div class="cup-sizes center">
                <button class="cup-size center cup-size-active"
                        onclick="cupSelectColorize(0, <?= number_format($Product["price"], 2, ".") ?>)" title="150 cc">
                    <i class="bi bi-cup-fill" style="font-size: 20px"></i>
                </button>
                <button class="cup-size center"
                        onclick="cupSelectColorize(1, <?= number_format($Product["price"], 2, ".") ?>)" title="250 cc">
                    <i class="bi bi-cup-fill" style="font-size: 30px"></i>
                </button>
                <button class="cup-size center"
                        onclick="cupSelectColorize(2, <?= number_format($Product["price"], 2, ".") ?>)" title="350 cc">
                    <i class="bi bi-cup-fill" style="font-size: 40px"></i>
                </button>
            </div>

            <div class="suger-select-container center">
                <button class="suger-select-button" onclick="sugerTypeSelect(0)">With Suger</button>
                <button class="suger-select-button" onclick="sugerTypeSelect(1)">Suger Free</button>
            </div>

            <h2 class="price">
                <i class="bi bi-currency-dollar" style="font-size: inherit; color: #fff;"></i>
                <?= number_format($Product["price"], 2, ".") ?>
            </h2>

            <div class="center add-to-cart-button-container">
                <button class="add-to-cart-button" productId="<?= $productID ?>">Add To Cart</button>
            </div>

            <a class="view-more-details" href="#more-details-section-link">More Details</a>

            <div class="shopping-benefits-container center">
                <div class="shopping-benefits-item center">
                    <span class="shopping-benefits-title">Fast Delivery</span>
                    <img src="../static/img/express-delivery.svg" alt="Fast Delivery" class="shopping-benefits-img">
                </div>
                <div class="shopping-benefits-item center">
                    <span class="shopping-benefits-title">Original Product</span>
                    <img src="../static/img/original-products.svg" alt="Original Product" class="shopping-benefits-img">
                </div>
                <div class="shopping-benefits-item center">
                    <span class="shopping-benefits-title">Pay when deliver</span>
                    <img src="../static/img/cash-on-delivery.svg" alt="Pay in delivery" class="shopping-benefits-img">
                </div>
            </div>

        </div>
    </div>

    <div class="product-image-part">
        <div class="center product-image-container">
            <img src="../media/product-image/<?= $Product["image"] ?>" class="product-image"
                 id="main-product-image" alt="<?= $Product["name"] ?>">
        </div>
        <?php
        if ($ProductGalleryImages !== null) {
            ?>
            <div class="more-pictures-container center">
                <?php
                for ($i = 0; $i < count($ProductGalleryImages); $i++) {
                    ?>
                    <div class="more-picture-item center">
                        <img src="../media/product-image/<?= $ProductGalleryImages[$i]["image"] ?>"
                             alt="<?= $Product["name"] ?>"
                             class="more-picture-item-image">
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>


    <div class="main-product-modal" id="modal-container">
        <span class="modal-close-button">&times;</span>
        <img class="main-modal-image" id="modal-image" alt="<?= $Product['name'] ?>" src="">
        <p id="modal-caption"></p>
    </div>


</section>

<!-- Related Products Carousel -->
<section class="center carousel-container">
    <button class="change-carousel-items-button" id="change-carousel-items-button-previous">&lt;</button>
    <div class="carousel-items-container">
        <?php
        $i = 0;
        foreach ($RelatedProducts

                 as $relatedProduct) {
            ?>
            <div class="carousel-product-card <?php if ($i <= 4) echo "carousel-product-card-active"; ?>">
                <div class="carousel-product-card-image-container">
                    <img src="../media/product-image/<?= $relatedProduct["image"] ?>"
                         class="center carousel-product-card-image" alt="<?= $relatedProduct['name'] ?>"/>
                    <div class="carousel-product-card-image-dark-theme">
                        <a href="./product.php?id=<?= $relatedProduct['id'] ?>" class="carousel-add-to-cart-button"><i
                                    class="bi bi-bag-plus"></i></a>
                    </div>
                </div>
                <div class="carousel-product-card-info-container">
                    <a href="#" class="product-cart-title"><?= $relatedProduct['name'] ?></a>
                    <div class="product-cart-price-container">
                        <?php
                        if ($relatedProduct['have_price_with_off']) {
                            $relatedProductID = $relatedProduct["id"];
                            $sql = "SELECT * FROM `product_with_off_prices` WHERE product_id='$relatedProductID'";
                            $newPrice = mysqli_query($db_connection, $sql);
                            $newPrice = mysqli_fetch_assoc($newPrice);
                            ?>
                            <span class="product-cart-price">
                                <i class="bi bi-currency-dollar"></i>
                                <?= number_format($newPrice['new_price'], 2, "."); ?>
                        </span>
                            <span class="product-cart-price-before-off">
                                <i class="bi bi-currency-dollar"></i>
                                <?= number_format($relatedProduct['price'], 2, ".") ?>
                            </span>
                            <?php
                        } else {
                            ?>
                            <span class="product-cart-price">
                                <i class="bi bi-currency-dollar"></i>
                                <?= number_format($relatedProduct['price'], 2, ".") ?>
                            </span>
                            <?php
                        }
                        ?>
                    </div>
                    <button class="product-cart-button">Add To cart</button>
                </div>
            </div>
            <?php
            $i++;
        }
        $i = 0;
        ?>
    </div>
    <button class="change-carousel-items-button" id="change-carousel-items-button-next">&gt;</button>
</section>


<section class="product-more-detail-section">
    <div class="product-more-detail-container">
        <h3 class="product-more-detail-container-header" id="more-details-section-link">Details</h3>
        <div class="product-more-detail-table">
            <div class="product-more-detail-table-row">
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">Weight</span>
                </div>
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span" id="detail-weight-size">150 cc</span>
                </div>
            </div>
            <div class="product-more-detail-table-row">
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">Suger</span>
                </div>
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">5 gr</span>
                </div>
            </div>
            <div class="product-more-detail-table-row">
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">coffe</span>
                </div>
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">25 gr</span>
                </div>
            </div>
            <div class="product-more-detail-table-row">
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">milk</span>
                </div>
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span" id="detail-milk-size">40 cc</span>
                </div>
            </div>
            <div class="product-more-detail-table-row">
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">taste</span>
                </div>
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">Chocolate</span>
                </div>
            </div>
            <div class="product-more-detail-table-row">
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">cup</span>
                </div>
                <div class="product-more-detail-table-column">
                    <span class="product-more-detail-table-column-span">Take Away</span>
                </div>
            </div>
            <span class="product-more-detail-table-read-more" id="product-more-detail-table-read-more-button">Read
                    More</span>
            <span class="product-more-detail-table-read-more"
                  id="product-more-detail-table-read-less-button">Close</span>
        </div>
    </div>
</section>

<section class="product-comments-section" id="comment-section">
    <h1 class="product-comments-section-title">Comments</h1>
    <div class="product-comments-section-container">
        <div class="past-comments-container">
            <?php
            foreach ($Comments as $comment) {
                ?>
                <div class="past-comment-item">
                    <div class="comment-item-header">
                        <h3 class="past-comment-item-title"><?= $comment['title'] ?></h3>
                        <div class="user-rate-to-product">
                            <span class="user-rate-mark"><?= number_format(floatval($comment['rateMark']), 1, ".") ?></span>
                            <div class="user-rate-stars">
                                <?php
                                $rateMarkComment = intval($comment['rateMark']);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rateMarkComment) {
                                        ?>
                                        <i class="bi bi-star-fill"></i>
                                        <?php
                                        continue;
                                    }
                                    ?>
                                    <i class="bi bi-star"></i>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                    <?php
                    $commentUserID = intval($comment["user_id"]);
                    $sql = "SELECT name FROM `account` WHERE id='$commentUserID'";
                    $commentUserName = mysqli_query($db_connection, $sql);
                    $commentUserName = mysqli_fetch_assoc($commentUserName);
                    $commentUserName = $commentUserName['name'];
                    ?>
                    <span class="comment-item-user"><?= $commentUserName ?></span>
                    <p class="comment-item-message"><?= $comment["text"] ?></p>
                    <div class="comment-like-dislike-container">
                        <span class="users-like-comment-question">Do you like this comment?</span>
                        <i class="bi bi-heart"></i>
                        <i class="bi bi-heart-fill"></i>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="new-comments-container">
            <h1 class="new-comments-header">New Comment</h1>
            <form class="new-comment-form">
                <div class="form-rate-the-product-stars-container">
                    <span id="rate-the-product-star-mark">1.0</span>
                    <div class="rate-the-product-stars-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star-fill new-comments-star-fill" viewBox="0 0 16 16"
                             style="display: inline-block;">
                            <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star-fill new-comments-star-fill" viewBox="0 0 16 16">
                            <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star-fill new-comments-star-fill" viewBox="0 0 16 16">
                            <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star-fill new-comments-star-fill" viewBox="0 0 16 16">
                            <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star-fill new-comments-star-fill" viewBox="0 0 16 16">
                            <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star new-comments-star" viewBox="0 0 16 16" style="display: none;">
                            <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star new-comments-star" viewBox="0 0 16 16">
                            <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star new-comments-star" viewBox="0 0 16 16">
                            <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star new-comments-star" viewBox="0 0 16 16">
                            <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-star new-comments-star" viewBox="0 0 16 16">
                            <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                    </div>
                </div>
                <input type="text" id="comment-title" name="comment-title" placeholder="Title" required>
                <input type="text" id="name" name="name" placeholder="Name" required>
                <textarea class="new-comment-text-area" id="new-comment" name="new-comment"
                          placeholder="MESSAGE ..."></textarea>
                <input type="button" value="Send" id="new-comment-button">
            </form>
        </div>
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
            <svg
                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-heart"
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
include_once "../components/mainScript.php";
?>
<script src="../static/js/products/products.js"></script>
</body>

</html>