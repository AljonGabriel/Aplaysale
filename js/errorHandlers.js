document.getElementById('myForm').addEventListener('submit', async function (event) {
  event.preventDefault();

  const completeNameInput = document.getElementById('fullName');
  const addressInput = document.getElementById('address');
  const phoneNumberInput = document.getElementById('phoneNumber');

  const emailInput = document.getElementById('email');
  const pwdInput = document.getElementById('pwd');
  const rePwdInput = document.getElementById('rePwd');

  // Sanitize input values
  const sanitizedCompleteName = sanitizeInput(completeNameInput.value);
  const sanitizedAddress = sanitizeInput(addressInput.value);
  const sanitizedPhoneNumber = sanitizeInput(phoneNumberInput.value);
  const sanitizedEmail = sanitizeInput(emailInput.value);

  // Clear previous error messages
  clearErrors();

  let errors = 0;

  if (sanitizedCompleteName === '') {
    displayError('fullName', 'Please provide your complete name');
    completeNameInput.classList.add('failed-input');
    errors++;
  }

  if (sanitizedAddress === '') {
    displayError('address', 'Please enter your complete address');
    addressInput.classList.add('failed-input');
    errors++;
  }

  if (sanitizedPhoneNumber === '') {
    displayError('phoneNumber', 'Please choose Country for the Country code');
    phoneNumberInput.classList.add('failed-input');
    errors++;
  } else {
    const validatedPhoneNumber = validatePhoneNumber(sanitizedPhoneNumber);
    if (validatedPhoneNumber) {
      displayError('phoneNumber', 'Please provide a valid phone number');
      phoneNumberInput.classList.add('failed-input');
      errors++;
    } else {
      clearErrors(phoneNumberInput);
      phoneNumberInput.classList.remove('failed-input');
      phoneNumberInput.classList.add('success-input');
    }
  }

  if (sanitizedEmail === '') {
    displayError('email', 'Please enter your email address');
    emailInput.classList.add('failed-input');
    errors++;
  } else {
    const emailExists = await checkEmailExists(sanitizedEmail);
    if (emailExists) {
      displayError('email', 'The email is already used');
      emailInput.classList.add('failed-input');
      errors++;
    } else {
      const validatedEmail = validateEmail(sanitizedEmail);
      if (validatedEmail) {
        displayError('email', 'Please enter a valid email address.');
        emailInput.classList.add('failed-input');
        errors++;
      } else {
        clearErrors(emailInput);
        emailInput.classList.remove('failed-input');
        emailInput.classList.add('success-input');
      }
    }
  }

  if (pwdInput.value === '') {
    displayError('pwd', 'Please enter a password');
    pwdInput.classList.add('failed-input');
    errors++;
  } else {
    const errorMessage = validatePassword(pwdInput.value);
    if (errorMessage) {
      displayError('pwd', errorMessage);
      pwdInput.classList.add('failed-input');
      errors++;
    } else {
      pwdInput.classList.remove('failed-input');
      pwdInput.classList.add('success-input');
    }
  }

  if (rePwdInput.value === '') {
    displayError('rePwd', 'Please confirm your password');
    rePwdInput.classList.add('failed-input');
    errors++;
  } else {
    const checkedPwdMatch = checkPaswordMatch(pwdInput, rePwdInput);
    if (!checkedPwdMatch) {
      displayError('rePwd', "Password didn't match");
      rePwdInput.classList.add('failed-input');
      pwdInput.classList.add('failed-input');
      errors++;
    } else {
      rePwdInput.classList.remove('failed-input');
      rePwdInput.classList.add('success-input');
    }
  }

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
    errorElement.textContent = '';
  }
}

// Clear all error messages
function clearErrors() {
  const errorElements = document.querySelectorAll('.error-message');
  errorElements.forEach((errorElement) => {
    errorElement.textContent = '';
  });
}

function sanitizeInput(input) {
  const tempElement = document.createElement('div');
  const sanitizedInput = input.replace(/<script>/gi, '');

  tempElement.textContent = sanitizedInput;

  return tempElement.innerHTML;
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
    return 'Password must be between ' + minLength + ' and ' + maxLength + ' characters';
  }

  let error;

  // Check character requirements
  if (!hasUppercase) {
    error = 'Password must contain at least one uppercase letter';
  }

  if (!hasLowercase) {
    error = 'Password must contain at least one lowercase letter';
  }

  if (!hasDigit) {
    error = 'Password must contain at least one digit';
  }

  if (!hasSpecialChar) {
    error = 'Password must contain at least one special character';
  }

  // Password is valid
  return error;
}
