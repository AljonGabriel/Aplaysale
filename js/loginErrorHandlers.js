//load the DOM first
document.addEventListener("DOMContentLoaded", function () {
  const loginFormExist = document.getElementById("loginForm");
  if (loginFormExist) {
    //add event listener to signup form to prevent the submit default behaviour (Reload the page)
    document
      .getElementById("loginForm")
      .addEventListener("submit", async function (event) {
        event.preventDefault();

        const emalInput = document.getElementById("lgnEmaInp"),
          pwdInput = document.getElementById("lgnPwdInp");

        const sanEmailInpVal = sanitizeInputs(emalInput.value),
          sanPwdInpVal = sanitizeInputs(pwdInput.value);

        const inputsToClear = [emalInput, pwdInput];

        // Clear previous error messages
        clearErrors(inputsToClear);

        let errors = 0;

        if (sanEmailInpVal === "") {
          displayError(emalInput.id, "Please enter your email address");
          emalInput.classList.add("failed-input");
          errors++;
        } else {
          const isEmailExist = await isEmailWrong(sanEmailInpVal);
          console.log(isEmailExist);
          if (isEmailExist) {
            displayError(emalInput.id, "Email is not registered");
            emalInput.classList.add("failed-input");
            errors++;
          } else {
            emalInput.classList.remove("failed-input");
            emalInput.classList.add("sucess-input");
          }
        }

        if (sanPwdInpVal === "") {
          displayError(pwdInput.id, "Please confirm your password");
          pwdInput.classList.add("failed-input");
          errors++;
        } else {
          pwdInput.classList.remove("failed-input");
          pwdInput.classList.add("success-input");
        }

        errors > 0
          ? displayError("head", "Please fill in all the inputs correctly")
          : this.submit();
      });

    function sanitizeInputs(input) {
      const tempElem = document.createElement("div");
      const sanInput = input.replace(/<script>/gi, "");

      tempElem.textContent = sanInput;

      return tempElem.innerHTML;
    }

    function displayError(inputId, message) {
      const errorElement = document.getElementById(inputId + "Error");

      errorElement
        ? (errorElement.textContent = message)
        : (errorElement.textContent = " ");
    }

    // Clear all error messages
    function clearErrors(inputs) {
      const errorElements = document.querySelectorAll(".error-message");
      errorElements.forEach((errorElement) => {
        errorElement.textContent = "";
      });

      inputs.forEach((input) => {
        input.classList.remove("success-input", "failed-input");
      });
    }

    // Function to check if user credentials match
    async function isEmailWrong(email) {
      const response = await fetch("inc/login/is_email_wrong.inc.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({email}),
      });

      const data = await response.text();
      console.log(data);

      try {
        const jsonData = JSON.parse(data);
        return jsonData.message === "E-mail can't be found";
      } catch (error) {
        console.error("JSON parsing error:", error);
        return false;
      }
    }
  }
});
