let mainSection = document.querySelector('.main-section');
let sideBarMenu = document.getElementById('SideBar-menu-container');
//showContentHandler

showContentHandler = (contentId, tagId) => {
    let mainSectionContents = [...document.getElementsByClassName('main-section-content-container')];
    mainSectionContents.forEach(content => {
        content.style.display = 'none';
    });
    let contentHasToShow = document.getElementById(contentId);
    contentHasToShow.style.display = 'flex';
    let sideBarMenuItems = [...document.getElementsByClassName('sideBar-menu-item')];
    sideBarMenuItems.forEach(item => {
        item.children[0].className = '';
    })
    let tag = document.getElementById(tagId);
    tag.className = 'sideBar-menu-item-active';
}

// Factors According

let factorsAccordingsOpenButtons = [...document.getElementsByClassName('factor-item-menu-botton-open')];
let factorsAccordingsCloseButtons = [...document.getElementsByClassName('factor-item-menu-botton-close')];
let factorAccordingContainers = [...document.getElementsByClassName('factor-item-according-container')];

factorsAccordingsOpenButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        button.style.display = 'none';
        factorsAccordingsCloseButtons[index].style.display = 'block';
        factorAccordingContainers[index].style.maxHeight = factorAccordingContainers[index].scrollHeight + "px";
    })
});

factorsAccordingsCloseButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        button.style.display = 'none';
        factorsAccordingsOpenButtons[index].style.display = 'block';
        factorAccordingContainers[index].style.maxHeight = null;
    })
})

// User Address Bottons Handler

function UserAddressMethod() {
    let userAddressActionButtonsEdit = [...document.getElementsByClassName('user-address-action-button-edit')];
    let userAddressActionButtonsRemove = [...document.getElementsByClassName('user-address-action-button-remove')];
    let userAddressContainers = [...document.getElementsByClassName('user-address-container')];
    let userAddressRemoveModalContainer = [...document.querySelectorAll('.remove-address-modal-container')];
    let userAddressRemoveModalContainerBottonYes = [...document.querySelectorAll('.remove-address-modal-yes-botton')];
    let userAddressRemoveModalContainerButtonNo = [...document.querySelectorAll('.remove-address-modal-no-botton')];
    let userAddressEditModalContainer = [...document.getElementsByClassName('edit-address-modal-container')];
    let userAddressEditModalContainerCancelButtons = [...document.getElementsByClassName('edit-address-modal-cancel-botton')];
    let userAddressEditModalContainerConfirmButtons = [...document.getElementsByClassName('edit-address-modal-confirm-botton')];
    let userEditModalForm = [...document.getElementsByClassName('address-modal-edit-form')];
    let userAddressContents = [...document.getElementsByClassName('user-full-address')];
    let userAdressInfoNames = [...document.getElementsByClassName('user-address-info-name')];
    let userAdressInfoPhones = [...document.getElementsByClassName('user-address-info-phone')];
    let userAdressInfoTelephones = [...document.getElementsByClassName('user-address-info-telephone')];
    let userAdressInfoPostCodes = [...document.getElementsByClassName('user-address-info-postCode')];


    userAddressActionButtonsRemove.forEach((button, index) => {
        button.addEventListener('click', () => {
            userAddressRemoveModalContainer[index].style.display = "block";
            userAddressRemoveModalContainer[index].style.opacity = "1";
            userAddressRemoveModalContainerBottonYes[index].addEventListener('click', () => {
                userAddressRemoveModalContainer[index].style.display = 'none';
                userAddressContainers[index].remove()
            });
            userAddressRemoveModalContainerButtonNo[index].addEventListener('click', () => {
                userAddressRemoveModalContainer[index].style.opacity = "0";
                setTimeout(function () { userAddressRemoveModalContainer[index].style.display = "none"; }, 600);
            });
        })
    });

    userAddressActionButtonsEdit.forEach((button, index) => {
        button.addEventListener('click', () => {
            userAddressEditModalContainer[index].style.display = "block";
            userAddressEditModalContainer[index].style.opacity = "1";
            userEditModalForm[index].children[0].value = userAddressContents[index].textContent;
            userEditModalForm[index].children[1].value = userAdressInfoNames[index].textContent;
            userEditModalForm[index].children[2].value = userAdressInfoTelephones[index].textContent;
            userEditModalForm[index].children[3].value = userAdressInfoPhones[index].textContent;
            userEditModalForm[index].children[4].value = userAdressInfoPostCodes[index].textContent;

            userAddressEditModalContainerConfirmButtons[index].addEventListener('click', () => {
                userAddressEditModalContainer[index].style.display = 'none';
                userAddressContents[index].textContent = userEditModalForm[index].children[0].value
                userAdressInfoNames[index].textContent = userEditModalForm[index].children[1].value
                userAdressInfoTelephones[index].textContent = userEditModalForm[index].children[2].value
                userAdressInfoPhones[index].textContent = userEditModalForm[index].children[3].value
                userAdressInfoPostCodes[index].textContent = userEditModalForm[index].children[4].value
            });

            userAddressEditModalContainerCancelButtons[index].addEventListener('click', () => {
                userAddressEditModalContainer[index].style.opacity = "0";
                setTimeout(function () { userAddressEditModalContainer[index].style.display = "none"; }, 600);
            });
        })
    });
    // Add New Address Section
    let addNewAddressButton = document.querySelector('.add-address-button');
    let addNewAddressContainer = document.querySelector('.add-new-address-container');


    addNewAddressButton.addEventListener('click', () => {
        userAddressContainers.forEach(container => {
            container.style.opacity = '0';
            setTimeout(() => container.style.display = 'none', 200)
        });
        addNewAddressContainer.style.display = 'flex';
        addNewAddressButton.parentNode.style.display = 'none';
    });

    // Add New Address Buttons Handlers
    let addNewAddressCancelButton = document.querySelector('.add-new-address-botton-cancel');
    let addNewAddressAddButton = document.querySelector('.add-new-address-botton-add');

    addNewAddressAddButton.addEventListener('click', () => {
        let userAddressContainersInstance = userAddressContainers[0];
        let newUserAddressContainersInstance = userAddressContainersInstance.cloneNode(true);
        function insertAfter(newNode, existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextElementSibling);
        }
        insertAfter(newUserAddressContainersInstance, userAddressContainers[userAddressContainers.length - 1]);
        userAddressContainers.push(newUserAddressContainersInstance);
        userAddressContainers[userAddressContainers.length - 1].querySelector('.user-address-title-container>.user-address-title').textContent = document.getElementById('add-new-address-form-input-address').value.substring(0, 8);
        userAddressContainers[userAddressContainers.length - 1].querySelector('.user-full-address-container>.user-full-address').textContent = document.getElementById('add-new-address-form-input-address').value;
        userAddressContainers[userAddressContainers.length - 1].querySelector('.user-address-info-container>.user-address-info-name').textContent = document.getElementById('add-new-address-form-input-name').value;
        userAddressContainers[userAddressContainers.length - 1].querySelector('.user-address-info-container>.user-address-info-telephone').textContent = document.getElementById('add-new-address-form-input-telephone').value;
        userAddressContainers[userAddressContainers.length - 1].querySelector('.user-address-info-container>.user-address-info-phone').textContent = document.getElementById('add-new-address-form-input-phone').value;
        userAddressContainers[userAddressContainers.length - 1].querySelector('.user-address-info-container>.user-address-info-postCode').textContent = document.getElementById('add-new-address-form-input-postalCode').value;
        UserAddressMethod();
    });


    addNewAddressCancelButton.addEventListener('click', () => {
        userAddressContainers.forEach(container => {
            container.style.opacity = '1';
            container.style.display = 'flex';
        });
        addNewAddressContainer.style.display = 'none';
        addNewAddressButton.parentNode.style.display = 'flex';
    });
}
UserAddressMethod();

// Check new password and confirm password inputes "Change Password Section"

let changePasswordFormButton = document.querySelector('.change-password-form-submit-button');

changePasswordFormButton.addEventListener('click', (e) => {
    let oldPassword = document.getElementById('change-password-form-old-password');
    let newPassword = document.getElementById('change-password-form-new-password');
    let newPasswordConfirm = document.getElementById('change-password-form-new-password-confirm');
    if (newPassword.value === "" || newPasswordConfirm.value === "" || oldPassword.value === "") {
        alert("Password Feilds are Empty!");
        oldPassword.style.border = '1px solid red';
        newPassword.style.border = '1px solid red';
        newPasswordConfirm.style.border = '1px solid red';
    }
    else if (newPassword.value !== newPasswordConfirm.value) {
        alert('New Passwords Feilds Value are not match!');
        newPassword.style.border = '1px solid red';
        newPasswordConfirm.style.border = '1px solid red';
        return null;
    } else {
        alert('Password Successfully changed!');
        changePasswordFormButton.parentElement.submit();
    }
})

// User Cart Section;

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
        let productCountCounter = document.querySelectorAll(".cart-list-item-cart-info-count")[index];
        if (parseInt(response.status) && addCountProductToUserCartRequest.status === 200) {
            openAlertContainer(response.title, response.messageText);
            productCountCounter.textContent = response.productCount;
            if (parseInt(response.productCount) === 1) {
                let minusButton = document.querySelectorAll(".cart-list-item-cart-info-mines-count-button")[index];
                minusButton.classList.add('cart-list-item-cart-info-plus-count-button-deactive');
            } else if (parseInt(response.productCount) === 2) {
                let minusButton = document.querySelectorAll(".cart-list-item-cart-info-mines-count-button")[index];
                minusButton.classList.remove('cart-list-item-cart-info-plus-count-button-deactive');
            } else if (parseInt(response.productCount) === 10) {
                let plusButton = document.querySelectorAll(".cart-list-item-cart-info-plus-count-button")[index];
                plusButton.classList.add('cart-list-item-cart-info-plus-count-button-deactive');
            } else if (parseInt(response.productCount) === 9) {
                let plusButton = document.querySelectorAll(".cart-list-item-cart-info-plus-count-button")[index];
                plusButton.classList.remove('cart-list-item-cart-info-plus-count-button-deactive');
            }
        } else {
            openAlertContainer(response.title, response.messageText);
        }
    }
}

// Add count into product cart
let addUserCartProductButtons = document.querySelectorAll(".cart-list-item-cart-info-plus-count-button");
addUserCartProductButtons.forEach((button, index) => {
    let productId = parseInt(button.getAttribute("productId"));
    button.addEventListener("click", () => {
        updateProductCountHandler(button, productId, index, 1)
    })
})

// Remove count into product cart
let removeUserCartProductButtons = document.querySelectorAll(".cart-list-item-cart-info-mines-count-button");
removeUserCartProductButtons.forEach((button, index) => {
    let productId = parseInt(button.getAttribute("productId"));
    button.addEventListener("click", () => {
        updateProductCountHandler(button, productId, index, 2);
    })
})

// DELETE product From user Cart
let deleteUserCartProductButtons = document.querySelectorAll(".cart-list-item-cart-info-remove-button");
deleteUserCartProductButtons.forEach((button, index) => {
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
                productCountCounter.remove();
            } else {
                openAlertContainer("Error", "Something Wrong happend!");
            }
        }
    })
})

// END User Cart Section;

// Change User Personal Info Section
let submitChangeUserInfoButton = document.querySelector(".change-personal-info-form-submit-button");
submitChangeUserInfoButton.addEventListener('click', () => {
    // let submitFormStatus = 0;
    // openAlertContainer("Alert!", "Are You Sure you Want submit Changes?", "Yes", () => {
    //     submitFormStatus = 1;
    //     alertContainer.style.display = "none";
    //     alertBodyContainer.style.display = "none";
    //     loadingSpinner.style.display = "block";
    // });
    // if (submitFormStatus === 0) {
    //     // Return Null if user doesnt submit alert
    //     return null;
    // }

    // Get Input Nodes
    let userNameInput = document.getElementById("change-personal-info-form-name");
    let userFamilyNameInput = document.getElementById("change-personal-info-form-family-name");
    let userBirthdayInput = document.getElementById("change-personal-info-form-birthday");
    let userPhoneNumberInput = document.getElementById("change-personal-info-form-phoneNumber");
    let userProfilePhotoInput = document.getElementById("change-personal-info-form-profile-photo");
    let photos = userProfilePhotoInput.files;
    let photo = photos[0];
    if([...photos].length > 0){
        if(!photo.type.match("image.*")){
            openAlertContainer("Error", "file Uploaded is not an image!");
            return null;
        }
    }else{
        photo = null;
    }
    // Create Form Node
    let formNode = new FormData();
    formNode.append("name", userNameInput.value);
    formNode.append("familyName", userFamilyNameInput.value);
    formNode.append("birthday", userBirthdayInput.value);
    formNode.append("phoneNumber", userPhoneNumberInput.value);
    if(photo === null){
        formNode.append("profileImage", "");
    }else{
        formNode.append("profileImage", photo, photo.name);
    }
    // Create AJAX Request
    let sendFormRequest = new XMLHttpRequest();
    sendFormRequest.open("POST", "./components/updateUserPersonalInfo.php");
    sendFormRequest.send(formNode);
    sendFormRequest.onload = ()=>{
        let responseJson = JSON.parse(sendFormRequest.responseText);
        openAlertContainer(responseJson.title, responseJson.message);
    }
})