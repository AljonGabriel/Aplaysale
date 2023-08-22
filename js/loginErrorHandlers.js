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

        console.log(sanEmailInpVal, sanPwdInpVal);

        const inputsToClear = [emalInput, pwdInput];

        // Clear previous error messages
        clearErrors(inputsToClear);

        let errors = 0;

        const isEmailAndPwdValid = await isEmailAndPasswordValid(
          sanEmailInpVal,
          sanPwdInpVal,
        );

        if (sanEmailInpVal === "") {
          displayError(emalInput.id, "Please enter your email address");
          emalInput.classList.add("failed-input");
          errors++;
        } else if (isEmailAndPwdValid.message === "E-mail can't be found") {
          displayError(emalInput.id, "The e-mail dont match our records");
          emalInput.classList.add("failed-input");
          errors++;
        } else {
          emalInput.classList.remove("failed-input");
          emalInput.classList.add("success-input");
        }

        if (sanPwdInpVal === "") {
          displayError(pwdInput.id, "Please confirm your password");
          pwdInput.classList.add("failed-input");
          errors++;
        } else if (isEmailAndPwdValid.message === "Password does not match") {
          displayError(pwdInput.id, isEmailAndPwdValid.message);
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

    async function isEmailAndPasswordValid(email, password) {
      try {
        const response = await fetch(
          "inc/login/is_email_and_password_not_valid.inc.php",
          {
            method: "POST",
            headers: {
              "Content-type": "application/json",
            },
            body: JSON.stringify({email, password}),
          },
        );
        /* 
        const responseText = await response.text();
        console.log(responseText); */

        const data = await response.json();
        console.log(data);

        return data;
      } catch (error) {
        console.error("Fetch error", error);
        return {message: "An error occured"};
      }
    }
  }
});
