document.getElementById('myForm').addEventListener('submit', async function (event) {
  event.preventDefault();

  const completeNameInput = document.getElementById('fullName');
  const addressInput = document.getElementById('address');
  const phoneNumberInput = document.getElementById('phoneNumber');

  const emailInput = document.getElementById('email');
  const pwdInput = document.getElementById('pwd');
  const rePwdInput = document.getElementById('rePwd');

  // Clear previous error messages
  clearErrors();

  let errors = 0;

  if (phoneNumberInput.value === '') {
    displayError('phoneNumber', 'Please choose Country for the Country code');
    phoneNumberInput.classList.add('failed-input');
    errors++;
  } else {
    const phoneNumberInputValue = phoneNumberInput.value;
    const validatedPhoneNumber = validatePhoneNumber(phoneNumberInputValue);
    if (validatedPhoneNumber) {
      displayError('phoneNumber', 'Invalid Number');
      phoneNumberInput.classList.add('failed-input');
      errors++;
    } else {
      clearErrors(phoneNumberInput);
      phoneNumberInput.classList.remove('failed-input');
      phoneNumberInput.classList.add('success-input');
    }
  }

  if (completeNameInput.value === '') {
    displayError('fullName', 'The name field is empty');
    completeNameInput.classList.add('failed-input');
    errors++;
  }

  if (addressInput.value === '') {
    displayError('address', 'The address field is empty');
    addressInput.classList.add('failed-input');
    errors++;
  }

  if (emailInput.value === '') {
    displayError('email', 'The email is empty');
    emailInput.classList.add('failed-input');
    errors++;
  } else {
    const emailInputValue = emailInput.value;
    const emailExists = await checkEmailExists(emailInputValue);
    if (emailExists) {
      displayError('email', 'The email is already used');
      email.classList.add('failed-input');
      errors++;
    }
  }

  if (pwdInput.value === '') {
    displayError('pwd', 'The password field is empty');
    pwdInput.classList.add('failed-input');
    errors++;
  }

  if (rePwdInput.value === '') {
    displayError('rePwd', 'The confirm password field is empty');
    rePwdInput.classList.add('failed-input');
    errors++;
  }

  console.log(errors);

  if (errors <= 0) {
    this.submit();
  }
});

// Display error messages
function displayError(inputId, errorMessage) {
  const errorElement = document.getElementById(inputId + 'Error');
  if (errorElement) {
    errorElement.textContent = errorMessage;
    return errorElement;
  } else {
  }
}

// Clear all error messages
function clearErrors() {
  const errorElements = document.querySelectorAll('.error-message');
  errorElements.forEach((errorElement) => {
    errorElement.textContent = '';
  });
}

// Function to check if email exists and return a boolean value
async function checkEmailExists(email) {
  const response = await fetch('inc/signup/check_email.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ email }),
  });

  const data = await response.text();

  try {
    const jsonData = JSON.parse(data);
    return jsonData.message === 'Email already exists';
  } catch (error) {
    console.error('JSON parsing error:', error);
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
