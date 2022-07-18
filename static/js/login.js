// Show User Not Found Modal Handler
// We call showUserNotFoundError method in window.onload when user not found
let closeUserNotFoundModalButton = document.getElementById('user-not-found-modal-close-button');
let modalContainer = document.getElementById('user-not-found-modal');
closeUserNotFoundModalButton.addEventListener('click', () => {
    modalContainer.className = 'user-not-found-modal';
    setTimeout(() => {
        modalContainer.style.display = 'none';
    }, 1000)
})
const showUserNotFoundError = () => {
    modalContainer.className = 'user-not-found-modal user-not-found-modal-active';
    modalContainer.style.display = 'flex';
}