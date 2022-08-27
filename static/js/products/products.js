// Cup Sizing Select Section

let cupes = document.querySelectorAll('.cup-size');
let detailWeightSize = document.getElementById('detail-weight-size'),
    detailMilkSize = document.getElementById('detail-milk-size');

cupSelectColorize = (number, priceNumber) => {
    let index;
    let price = document.querySelector('.price')
    for (index = 0; index < cupes.length; index++) {
        cupes[index].className = 'cup-size center';
    }
    price.innerHTML = '<i class="bi bi-currency-dollar" style="font-size: inherit; color: #fff;"></i> ';
    if (number == 0) {
        price.innerHTML += parseFloat(priceNumber).toFixed(2);
        detailWeightSize.innerText = '150 cc';
        detailMilkSize.innerText = '40 cc'

    } else if (number == 1) {
        price.innerHTML += parseFloat(priceNumber + 2).toFixed(2);
        detailWeightSize.innerText = '250 cc';
        detailMilkSize.innerText = '60 cc'
    } else {
        price.innerHTML += parseFloat(priceNumber + 3).toFixed(2);
        detailWeightSize.innerText = '350 cc';
        detailMilkSize.innerText = '80 cc';
    }

    cupes[number].className += ' cup-size-active'
}

sugerTypeSelect = number => {
    let index;
    let sugerTypesButtons = document.querySelectorAll('.suger-select-button');
    for (index = 0; index < sugerTypesButtons.length; index++) {
        sugerTypesButtons[index].className = 'suger-select-button'
    }

    sugerTypesButtons[number].className += ' suger-select-button-active'
}

// Image Modal

let mainProductImg = document.getElementById('main-product-image');
let modalContainer = document.getElementById('modal-container');
let modalImage = document.getElementById('modal-image');
let modalCaptionText = document.getElementById('modal-caption');
let modalCloseButton = document.getElementsByClassName('modal-close-button')[0];


mainProductImg.addEventListener('click', () => {
    modalContainer.style.display = 'block';
    modalImage.src = mainProductImg.src;
    modalCaptionText.innerText = mainProductImg.alt;
})

modalCloseButton.addEventListener('click', () => {
    modalContainer.style.display = 'none';
})


// Change Main product Picture by click on other porduct pictures

let moreProductPictures = document.getElementsByClassName('more-picture-item-image');

[...moreProductPictures].forEach(moreProductPicture => {
    moreProductPicture.addEventListener('click', () => {
        let lastMainPictureSrc = mainProductImg.src
        mainProductImg.src = moreProductPicture.src;
        moreProductPicture.src = lastMainPictureSrc;
    })
})

// Related Items carousel
let carouselProductCards = [...document.getElementsByClassName('carousel-product-card')];
let carouselNextButton = document.getElementById("change-carousel-items-button-next");
let carouselPreviousButton = document.getElementById("change-carousel-items-button-previous");
let firstActiveItemIndex = 0;
let lastActiveItemIndex = 4;
carouselNextButton.addEventListener('click', (e) => {
    if (lastActiveItemIndex === carouselProductCards.length - 1) {
        e.preventDefault();
        return null;
    }
    lastActiveItemIndex++;
    carouselProductCards[lastActiveItemIndex].className = 'carousel-product-card carousel-product-card-active';
    carouselProductCards[firstActiveItemIndex].className = 'carousel-product-card';
    firstActiveItemIndex++;
})

carouselPreviousButton.addEventListener('click', (e) => {
    if (firstActiveItemIndex === 0) {
        e.preventDefault();
        return null;
    }
    carouselProductCards[lastActiveItemIndex].className = 'carousel-product-card';
    lastActiveItemIndex--;
    firstActiveItemIndex--;
    carouselProductCards[firstActiveItemIndex].className = 'carousel-product-card carousel-product-card-active';
})

// New Comment Star rate

let newCommentStars = [...document.getElementsByClassName('new-comments-star')];
let newCommentStarsFill = [...document.getElementsByClassName('new-comments-star-fill')];
let newCommentStarMarkSpan = document.getElementById('rate-the-product-star-mark')

const newCommentStarFillHandler = (newCommentStars, newCommentStarsFill) => {
    let i;
    newCommentStars.map(starIcon => {
        starIcon.onclick = () => {
            i = newCommentStars.indexOf(starIcon);
            for (i; i >= 0; i--) {
                newCommentStars[i].style.display = 'none';
            }
            i = newCommentStars.indexOf(starIcon);
            for (let starFillIndex = 0; starFillIndex <= i; starFillIndex++) {
                newCommentStarsFill[starFillIndex].style.display = 'inline-block';
                newCommentStarMarkSpan.innerText = `${starFillIndex + 1}.0`;
                setCommentMarkRate(starFillIndex + 1);
            }
        }
    });
    newCommentStarsFill.map(starFillIcon => {
        starFillIcon.onclick = () => {
            i = newCommentStarsFill.indexOf(starFillIcon);
            i++
            newCommentStarMarkSpan.innerText = `${i}.0`;
            setCommentMarkRate(i);
            for (i; i < newCommentStarsFill.length; i++) {
                newCommentStarsFill[i].style.display = 'none';
                newCommentStars[i].style.display = 'inline-block';
            }
        }
    })
}

function setCommentMarkRate(markNumber) {
    let markRateInput = document.getElementById("comment-rate-mark");
    markRateInput.value = markNumber;
}

newCommentStarFillHandler(newCommentStars, newCommentStarsFill)

// Add To cart With Ajax
const addRoCartButtonHandler = () => {
    let productID = parseInt(addToCartButton.getAttribute("productId"));
    let xhttpRequest = new XMLHttpRequest();
    xhttpRequest.onload = () => {
        if (xhttpRequest.status !== 200) {
            openAlertContainer("Error!", "SomeThing Bad Happend, Please Try Again!", "Try Again", addToCartButton(productId));
            return null;
        }
        openAlertContainer("Message: ", xhttpRequest.responseText);
    }
    xhttpRequest.open("GET", `../cart/addToCart.php?product_id=${productID}`);
    xhttpRequest.send();
}
// Add to cart for Main Product
let addToCartButton = document.querySelector(".add-to-cart-button");
addToCartButton.addEventListener("click", addRoCartButtonHandler);
// Add to cart for related products
let relatedProductsAddToCartButton = document.querySelectorAll(".product-cart-button");
relatedProductsAddToCartButton.forEach(element => {
    element.addEventListener("click", addRoCartButtonHandler);
})

// Add New Comment Handler
let sendCommentButton = document.getElementById("new-comment-button");
const sendCommentButtonHandler = () => {
    // TODO: we should get productID more secure than get it from hidden input
    let productID = document.getElementById("product_id");

    // Get All HTML Nodes to have their values
    let commentRateInput = document.getElementById("comment-rate-mark");
    let titleInput = document.getElementById("comment-title");
    let messageInput = document.getElementById("new-comment-message");

    // Make New variable to have input values
    let commentRateMark = commentRateInput.value;
    let titleValue = titleInput.value;
    let messageValue = messageInput.value;

    // Check Length to have a simple and Normal comment
    if (titleValue.length < 4 || messageValue.length < 10) {
        openAlertContainer("Warning!", "Please Fill Out the Input!");
        return null;
    }

    // Make a JSON object to send data to module
    let formData = {
        "productID": productID.value,
        "rateMark": commentRateMark,
        "title": titleValue,
        "message": messageValue
    }
    formData = JSON.stringify(formData);

    // Create a new XMLHttpRequest for sending Data
    let xHttpRequest = new XMLHttpRequest();
    xHttpRequest.onload = () => {
        let responseJson = xHttpRequest.responseText;
        responseJson = JSON.parse(responseJson);
        if (parseInt(responseJson["statusCode"])) {
            openAlertContainer(responseJson["title"], responseJson["responseMessage"]);
        } else {
            openAlertContainer(responseJson["title"], responseJson["responseMessage"], "Try Again", sendCommentButtonHandler);
        }
    }
    xHttpRequest.open("POST", "./addCommentToDB.php");
    // To Send Data like a html Form
    // TODO: Send data in different way!
    xHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xHttpRequest.send(`formData=${formData}`);
}
sendCommentButton.addEventListener('click', sendCommentButtonHandler);

// Like Comment Section
let likeCommentIcon = document.querySelectorAll(".comment-like-dislike-container>.bi-heart");
let likeCommentIconFill = document.querySelectorAll(".comment-like-dislike-container>.bi-heart-fill");
likeCommentIcon.forEach((icon, index) => {
    let commentID = icon.getAttribute("commentID");
    icon.addEventListener("click", () => {
        // Validate The commentID and UserID
        if (parseInt(commentID) < 1) {
            openAlertContainer("Error", "Comment ID is not Valid!");
            return;
        }
        // Make Json object for sending data!
        let commentData = {
            "commentID": commentID,
        }
        commentData = JSON.stringify(commentData);
        // make new ajax request
        let likeCommentRequest = new XMLHttpRequest();
        likeCommentRequest.open("POST", "/php-store/products/components/likeComment.php");
        likeCommentRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        likeCommentRequest.send(`data=${commentData}`);
        likeCommentRequest.onload = () => {
            let responseJson = JSON.parse(likeCommentRequest.responseText);
            openAlertContainer(responseJson.title, responseJson.message);
            if (parseInt(responseJson.status)) {
                icon.classList.remove("bi-heart");
                icon.classList.add("bi-heart-fill");
            }
        }
    })
})