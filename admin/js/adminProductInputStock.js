// Select the relevant elements
const stockSel = document.querySelector("#admPrdStk");
const stockContainer = document.querySelector("#admPrdMItmContainer");

// Listen for changes in the select element
stockSel.addEventListener("change", function () {
  // Check if the selected value is "multipleItem"
  if (stockSel.value === "multipleItem") {
    // Create a new label element
    const label = document.createElement("label");
    label.setAttribute("for", "admPrdMItm");

    // Create a small element for the red asterisk
    const small = document.createElement("small");
    small.style.color = "red";
    small.textContent = "*";

    // Append the small element to the label before the text
    label.appendChild(small);

    // Add the text "Quantity" after the asterisk
    label.appendChild(document.createTextNode("Quantity"));

    // Create a new input element
    const input = document.createElement("input");
    input.setAttribute("type", "number");
    input.setAttribute("name", "itemName");
    input.setAttribute("id", "admPrdMItm"); // Set the input's id to match the label's "for" attribute

    const divErrorCon = document.createElement("div");
    divErrorCon.setAttribute("class", "fieldErrors");

    const elementError = document.createElement("p");
    elementError.setAttribute("id", "admPrdMItmError");
    elementError.setAttribute("class", "error-message");

    divErrorCon.appendChild(elementError);
    // Append the label and input elements to the stockContainer
    stockContainer.appendChild(label);
    stockContainer.appendChild(input);
    stockContainer.appendChild(divErrorCon);
  } else {
    // If the selected value is not "multipleItem", remove any existing input elements
    stockContainer.innerHTML = "";
  }
});
