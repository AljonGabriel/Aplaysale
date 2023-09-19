const stockSelect = document.querySelector("#admPrdStkSel");
const multipleItemContainer = document.querySelector("#admPrdMItmContainer");

stockSelect.addEventListener("change", () => {
  stockSelect.value === "multipleItem"
    ? (multipleItemContainer.style.display = "block")
    : (multipleItemContainer.style.display = "none");
});
