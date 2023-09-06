document.addEventListener("DOMContentLoaded", function () {
  const modalButtons = document.getElementsByClassName("admin-update-user-btn");

  for (let i = 0; i < modalButtons.length; i++) {
    const userId = modalButtons[i].getAttribute("data-user-id");

    const form = document.getElementById(`admModUpdForm_${userId}`);

    form.addEventListener("submit", async function (event) {
      event.preventDefault();

      const nameInput = document.querySelector(`#admModUpdNamInp_${userId}`),
        addressInp = document.querySelector(`#admModUpdAddInp_${userId}`),
        citySel = document.querySelector(`#admModCitSel_${userId}`),
        roleSel = document.querySelector(`#admModUpdRolSel_${userId}`);

      const sanNameInp = sanitizeInput(nameInput.value),
        sanAddressInp = sanitizeInput(addressInp.value),
        sanCitySel = sanitizeInput(citySel.value),
        sanRoleSel = sanitizeInput(roleSel.value);

      clearErrors();

      let errors = 0;

      if (sanNameInp === "") {
        displayErrors(nameInput.id, "Please provide the updated name");
        nameInput.classList.add("failed-input");
        errors++;
      } else {
        nameInput.classList.remove("failed-input");
        nameInput.classList.add("success-input");
      }

      if (sanAddressInp === "") {
        displayErrors(addressInp.id, "Please provide the updated address");
        addressInp.classList.add("failed-input");
        errors++;
      } else {
        addressInp.classList.remove("failed-input");
        addressInp.classList.add("success-input");
      }

      if (sanCitySel === "") {
        displayErrors(citySel.id, "Please provide the updated city");
        citySel.classList.add("failed-input");
        errors++;
      } else {
        citySel.classList.remove("failed-input");
        citySel.classList.add("success-input");
      }

      if (sanRoleSel === "") {
        displayErrors(roleSel.id, "Please provide the updated role");
        roleSel.classList.add("failed-input");
        errors++;
      } else {
        roleSel.classList.remove("failed-input");
        roleSel.classList.add("success-input");
      }

      errors > 0 ? console.log("there was an error") : this.submit();
    });
  }

  function sanitizeInput(input) {
    const tempElem = document.createElement("div");
    const sanitizedInput = input.replace(/<script>/gi, "");

    tempElem.textContent = sanitizedInput;

    return tempElem.textContent;
  }

  function displayErrors(inputId, message) {
    const errorElement = document.getElementById(inputId + "Error");

    errorElement
      ? (errorElement.textContent = message)
      : (errorElement.textContent = "");
  }

  function clearErrors() {
    const errorElements = document.querySelectorAll(".error-message");
    errorElements.forEach((errorElement) => {
      errorElement.textContent = "";
    });
  }
});
