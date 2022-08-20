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
        // In Onload, After getting product data from API, we display our modal to make changes;
        xhttpRequest.onload = () => {

            // Get Product Info
            let productInfo = JSON.parse(xhttpRequest.responseText);
            // Put Product Info in Inputs
            updateNameInput.value = productInfo.productName;
            updatePriceInput.value = parseFloat(productInfo.productPrice);
            updateCountInput.value = parseInt(productInfo.productCount);
            if (parseInt(productInfo.productOff)) {
                updateProductOffPrice.checked = true;
            }
            if (parseInt(productInfo.productActive)) {
                updateProductActive.checked = true;
            }
            // Show the hole modal Container
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
                    // location.reload();

                    // TODO: Update Dom Without Refresh
                    // Select product Card
                    let productCardContainer = document.querySelectorAll(".menu-item-container")[index];

                    // Remove Product Node After deactive Product
                    closeModalContainer();
                    openAlertContainer("Updated Successfully", "Product Updated Successfully!");
                    if (!updateProductActive.checked) {
                        productCardContainer.remove();
                        return null;
                    };

                    // New Request to get new Product Data;
                    let updateproductDataRequest = new XMLHttpRequest();
                    updateproductDataRequest.open("GET", `./admin/getProductInfo.php?id=${productId}`);
                    updateproductDataRequest.send();
                    updateproductDataRequest.onload = () => {
                        let newProductInfo = JSON.parse(updateproductDataRequest.responseText);
                        productCardContainer.querySelector(".menu-item-title").textContent = newProductInfo.productName;
                        productCardContainer.querySelector(".menu-item-price").innerHTML = `<i class="bi bi-currency-dollar"></i> ${parseFloat(newProductInfo.productPrice).toFixed(2)}`;
                        if (!updateProductOffPrice.checked) {
                            productCardContainer.querySelector(".menu-item-old-price").remove();
                        }
                    }
                }
                updateProductRequest.open("POST", "./admin/updateProductInfo.php");
                updateProductRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                updateProductRequest.send(`productData=${productUpdatedInfo}`);
            })

            // Close Modal Container
            let closeModalButton = document.getElementById("close-update-modal-button");
            let closeModalIcon = document.getElementById("close-update-product-modal");
            const closeModalContainer = () => {
                updateProductModalContainer.classList.remove("update-product-modal-container-active");
            }
            closeModalButton.addEventListener("click", closeModalContainer);
            closeModalIcon.addEventListener("click", closeModalContainer);
        }
        xhttpRequest.open("GET", `./admin/getProductInfo.php?id=${productId}`);
        xhttpRequest.send();
    })
})