document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll(".star");
  const ratingHiddenInp = document.getElementById("proDetPrvRatStrHdnInp"); // Select the input field

  stars.forEach(function (star) {
    star.addEventListener("click", function () {
      const rating = this.getAttribute("data-rating");
      alert(`You rated this ${rating} star(s)!`); // You can replace this with your own logic, like sending the rating to the server.
      setActiveStars(rating);
      // Set the value of the hidden input field
      ratingHiddenInp.value = rating;
    });

    star.addEventListener("mouseenter", function () {
      const rating = this.getAttribute("data-rating");
      setActiveStars(rating);
      // Set the value of the hidden input field
      ratingHiddenInp.value = rating;
    });
  });

  function setActiveStars(rating) {
    stars.forEach(function (star) {
      if (star.getAttribute("data-rating") <= rating) {
        star.classList.add("active-rating");
      } else {
        star.classList.remove("active-rating");
      }
    });
  }
});
