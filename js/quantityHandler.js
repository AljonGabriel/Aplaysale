const incrementBtn = document.querySelector("#incrementBtn");
const decrementBtn = document.querySelector("#decrementBtn");
const quantityInput = document.querySelector("#prdDetQuaInp"); // Updated variable name

// Get the current URL
const currentURL = window.location.href;

// Use a regular expression to extract the product ID from the URL
const productIdMatch = currentURL.match(/product_id=(\d+)/);
const productID = parseInt(productIdMatch[1]);

let inputValue = 1;

if (quantityInput) {
  quantityInput.value = inputValue;

  quantityInput.addEventListener("input", (event) => {
    inputValue = event.target.value; // Update typedValue when the input changes
    checkQuantity();
  });
}

if (incrementBtn && decrementBtn) {
  incrementBtn.addEventListener("click", () => {
    increment();
    checkQuantity();
  });
  decrementBtn.addEventListener("click", () => {
    decrement();
    checkQuantity();
  });
}

async function checkQuantity() {
  try {
    const quantity = await getProductQuantity(productID); // Wait for the promise to resolve
    const stockDisplay = document.querySelector(".product-details-stocks");

    if (inputValue > quantity) {
      console.log("Too many");
      inputValue = quantity; // Set inputValue to the quantity limit
      stockDisplay.style.color = "var(--error-button)";
      updateQuantityInput();
    } else {
      stockDisplay.style.color = "var(--text)";
    }
  } catch (error) {
    console.error("Error:", error);
    // Handle the error as needed
  }
}

function increment() {
  inputValue++;
  if (inputValue >= 99) inputValue = 99; // Limit to 99
  updateQuantityInput();
}

function decrement() {
  inputValue--;
  if (inputValue <= 1) inputValue = 1; // Limit to 1
  updateQuantityInput();
}

function updateQuantityInput() {
  quantityInput.value = inputValue;
}

async function getProductQuantity(productID) {
  const response = await fetch("admin/inc/get_product_stock.inc.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({productID}),
  });

  try {
    const data = await response.json(); // Parse the response as JSON
    return parseInt(data.product_stocks); // Parse and store stocks as a number
    /*    console.log(stocks); */
  } catch (error) {
    console.error("Error:", error);
  }
}
