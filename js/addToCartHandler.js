document.addEventListener("DOMContentLoaded", function () {
  const addToCartButton = document.querySelector("[name='cart']");
  const buyButton = document.querySelector("[name='buy']");
  const quantityInput = document.getElementById("prdDetQuaInp");

  addToCartButton.addEventListener("click", function (e) {
    e.preventDefault();

    const isConfirmed = confirm("Add this item to your cart?");

    if (isConfirmed) {
      const currentURL = window.location.href;
      // Use a regular expression to extract the product ID from the URL
      const productIdMatch = currentURL.match(/product_id=(\d+)/);
      const productID = parseInt(productIdMatch[1]);

      if (quantityInput && quantityInput.value !== "") {
        // Construct the URL with the quantity as a query parameter
        const url = `inc/cart/add_to_cart.inc.php?product_id=${productID}&quantity=${quantityInput.value}`;
        // Redirect to the new URL
        window.location.href = url;
      } else {
        const stockDisplay = document.getElementById("prdDetStoDis");
        // If quantity is empty, redirect differently (e.g., for singleStock)
        const url = `inc/cart/add_to_cart.inc.php?product_id=${productID}&quantity=1`;
        // Redirect to the new URL
        window.location.href = url;
      }
    }
  });

  // Buy button action (You can add functionality here if needed)
  buyButton.addEventListener("click", function () {});
});
