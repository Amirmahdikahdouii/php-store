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

// product-more-detail-table-read-more-button handler

let productsDetailTableRows = document.getElementsByClassName('product-more-detail-table-row');
for (let i = 0; i <= 3; i++) {
    productsDetailTableRows[i].style.display = 'flex';
}

let productDetailTableReadMoreButton = document.getElementById('product-more-detail-table-read-more-button');
let productDetailTableReadLessButton = document.getElementById('product-more-detail-table-read-less-button');

productDetailTableReadMoreButton.addEventListener('click', () => {
    productDetailTableReadLessButton.style.display = 'block';
    productDetailTableReadMoreButton.style.display = 'none';
    for (let i = 0; i <= productsDetailTableRows.length; i++) {
        productsDetailTableRows[i].style.display = 'flex';
    }
});

productDetailTableReadLessButton.addEventListener('click', () => {
    productDetailTableReadMoreButton.style.display = 'block';
    productDetailTableReadLessButton.style.display = 'none';
    [...productsDetailTableRows].forEach(productsDetailTableRow => {
        productsDetailTableRow.style.display = 'none';
    });
    for (let i = 0; i <= 3; i++) {
        productsDetailTableRows[i].style.display = 'flex';
    }
});

// like-dislike comments icon

let unlikeCommentsIcons = document.getElementsByClassName('bi-heart'),
    likeCommentsIcons = document.getElementsByClassName('bi-heart-fill');
[...unlikeCommentsIcons].forEach(unlikeCommentIcon => {
    unlikeCommentIcon.addEventListener('click', () => {
        unlikeCommentIcon.style.display = 'none'
        unlikeCommentIcon.nextElementSibling.style.display = 'block'
    })
});

[...likeCommentsIcons].forEach(likeCommentsIcon => {
    likeCommentsIcon.addEventListener('click', () => {
        likeCommentsIcon.style.display = 'none';
        likeCommentsIcon.previousElementSibling.style.display = 'block';
    })
})

// New Comment Star rate

let newCommentStars = [...document.getElementsByClassName('new-comments-star')];
let newCommentStarsFill = [...document.getElementsByClassName('new-comments-star-fill')];
let newCommentStarMarkSpan = document.getElementById('rate-the-product-star-mark')

let newCommentStarFillHandler = (newCommentStars, newCommentStarsFill) => {
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
                newCommentStarMarkSpan.innerText = `${starFillIndex + 1}.0`
            }
        }
    });
    newCommentStarsFill.map(starFillIcon => {
        starFillIcon.onclick = () => {
            i = newCommentStarsFill.indexOf(starFillIcon);
            i++
            newCommentStarMarkSpan.innerText = `${i}.0`;
            for (i; i < newCommentStarsFill.length; i++) {
                newCommentStarsFill[i].style.display = 'none';
                newCommentStars[i].style.display = 'inline-block';
            }
        }
    })

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