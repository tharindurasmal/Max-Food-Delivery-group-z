document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.querySelector('#menu-btn');
    const navbar = document.querySelector('#MenuItems');

    menuBtn.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
});
