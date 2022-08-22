// Plus, Minus and Delete Product

let plusBottons = [...document.getElementsByClassName('cart-list-item-plus-button')];
let minusBottons = [...document.getElementsByClassName('cart-list-item-mines-button')];
let deleteButtons = [...document.getElementsByClassName('cart-list-item-delete-button')];
let productCounters = [...document.getElementsByClassName('cart-list-item-count')];
let cartProducts = [...document.getElementsByClassName('cart-list-item')];

// add and remove Count Of product in user cart handler
const updateProductCountHandler = (button, productId, index, productStatusChange = 1) => {
    if ([...button.classList].indexOf("cart-list-item-cart-info-plus-count-button-deactive") !== -1) {
        return null;
    }
    openloadingSpinner();
    let addCountProductToUserCartRequest = new XMLHttpRequest();
    addCountProductToUserCartRequest.open("POST", `/php-store/Accounts/components/addProductCountToUserCart.php`);
    addCountProductToUserCartRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    addCountProductToUserCartRequest.send(`productId=${productId}&productStatusChange=${productStatusChange}`);
    addCountProductToUserCartRequest.onload = () => {
        let response = JSON.parse(addCountProductToUserCartRequest.responseText);
        let productCountCounter = document.querySelectorAll(".cart-list-item-count")[index];
        if (parseInt(response.status) && addCountProductToUserCartRequest.status === 200) {
            openAlertContainer(response.title, response.messageText);
            productCountCounter.textContent = response.productCount;
            // TODO: Update Product Price and Full Prices, price With off and any thing related to update price, should be done!
            if (parseInt(response.productCount) === 1) {
                let minusButton = document.querySelectorAll(".cart-list-item-mines-button")[index];
                minusButton.classList.add('cart-list-item-cart-info-plus-count-button-deactive');
            } else if (parseInt(response.productCount) === 2) {
                let minusButton = document.querySelectorAll(".cart-list-item-mines-button")[index];
                minusButton.classList.remove('cart-list-item-cart-info-plus-count-button-deactive');
            } else if (parseInt(response.productCount) === 10) {
                let plusButton = document.querySelectorAll(".cart-list-item-plus-button")[index];
                plusButton.classList.add('cart-list-item-cart-info-plus-count-button-deactive');
            } else if (parseInt(response.productCount) === 9) {
                let plusButton = document.querySelectorAll(".cart-list-item-plus-button")[index];
                plusButton.classList.remove('cart-list-item-cart-info-plus-count-button-deactive');
            }
        } else {
            openAlertContainer(response.title, response.messageText);
        }
    }
}

plusBottons.forEach((plusButton, index) => {
    let productId = parseInt(plusButton.getAttribute("productID"));
    plusButton.addEventListener('click', () => {
        updateProductCountHandler(plusButton, productId, index)
    })
});

minusBottons.forEach((minusButton, index) => {
    let productId = parseInt(minusButton.getAttribute("productID"));
    minusButton.addEventListener('click', () => {
        updateProductCountHandler(minusButton, productId, index, 2)
    })
});

// DELETE product From user Cart
deleteButtons.forEach((button, index) => {
    let productId = parseInt(button.getAttribute("productId"));
    button.addEventListener("click", () => {
        openloadingSpinner();
        let addCountProductToUserCartRequest = new XMLHttpRequest();
        addCountProductToUserCartRequest.open("POST", `/php-store/Accounts/components/deleteProductCountToUserCart.php`);
        addCountProductToUserCartRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        addCountProductToUserCartRequest.send(`productId=${productId}`);
        addCountProductToUserCartRequest.onload = () => {
            let response = JSON.parse(addCountProductToUserCartRequest.responseText);
            let productCountCounter = document.querySelectorAll(".cart-list-item")[index];
            if (parseInt(response.status) && addCountProductToUserCartRequest.status === 200) {
                openAlertContainer("Done!", "Product have been removed from your cart!");
                productCountCounter.style.opacity = "0";
                setTimeout(() => {
                    productCountCounter.remove();
                }, 600)
            } else {
                openAlertContainer("Error", "Something Wrong happend!");
            }
        }
    })
})
