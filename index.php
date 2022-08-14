<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./static/css/components/header.css">
    <link rel="stylesheet" href="./static/css/style.css">
    <link rel="stylesheet" href="./static/css/components/footer.css">
</head>

<body>
<?php
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
            <button class="our-full-menu-header-button our-full-menu-header-button-active"
                    onclick="menuShow(1)">Coffe
            </button>
            <button class="our-full-menu-header-button" onclick="menuShow(2)">Drinks</button>
            <button class="our-full-menu-header-button" onclick="menuShow(3)">Lunch</button>
            <button class="our-full-menu-header-button" onclick="menuShow(4)">Dinner</button>
        </div>
    </div>
    <div class="our-full-menu-body-container">
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

        <div class="our-full-menu-items-container">
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
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
        <div class="our-full-menu-items-container">
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
        <div class="our-full-menu-items-container">
            <div class="menu-item-container">
                <div class="menu-item-image-container">
                    <img src="./static/img/coffe-cup.jpg" width="100%" height="100%" class="menu-item-image"/>
                </div>
                <div class="menu-item-title-container">
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
                    <a href="./products.html" class="menu-item-title">Coffee Cup</a>
                    <div class="menu-item-price-container">
                        <div class="menu-item-prices">
                            <span class="menu-item-old-price">$3.00</span>
                            <span class="menu-item-price">$2.00</span>
                        </div>
                        <span class="menu-item-price-off center">10%</span>
                    </div>
                </div>
                <div class="menu-item-buttons-container">
                    <a class="menu-item-add-to-cart-button" href="./cart.html">Add to cart</a>
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
            <a href="./pages/menu.html" class="full-menu-load-more-button">Load More</a>
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

<script src="./static/js/script.js"></script>
<script src="./static/js/header.js"></script>

</body>

</html>