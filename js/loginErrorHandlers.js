document
  .getElementById("loginForm")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const emalInput = document.getElementById("lgnEmaInp"),
      pwdInput = document.getElementById("lgnPwdInp");

    const sanEmailInpVal = sanitizeInputs(emalInput.value),
      sanPwdInpVal = sanitizeInputs(pwdInput.value);

    // Clear previous error messages
    clearErrors();

    let errors = 0;

    if (sanEmailInpVal === "") {
      displayError(emalInput.id, "Please enter your email address");
      emalInput.classList.add("failed-input");
      errors++;
    } else {
      const credentialsMatch = await checkUserCredentials(
        sanEmailInpVal,
        sanPwdInpVal,
      );
      if (!credentialsMatch) {
        displayError(emalInput.id, "Please enter correct Registered Email");
        displayError(pwdInput.id, "Please enter correct Registered Password");
        emalInput.classList.add("failed-input");
        errors++;
      } else {
        emalInput.classList.remove("failed-input");
        emalInput.classList.add("failed-input");
      }
    }

    if (sanPwdInpVal === "") {
      displayError(pwdInput.id, "Please confirm your password");
      errors++;
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
function clearErrors() {
  const errorElements = document.querySelectorAll(".error-message");
  errorElements.forEach((errorElement) => {
    errorElement.textContent = "";
  });
}

// Function to check if user credentials match
async function checkUserCredentials(email, password) {
  const response = await fetch("inc/login/check_user_pass_match.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({email, password}),
  });

  const data = await response.text();
  console.log(data);

  try {
    const jsonData = JSON.parse(data);
    return jsonData.message === "User Exist";
  } catch (error) {
    console.error("JSON parsing error:", error);
    return false;
  }
}
