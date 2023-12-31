//load the DOM first
document.addEventListener("DOMContentLoaded", function () {
  //add event listener to signup form to prevent the submit default behaviour (Reload the page)
  document
    .getElementById("sgnForm")
    .addEventListener("submit", async function (event) {
      event.preventDefault();

      const nameInput = document.getElementById("sgnNamInp"),
        addressInput = document.getElementById("sgnAddInp"),
        citySelect = document.getElementById("sgnCitSel"),
        countrySelect = document.getElementById("sgnCouSel"),
        phoneNumberInput = document.getElementById("sgnPhoInp"),
        emailInput = document.getElementById("sgnEmaInp"),
        pwdInput = document.getElementById("sgnPwdInp"),
        rePwdInput = document.getElementById("sgnRePwdInp");

      // Sanitize input values
      const sanitizedCompleteName = sanitizeInput(nameInput.value),
        sanitizedAddress = sanitizeInput(addressInput.value),
        sanitizedPhoneNumber = sanitizeInput(phoneNumberInput.value),
        sanitizedEmail = sanitizeInput(emailInput.value);

      const inputsToClear = [
        nameInput,
        addressInput,
        phoneNumberInput,
        emailInput,
        pwdInput,
        rePwdInput,
        citySelect,
        countrySelect,
      ];

      // Clear previous error messages
      clearErrors(inputsToClear);

      let errors = 0;

      sanitizedCompleteName === ""
        ? (displayError(nameInput.id, "Please provide your complete name"),
          nameInput.classList.add("is-invalid"),
          errors++)
        : (nameInput.classList.remove("is-invalid"),
          nameInput.classList.add("is-valid"));

      //Address
      sanitizedAddress === ""
        ? (displayError(addressInput.id, "Please enter your complete address"),
          addressInput.classList.add("is-invalid"))
        : (addressInput.classList.remove("is-invalid"),
          addressInput.classList.add("is-valid"));

      //Country
      countrySelect.value === ""
        ? (countrySelect.classList.add("is-invalid"),
          citySelect.classList.add("is-invalid"),
          errors++)
        : (countrySelect.classList.remove("is-invalid"),
          citySelect.classList.remove("is-invalid"),
          countrySelect.classList.add("is-valid"),
          citySelect.classList.add("is-valid"));

      //Phone
      if (sanitizedPhoneNumber === "") {
        displayError(
          phoneNumberInput.id,
          "Please choose Country for the Country code",
        );
        phoneNumberInput.classList.add("is-invalid");
        errors++;
      } else {
        const validatedPhoneNumber = validatePhoneNumber(sanitizedPhoneNumber);
        if (validatedPhoneNumber) {
          displayError(
            phoneNumberInput.id,
            "Please provide a valid phone number",
          );
          phoneNumberInput.classList.add("is-invalid");
          errors++;
        } else {
          clearErrors(phoneNumberInput);
          phoneNumberInput.classList.remove("is-invalid");
          phoneNumberInput.classList.add("is-valid");
        }
      }

      //Email
      if (sanitizedEmail === "") {
        displayError(emailInput.id, "Please enter your email address");
        emailInput.classList.add("is-invalid");
        errors++;
      } else {
        const emailExists = await checkEmailExists(sanitizedEmail);
        if (emailExists) {
          displayError(emailInput.id, "The email is already used");
          emailInput.classList.add("is-invalid");
          errors++;
        } else {
          const validatedEmail = validateEmail(sanitizedEmail);
          if (validatedEmail) {
            displayError(emailInput.id, "Please enter a valid email address.");
            emailInput.classList.add("is-invalid");
            errors++;
          } else {
            emailInput.classList.remove("is-invalid");
            emailInput.classList.add("is-valid");
          }
        }
      }

      //Password
      if (pwdInput.value === "") {
        displayError(pwdInput.id, "Please enter a password");
        pwdInput.classList.add("is-invalid");
        errors++;
      } else {
        const errorMessage = validatePassword(pwdInput.value);
        if (errorMessage) {
          displayError(pwdInput.id, errorMessage);
          pwdInput.classList.add("is-invalid");
          errors++;
        } else {
          pwdInput.classList.remove("is-invalid");
          pwdInput.classList.add("is-valid");
        }
      }

      //RePassword
      if (rePwdInput.value === "") {
        displayError(rePwdInput.id, "Please confirm your password");
        rePwdInput.classList.add("is-invalid");
        errors++;
      } else {
        const checkedPwdMatch = checkPaswordMatch(pwdInput, rePwdInput);
        if (!checkedPwdMatch) {
          displayError(rePwdInput.id, "Password didn't match");
          rePwdInput.classList.add("is-invalid");
          errors++;
        } else {
          rePwdInput.classList.remove("is-invalid");
          rePwdInput.classList.add("is-valid");
        }
      }

      console.log(errors);

      errors > 0
        ? displayError("sgnHead", "Please fill in all the inputs correctly")
        : this.submit();
    });

  // Display error messages
  function displayError(inputId, message) {
    const errorElement = document.getElementById(inputId + "Error");

    errorElement
      ? (errorElement.textContent = message)
      : (errorElement.textContent = " ");
  }

  // Clear all error messages and remove is-invalid class
  function clearErrors(inputs) {
    const errorElements = document.querySelectorAll(".error-message");
    errorElements.forEach((errorElement) => {
      errorElement.textContent = "";
    });

    console.log("Inputs type:", typeof inputs);

    // Ensure inputs is an array before attempting to use forEach
    if (Array.isArray(inputs)) {
      console.log("Inputs type:", typeof inputs);
      console.log(inputs);
      inputs.forEach((input) => {
        input.classList.remove("is-invalid");
      });
    }
  }

  //Sanitize Inputs
  function sanitizeInput(input) {
    const tempElement = document.createElement("div");
    const sanitizedInput = input.replace(/<script>/gi, "");

    tempElement.textContent = sanitizedInput;

    return tempElement.innerHTML;
  }

  // Function to check if email exists and return a boolean value
  async function checkEmailExists(email) {
    const response = await fetch("inc/signup/check_email.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({email}),
    });

    const data = await response.text();

    try {
      const jsonData = JSON.parse(data);
      return jsonData.message === "Email already exists";
    } catch (error) {
      console.error("JSON parsing error:", error);
      return false;
    }
  }

  function validatePhoneNumber(number) {
    const phoneNumber = number.substring(4); // Remove country code
    const phoneNumberRegex = /^\d{7,}$/; // Minimum 7 digits after country code

    const result = !phoneNumberRegex.test(phoneNumber);

    if (result) {
      return true;
    } else {
      return false;
    }
  }

  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return !emailRegex.test(email);
  }

  function checkPaswordMatch(password, repassword) {
    const pwd = password.value;
    const rePwd = repassword.value;

    const result = pwd === rePwd;

    console.log(result);

    return result;
  }

  function validatePassword(password) {
    // Define password requirements
    const minLength = 8;
    const maxLength = 20;
    const hasUppercase = /[A-Z]/.test(password);
    const hasLowercase = /[a-z]/.test(password);
    const hasDigit = /\d/.test(password);
    const hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\-/\\]/.test(password);

    // Check password length
    if (password.length < minLength || password.length > maxLength) {
      return (
        "Password must be between " +
        minLength +
        " and " +
        maxLength +
        " characters"
      );
    }

    let error;

    // Check character requirements
    if (!hasUppercase) {
      error = "Password must contain at least one uppercase letter";
    }

    if (!hasLowercase) {
      error = "Password must contain at least one lowercase letter";
    }

    if (!hasDigit) {
      error = "Password must contain at least one digit";
    }

    if (!hasSpecialChar) {
      error = "Password must contain at least one special character";
    }

    // Password is valid
    return error;
  }
});
