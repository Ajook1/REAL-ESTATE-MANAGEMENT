
const slides = document.querySelectorAll(".slide");
const slideshowContainer = document.querySelector(".slideshow-container");

let slideIndex = 0;

function showSlide(index) {
    if (index < 0) {
        slideIndex = slides.length - 1;
    } else if (index >= slides.length) {
        slideIndex = 0;
    }

    slides.forEach((slide) => {
        slide.style.display = "none";
    });

    slides[slideIndex].style.display = "block";
}

function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

showSlide(slideIndex);

// Auto slide every 5 seconds
setInterval(nextSlide, 5000);

document.getElementById("logoutButton").addEventListener("click", function() {
    // Add your logout logic here
    alert("Logged out successfully");
  });
<script>
// Get the video
var video = document.getElementById("myVideo");
</script>