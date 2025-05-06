// script.js

function toggleMenu() {
    const navbar = document.getElementById("navbar");
    navbar.classList.toggle("active");
}

// Get references to the elements
const showPopupLink = document.getElementById('showPopup');
const popup = document.getElementById('popup');
const notProfessionalButton = document.getElementById('notProfessional');
const professionalButton = document.getElementById('professional');

// Show the popup when the link is clicked
showPopupLink.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    popup.style.display = 'flex'; // Show the popup
});

// Redirect to public website if not a healthcare professional
notProfessionalButton.addEventListener('click', function() {
    popup.style.display = 'none'; // Hide the popup
});

// Close the popup if the user is a healthcare professional
professionalButton.addEventListener('click', function() {
    window.location.href = 'https://airbilinest.com/hcp/hcp.php';
    // You can add additional logic here, like allowing access to the rest of the website
});

// Optional: Close the popup if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target === popup) {
        popup.style.display = 'none';
    }
});

// Video
// document.addEventListener("DOMContentLoaded", () => {
//     const videos = document.querySelectorAll(".videPlayer");
//     let currentVideoIndex = 0;

//     // Fungsi untuk memutar video berikutnya
//     function playNextVideo() {
//         if (currentVideoIndex < videos.length - 1) {
//             // Hentikan video saat ini
//             videos[currentVideoIndex].classList.remove("active");
//             videos[currentVideoIndex].pause();

//             // Pindah ke video berikutnya
//             currentVideoIndex++;
//             videos[currentVideoIndex].classList.add("active");
//             videos[currentVideoIndex].play();
//         }
//     }

//     // Tambahkan event listener untuk setiap video
//     videos.forEach((video) => {
//         video.addEventListener("ended", playNextVideo);
//     });
// });