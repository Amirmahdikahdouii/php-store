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
                let productUpdatedInfo = { "productId": productInfo.productId };
                productUpdatedInfo.productName = updateNameInput.value;
                productUpdatedInfo.productPrice = updatePriceInput.value;
                productUpdatedInfo.productCount = updateCountInput.value;
                if (updateProductOffPrice.checked) {
                    productUpdatedInfo.productOff = 1;
                } else {
                    productUpdatedInfo.productOff = 0;
                }
                if (updateProductActive.checked) {
                    productUpdatedInfo.productActive = 1;
                } else {
                    productUpdatedInfo.productActive = 0;
                }
                productUpdatedInfo = JSON.stringify(productUpdatedInfo);
                updateProductRequest.onload = () => {
                    location.reload();
                    // TODO: Update Dom Without Refresh 
                }
                updateProductRequest.open("POST", "./admin/updateProductInfo.php");
                updateProductRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                updateProductRequest.send(`productData=${productUpdatedInfo}`);
            })
            // Delete Product Value From DB
            let deleteProductButton = document.getElementById("delete-product-info-button");
            deleteProductButton.addEventListener("click", () => {
                let deleteProductRequest = new XMLHttpRequest();
                deleteProductRequest.open("POST", "./admin/deleteProductInfo.php");
                deleteProductRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                deleteProductRequest.send(`id=${productInfo.productId}`);
                deleteProductRequest.onload = () => {
                    location.reload();
                }
            })
        }
        xhttpRequest.open("GET", `./admin/getProductInfo.php?id=${productId}`);
        xhttpRequest.send();
    })
})