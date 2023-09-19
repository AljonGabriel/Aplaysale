const stockSelect = document.querySelector("#admPrdStk");
const multipleItemContainer = document.querySelector("#admPrdMItmContainer");

stockSelect.addEventListener("change", () => {
  stockSelect.value === "multipleItem"
    ? (multipleItemContainer.style.display = "block")
    : (multipleItemContainer.style.display = "none");
});
