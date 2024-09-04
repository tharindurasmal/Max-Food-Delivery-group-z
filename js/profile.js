// Get the profile icon and the popup
const userBtn = document.getElementById('user-btn');
const profilePopup = document.getElementById('profile-popup');

// Toggle the profile popup when the icon is clicked
userBtn.addEventListener('click', () => {
    profilePopup.style.display = profilePopup.style.display === 'block' ? 'none' : 'block';
});

// Hide the profile popup when clicking outside of it
window.addEventListener('click', (event) => {
    if (event.target !== userBtn && !profilePopup.contains(event.target)) {
        profilePopup.style.display = 'none';
    }
});