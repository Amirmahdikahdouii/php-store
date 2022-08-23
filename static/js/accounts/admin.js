// Add new Product For admin Section
let addNewProductButton = document.getElementById("admin-add-new-product-button");
addNewProductButton.addEventListener("click", () => {
    let selectProductCategories = document.getElementById("select-product-categories");
    // Get Product Categories Data
    let getProductCategoriesReuqest = new XMLHttpRequest();
    getProductCategoriesReuqest.open("GET", "./components/getProductCategories.php");
    getProductCategoriesReuqest.send();
    getProductCategoriesReuqest.onload = () => {
        let productCategories = JSON.parse(getProductCategoriesReuqest.responseText);
        for (index in productCategories) {
            let productCategory = productCategories[index];
            let optionTag = document.createElement("option");
            optionTag.setAttribute("value", productCategory['id']);
            optionTag.textContent = productCategory['category_name'];
            selectProductCategories.appendChild(optionTag);
        }
    }
})

// submit the new product data
let addNewProductSubmitButton = document.getElementById("add-new-product-submit-button");
addNewProductSubmitButton.addEventListener("click", () => {
    let newProductNameInput = document.getElementById('add-new-product-name');
    let newProductCountInput = document.getElementById('add-new-product-count');
    let newProductCategoryInput = document.getElementById('select-product-categories');
    let newProductPriceInput = document.getElementById("add-new-product-price");
    let newProductImageInput = document.getElementById("add-new-product-photo");
    // Get Images List
    let newProductImages = newProductImageInput.files;
    // Get specified Image
    let productImage = newProductImages[0];
    if ([...newProductImages].length > 0) {
        if (!productImage.type.match("image/*")) {
            openAlertContainer("Error", "file Uploaded is not an image!");
            return null;
        }
    } else {
        // if image is empty, productImage set to null
        productImage = null;
    }
    // Create Form Node
    let formNode = new FormData();
    formNode.append("name", newProductNameInput.value);
    formNode.append("count", newProductCountInput.value);
    formNode.append("categoryId", newProductCategoryInput.value);
    formNode.append("price", newProductPriceInput.value);
    if (productImage !== null) {
        formNode.append("Image", productImage, productImage.name);
    } else {
        openAlertContainer("Error", "Image Should not be empty!");
        return null;
    }
    // Create Request and send data
    let sendNewProductData = new XMLHttpRequest();
    sendNewProductData.open("POST", './components/addNewProduct.php');
    sendNewProductData.send(formNode);
    sendNewProductData.onload = () => {
        console.log(sendNewProductData.responseText);
        let JSONResponse = JSON.parse(sendNewProductData.responseText);
        openAlertContainer(JSONResponse.title, JSONResponse.message);
    }
})