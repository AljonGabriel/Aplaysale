document.addEventListener("DOMContentLoaded", function () {
  const modalButtons = document.getElementsByClassName(
    "admin-modal-update-user-btn-trg",
  );

  for (let i = 0; i < modalButtons.length; i++) {
    const userId = modalButtons[i].getAttribute("data-user-id");

    const form = document.getElementById(`admModUpdForm_${userId}`);

    form.addEventListener("submit", async function (event) {
      event.preventDefault();

      const nameInput = document.querySelector(`#admModUpdNamInp_${userId}`),
        addressInp = document.querySelector(`#admModUpdAddInp_${userId}`),
        citySel = document.querySelector(`#admModCitSel_${userId}`),
        roleSel = document.querySelector(`#admModUpdRolSel_${userId}`);
      pwdInp = document.querySelector(`#admModUpdPasInp_${userId}`);

      const sanNameInp = sanitizeInput(nameInput.value),
        sanAddressInp = sanitizeInput(addressInp.value),
        sanCitySel = sanitizeInput(citySel.value),
        sanRoleSel = sanitizeInput(roleSel.value),
        sanPwdInp = sanitizeInput(pwdInp.value);

      let errors = 0;

      if (sanNameInp === "") {
        console.log("Empty");
        errors++;
      } else {
        console.log("Nempty");
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
});
