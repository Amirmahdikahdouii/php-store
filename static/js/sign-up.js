let submitButton = document.querySelector(".submit-form-button");
submitButton.addEventListener("click", (event) => {
    let emailInput = document.getElementById("email");
    let passwordInput = document.getElementById("password");
    let confirmPasswordInput = document.getElementById("confirm-password");
    let csrfTokenInput = document.getElementById("csrf_token");
    let emailInputValue = emailInput.value.trim();
    let passwordInputValue = passwordInput.value;
    let confirmPasswordInputValue = confirmPasswordInput.value;
    let csrfTokenInputValue = csrfTokenInput.value;
    let emailValidationRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const stopEvent = (message) => {
        alert(message);
        event.preventDefault();
        return null;
    }
    const checkLengthOfInputValues = (inputValue, validLength, message) => {
        if (inputValue.length > validLength) {
            stopEvent(message);
        }
    }
    if (!emailInputValue.match(emailValidationRegex)) {
        stopEvent("Please enter valid E-Mail");
    }
    checkLengthOfInputValues(emailInputValue, 50, "email should be maximum 50 character");
    if (passwordInputValue !== confirmPasswordInputValue) {
        stopEvent("Password Field and Confirm Password Field Values are not match!");
    }
    checkLengthOfInputValues(passwordInputValue, 80, "password should be maximum 80 character");
    let xHttpRequest = new XMLHttpRequest();
    xHttpRequest.onload = () => {
        if(xHttpRequest.status !== 200){
            alert("Email already exists!");
            return null;
        }
        alert("User successfully Created");
        window.location.href = "http://127.0.0.1/php-store-project/Accounts/login.php";
    }
    xHttpRequest.open("POST", "http://127.0.0.1/php-store-project/Accounts/makeUser.php");
    xHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xHttpRequest.send(`email=${emailInputValue}&password=${passwordInputValue}`);
})