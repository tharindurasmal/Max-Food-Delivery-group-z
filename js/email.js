document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(event.target);

    fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('popupTitle').textContent = "Thank you!";
            document.getElementById('popupMessage').textContent = "Your message has been sent successfully.";
        } else {
            document.getElementById('popupTitle').textContent = "Error";
            document.getElementById('popupMessage').textContent = "There was an issue sending your message. Please try again later.";
        }
        document.getElementById('popupContainer').style.display = 'flex';
    })
    .catch(error => {
        document.getElementById('popupTitle').textContent = "Error";
        document.getElementById('popupMessage').textContent = "There was an issue sending your message. Please try again later.";
        document.getElementById('popupContainer').style.display = 'flex';
    });
});

document.getElementById('closePopup').addEventListener('click', function() {
    document.getElementById('popupContainer').style.display = 'none';
});