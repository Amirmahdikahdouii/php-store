<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./static/css/style.css">
    <?php
    include_once "./components/header-footer-style.php";
    ?>
</head>

<body>
<?php
include_once "./settings/dbconfig.php";
include_once "./components/header.php";
?>
<section class="section-our-story">
    <div class="our-story-image">
        <img src="./static/img/coffe-shop.jpg" width="100%" alt="CoffeShop"/>
    </div>
    <div class="our-story-description">
        <h1 class="our-story-description-title">Discover</h1>
        <h1 class="our-story-description-title our-story-description-title-2">Our Story</h1>
        <p class="our-story-description-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex cum velit excepturi corrupti atque ipsam
            vero! Eaque quisquam, optio aut magni officiis facere explicabo similique laudantium omnis iure, aliquid
            placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et sit explicabo expedita vero? Ipsa
            cupiditate aspernatur temporibus repellendus, dolor omnis doloribus. Aut hic doloremque reprehenderit
            consequatur tempore quaerat amet ipsum?
        </p>

        <p class="our-story-description-text our-story-description-text-mobile">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex cum velit excepturi corrupti atque ipsam
            vero! Eaque quisquam, optio aut magni
        </p>
    </div>

</section>

<section class="our-commitment-section">
    <div class="our-commitment-item">
        <div class="our-commitment-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                 class="bi bi-bag-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path
                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg>
        </div>
        <h1 class="our-commitment-title">EASY TO ORDER</h1>
        <p class="our-commitment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus hic
            illo, eos veritatis velit corporis.</p>
    </div>

    <div class="our-commitment-item">
        <div class="our-commitment-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cup"
                 viewBox="0 0 16 16">
                <path
                        d="M1 2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v1h.5A1.5 1.5 0 0 1 16 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-.55a2.5 2.5 0 0 1-2.45 2h-8A2.5 2.5 0 0 1 1 12.5V2zm13 10h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5H14v8zM13 2H2v10.5A1.5 1.5 0 0 0 3.5 14h8a1.5 1.5 0 0 0 1.5-1.5V2z"/>
            </svg>
        </div>
        <h1 class="our-commitment-title">HIGH QUALITY</h1>
        <p class="our-commitment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus hic
            illo, eos veritatis velit corporis.</p>
    </div>

    <div class="our-commitment-item">
        <div class="our-commitment-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-truck"
                 viewBox="0 0 16 16">
                <path
                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
        </div>
        <h1 class="our-commitment-title">FAST DELIVERY</h1>
        <p class="our-commitment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus hic
            illo, eos veritatis velit corporis.</p>
    </div>

</section>

<section class="our-menu-section">
    <div class="our-menu-image-container">
        <img src="./static/img/coffe-1.jpg" width="100%" alt="OUR-MENU"/>
    </div>

    <div class="our-menu-description">
        <div class="our-menu-description-title">Discover</div>
        <div class="our-menu-description-title our-menu-description-title-2">OUR MENU</div>
        <p class="our-menu-description-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit
            explicabo distinctio officia voluptates! Nulla consequuntur totam perspiciatis, aspernatur sed harum.
            Magni ea molestias eaque sunt asperiores facere, officiis pariatur eos?</p>
        <div class="our-menu-button-container">
            <button class="header-main-button our-menu-button">View Full Menu</button>
        </div>
    </div>

</section>

<section class="book-table-section">
    <div class="book-table-image-container">
        <img src="./static/img/coffe-table.jpg" alt="OUR-TABLE" width="100%"/>
    </div>

    <div class="book-table-container">
        <form action="" method="post" class="book-table-form">
            <div class="row">
                <div class="col-7 col-3">
                    <label for="name" class="book-table-form-label">Name:</label>
                </div>
                <div class="col-7">
                    <input type="text" name="name" id="name" placeholder="Enter Your Name"/>
                </div>
            </div>

            <div class="row">
                <div class="col-7 col-3">
                    <label for="last-name" class="book-table-form-label">Last Name:</label>
                </div>
                <div class="col-7">
                    <input type="text" name="lastName" id="last-name" placeholder="Enter Your Last Name"/>
                </div>
            </div>

            <div class="row">
                <div class="col-7 col-3">
                    <label for="date" class="book-table-form-label">Date:</label>
                </div>
                <div class="col-7">
                    <input type="date" name="date" id="date"/>
                </div>
            </div>

            <div class="row">
                <div class="col-7 col-3">
                    <label for="time" class="book-table-form-label">Time:</label>
                </div>
                <div class="col-7">
                    <input list="browsers" name="browser" id="browser" placeholder="Choose ...">
                    <datalist id="browsers">
                        <option value="8:00 AM">
                        <option value="8:30 AM">
                        <option value="9:00 AM">
                        <option value="9:30 AM">
                        <option value="10:00 AM">
                        <option value="10:30 AM">
                        <option value="11:00 AM">
                        <option value="11:30 AM">
                        <option value="12:00 AM">
                        <option value="12:30 AM">
                        <option value="1:00 PM">
                        <option value="1:30 PM">
                        <option value="2:00 PM">
                        <option value="2:30 PM">
                        <option value="3:00 PM">
                        <option value="3:30 PM">
                        <option value="4:00 PM">
                        <option value="5:00 PM">
                        <option value="6:00 PM">
                        <option value="7:00 PM">
                        <option value="8:00 PM">
                        <option value="9:00 PM">
                        <option value="10:00 PM">
                    </datalist>
                </div>
            </div>

            <div class="row">
                <div class="col-7 col-3">
                    <label for="phone" class="book-table-form-label">Phone:</label>
                </div>
                <div class="col-7">
                    <input type="tel" name="phone" id="phone" placeholder="Enter Your Number"/>
                </div>
            </div>

            <div class="row">
                <div class="col-7 col-3">
                    <label for="message" class="book-table-form-label">Message:</label>
                </div>
                <div class="col-7">
                    <textarea name="message" id="message" placeholder="Message"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="button" class="book-table-button">Book</button>
                </div>
            </div>

        </form>
    </div>

</section>

<section class="best-coffe-sellers-section">
    <div class="best-coffe-seller-header">
        <h1 class="best-coffe-seller-header-title">Discover</h1>
        <h1 class="best-coffe-seller-header-title">BEST COFFE SELLER</h1>
        <p class="best-coffe-seller-header-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia
            asperiores suscipit nesciunt, in perspiciatis sunt. Ab consectetur pariatur quod a, ullam iusto magnam
            in consequuntur?</p>
    </div>
    <div class="best-coffe-seller-footer">
        <div class="best-coffe-seller-footer-item">
            <div class="best-coffe-seller-item-image">
                <img src="img/coffe.jpg" width="100%" height="200px" alt="COFFE"/>
            </div>
            <span class="best-coffe-seller-item-title">COFFEE CAPUCCINO</span>
            <p class="best-coffe-seller-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Necessitatibus, quod.</p>
            <span class="best-coffe-seller-item-title">2.00 $</span>
            <div class="best-coffe-seller-item-button-container">
                <button class="best-coffe-seller-item-button">Add To Cart</button>
            </div>
        </div>
        <div class="best-coffe-seller-footer-item">
            <div class="best-coffe-seller-item-image">
                <img src="./static/img/coffe.jpg" width="100%" height="200px" alt="COFFE"/>
            </div>
            <span class="best-coffe-seller-item-title">COFFEE CAPUCCINO</span>
            <p class="best-coffe-seller-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Necessitatibus, quod.</p>
            <span class="best-coffe-seller-item-title">2.00 $</span>
            <div class="best-coffe-seller-item-button-container">
                <button class="best-coffe-seller-item-button">Add To Cart</button>
            </div>
        </div>
        <div class="best-coffe-seller-footer-item">
            <div class="best-coffe-seller-item-image">
                <img src="./static/img/coffe.jpg" width="100%" height="200px" alt="COFFE"/>
            </div>
            <span class="best-coffe-seller-item-title">COFFEE CAPUCCINO</span>
            <p class="best-coffe-seller-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Necessitatibus, quod.</p>
            <span class="best-coffe-seller-item-title">2.00 $</span>
            <div class="best-coffe-seller-item-button-container">
                <button class="best-coffe-seller-item-button">Add To Cart</button>
            </div>
        </div>
        <div class="best-coffe-seller-footer-item">
            <div class="best-coffe-seller-item-image">
                <img src="./static/img/coffe.jpg" width="100%" alt="COFFE" height="200px"/>
            </div>
            <span class="best-coffe-seller-item-title">COFFEE CAPUCCINO</span>
            <p class="best-coffe-seller-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Necessitatibus, quod.</p>
            <span class="best-coffe-seller-item-title">2.00 $</span>
            <div class="best-coffe-seller-item-button-container">
                <button class="best-coffe-seller-item-button">Add To Cart</button>
            </div>
        </div>
    </div>
</section>

<section class="image-gallery-section">
    <div class="image-gallery-item">
        <img src="./static/img/coffe-shop-1.jpg" alt="Image" class="img-of-image-gallery" width="100%"/>
    </div>
    <div class="image-gallery-item">
        <img src="./static/img/coffe-shop.jpg" alt="Image" class="img-of-image-gallery" width="100%"/>
    </div>
    <div class="image-gallery-item">
        <img src="./static/img/coffe-shop-1.jpg" alt="Image" class="img-of-image-gallery" width="100%"/>
    </div>
    <div class="image-gallery-item">
        <img src="./static/img/coffe-shop.jpg" alt="Image" class="img-of-image-gallery" width="100%"/>
    </div>
</section>

<section class="our-full-menu-section">
    <div class="our-full-menu-header-container">
        <h1 class="our-full-menu-header-title">Our Menu</h1>
        <p class="our-full-menu-header-description">Check Our Products !</p>
        <div class="our-full-menu-header-button-container">
            <button class="our-full-menu-header-button our-full-menu-header-button-active" onclick="menuShow(1)">Coffee</button>
            <button class="our-full-menu-header-button" onclick="menuShow(2)">Drinks</button>
            <button class="our-full-menu-header-button" onclick="menuShow(3)">Lunch</button>
            <button class="our-full-menu-header-button" onclick="menuShow(4)">Dinner</button>
        </div>
    </div>
    <div class="our-full-menu-body-container">
        <?php
        // $sql = "SELECT * FROM `product` WHERE category_id=''"
        ?>
        <div class="our-full-menu-items-container our-full-menu-items-container-active">
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./pages/products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./pages/cart.html">Add to cart</a>
                    <div class="menu-item-add-remove-buttons">
                        <button class="menu-item-plus-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </button>
                        <button class="menu-item-delete-button-count center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-menu-load-more-button-container">
            <a href="./products/menu.php" class="full-menu-load-more-button">More</a>
        </div>
    </div>
</section>

<?php
include_once "./components/footer.php";
include_once "./components/mainScript.php";
?>
<script src="./static/js/script.js"></script>

</body>

</html>