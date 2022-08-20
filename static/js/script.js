// Add to Cart With Ajax and Request
const addToCartButton = (productId) => {
    let xhttpRequest = new XMLHttpRequest();
    xhttpRequest.onload = () => {
        if (xhttpRequest.status !== 200) {
            openAlertContainer("Error!", "SomeThing Bad Happend, Please Try Again!", "Try Again", addToCartButton(productId));
            return null;
        }
        openAlertContainer("Message: ", xhttpRequest.responseText);
    }
    xhttpRequest.open("GET", `/php-store/cart/addToCart.php?product_id=${productId}`);
    xhttpRequest.send();
}

// our-full-menu-header-button

let menuShow = number => {
    let ourFullMenuHeaderButton = document.getElementsByClassName('our-full-menu-header-button');
    let ourFullMenuItems = document.getElementsByClassName('our-full-menu-items-container');
    if (number > ourFullMenuHeaderButton.length) { number = 1 }
    if (number < 0) { number = ourFullMenuHeaderButton.length }
    let i;
    for (i = 0; i < ourFullMenuHeaderButton.length; i++) {
        ourFullMenuHeaderButton[i].className = 'our-full-menu-header-button';
    }
    for (i = 0; i < ourFullMenuItems.length; i++) {
        ourFullMenuItems[i].className = 'our-full-menu-items-container';
    }
    ourFullMenuHeaderButton[number - 1].className += ' our-full-menu-header-button-active';
    ourFullMenuItems[number - 1].className += ' our-full-menu-items-container-active';
}