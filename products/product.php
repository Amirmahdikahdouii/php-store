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
            <i class="bi bi-star-fill"></i>
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
                        <i class="bi bi-star-fill new-comments-star-fill"></i>
                        <i class="bi bi-star-fill new-comments-star-fill"></i>
                        <i class="bi bi-star-fill new-comments-star-fill"></i>
                        <i class="bi bi-star-fill new-comments-star-fill"></i>
                        <i class="bi bi-star-fill new-comments-star-fill"></i>
                        <i class="bi bi-star new-comments-star"></i>
                        <i class="bi bi-star new-comments-star"></i>
                        <i class="bi bi-star new-comments-star"></i>
                        <i class="bi bi-star new-comments-star"></i>
                        <i class="bi bi-star new-comments-star"></i>
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
<?php
include_once "../components/footer.php";
include_once "../components/mainScript.php";
?>
<script src="<?php include_once "../components/filePathHandler.php"; ?>static/js/products/products.js"></script>
</body>

</html>