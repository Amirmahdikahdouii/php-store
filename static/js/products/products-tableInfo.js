// product-more-detail-table-read-more-button handler

let productsDetailTableRows = document.getElementsByClassName('product-more-detail-table-row');
for (let i = 0; i <= 3; i++) {
    productsDetailTableRows[i].style.display = 'flex';
}

let productDetailTableReadMoreButton = document.getElementById('product-more-detail-table-read-more-button');
let productDetailTableReadLessButton = document.getElementById('product-more-detail-table-read-less-button');
if (productsDetailTableRows.length > 4) {
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
}