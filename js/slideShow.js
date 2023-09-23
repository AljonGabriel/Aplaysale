const btns = document.querySelectorAll("[data-carousel-button]");

// Function to move to the next slide
function nextSlide() {
  const slides = document.querySelector("[data-carousel] [data-slides]");
  const activeSlide = slides.querySelector("[data-active]");
  let newIndex = [...slides.children].indexOf(activeSlide) + 1;

  if (newIndex >= slides.children.length) newIndex = 0;

  activeSlide.removeAttribute("data-active");
  slides.children[newIndex].setAttribute("data-active", "true");
}

// Add click event listeners to "previous" and "next" buttons
btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const offset = btn.dataset.carouselButton === "next" ? 1 : -1;
    const slides = btn
      .closest("[data-carousel]")
      .querySelector("[data-slides]");
    const activeSlides = slides.querySelector("[data-active]");
    let newIndex = [...slides.children].indexOf(activeSlides) + offset;

    if (newIndex < 0) newIndex = slides.children.length - 1;
    if (newIndex >= slides.children.length) newIndex = 0;

    activeSlides.removeAttribute("data-active");
    slides.children[newIndex].setAttribute("data-active", "true");
  });
});

// Automatically advance the carousel every 5 seconds (adjust as needed)
setInterval(nextSlide, 5000);
