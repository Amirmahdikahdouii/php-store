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
    xhttpRequest.open("GET", `../cart/addToCart.php?product_id=${productId}`);
    xhttpRequest.send();
}

// Admin Update Product With Modal, Ajax For Send to module to update DataBase and Work With JSON
let updateProductButtons = document.querySelectorAll(".menu-item-update-product-button");
updateProductButtons.forEach((element, index) => {
    element.addEventListener("click", () => {
        // Update Product Modal Container
        let updateProductModalContainer = document.querySelector(".update-product-modal-container");

        // Get Product Input for updating
        let updateNameInput = document.getElementById("update-product-name");
        let updateCountInput = document.getElementById("update-product-count");
        let updatePriceInput = document.getElementById("update-product-price");
        let updateProductOffPrice = document.getElementById("update-product-off-price");
        let updateProductActive = document.getElementById("update-product-active");

        // get Product Id
        let productId = parseInt(element.getAttribute("productId"));

        // Ajax Request to module
        let xhttpRequest = new XMLHttpRequest();
        xhttpRequest.onload = () => {
            // Get Product Info
            let productInfo = JSON.parse(xhttpRequest.responseText);
            updateNameInput.value = productInfo.productName;
            updatePriceInput.value = parseFloat(productInfo.productPrice);
            updateCountInput.value = parseInt(productInfo.productCount);
            if (parseInt(productInfo.productOff)) {
                updateProductOffPrice.checked = true;
            }
            if (parseInt(productInfo.productActive)) {
                updateProductActive.checked = true;
            }
            updateProductModalContainer.classList.add("update-product-modal-container-active");

            // Update Form Values Into DB
            let UpdateFormValueButton = document.getElementById("update-product-info-button");
            UpdateFormValueButton.addEventListener("click", () => {
                let updateProductRequest = new XMLHttpRequest();
                productInfo.productName = updateNameInput.value;
                productInfo.productPrice = updatePriceInput.value;
                productInfo.productCount = updateCountInput.value;
                if (updateProductOffPrice.checked) {
                    productInfo.productOff = 1;
                } else {
                    productInfo.productOff = 0;
                }
                if (updateProductActive.checked) {
                    productInfo.productActive = 1;
                } else {
                    productInfo.productActive = 0;
                }
                productInfo = JSON.stringify(productInfo);
                updateProductRequest.open("POST", "./admin/updateProductInfo.php");
                updateProductRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                updateProductRequest.send(`productData=${productInfo}`);
            })
        }
        xhttpRequest.open("GET", `./admin/getProductInfo.php?id=${productId}`);
        xhttpRequest.send();
    })
})