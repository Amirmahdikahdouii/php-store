let alertContainer = document.querySelector(".alert-container");
let loadingSpinner = document.querySelector(".loading-spinner");
let alertBodyContainer = document.querySelector(".alert-body-container");
let closeButton = document.getElementById("alert-close-button");
let alertTitle = document.querySelector(".alert-title");
let alertMessage = document.querySelector(".alert-message");
let alertButton = document.querySelector("#alert-button");

// Close Container Handler
const closeButtonHandler = () => {
    alertContainer.style.display = "none";
    alertBodyContainer.style.display = "none";
    loadingSpinner.style.display = "block";
}
closeButton.addEventListener("click", closeButtonHandler)

// Open Container Handler
const openAlertContainer = (alertTitleContent, alertMessageContent, alertButtonContent = "Close", alertButtonHandler = closeButtonHandler) => {
    alertContainer.style.display = "flex";
    setTimeout(() => {
        loadingSpinner.style.display = "none";
        alertBodyContainer.style.display = "flex";
    }, 2000)
    alertTitle.textContent = alertTitleContent;
    alertMessage.textContent = alertMessageContent;
    alertButton.textContent = alertButtonContent;
    alertButton.addEventListener("click", alertButtonHandler);
}

// Use openAlertContainer() Method to Open And Show Alert to users

// Open Loading Spinner
const openloadingSpinner = () => {
    alertContainer.style.display = "flex";
}