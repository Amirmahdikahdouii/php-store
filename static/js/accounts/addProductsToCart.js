// Add To cart With Ajax
const addToCartButtonHandler = (productID) => {
    let addProductRequest = new XMLHttpRequest();
    addProductRequest.open("GET", `/php-store/cart/addToCart.php?product_id=${productID}`);
    addProductRequest.send();
}