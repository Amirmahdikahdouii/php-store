let checkUserAuthentication = new XMLHttpRequest();
checkUserAuthentication.open("GET", "./components/checkUserAuthentication.php");
checkUserAuthentication.send();
checkUserAuthentication.onload = () => {
    let responseJSON = JSON.parse(checkUserAuthentication.responseText);
    if (!responseJSON.user_authenticated) {
        location.replace("/php-store/Accounts/login.php");
    }
}

let confirmShoppingButton = document.getElementById("confirm-shoping-button");
confirmShoppingButton.addEventListener("click", () => {
    let userID = confirmShoppingButton.getAttribute("userID");
    let cartID = confirmShoppingButton.getAttribute("cartID");
    let sendUserData = new XMLHttpRequest();
    sendUserData.open("POST", "/php-store/orders/addOrderItem.php");
    sendUserData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    sendUserData.send(`userID=${userID}&cartID=${cartID}`);
    sendUserData.onload = () => {
        let responseJSON = JSON.parse(sendUserData.responseText);
        openAlertContainer(responseJSON.title, responseJSON.message);
        if (parseInt(responseJSON.status)) {
            openAlertContainer(responseJSON.title, responseJSON.message, "Reload Page", () => {
                location.reload();
            });
        } else {
            openAlertContainer(responseJSON.title, responseJSON.message);
        }
    }
})