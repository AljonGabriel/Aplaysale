document.getElementById('myForm').addEventListener('submit', async function (event) {
  event.preventDefault();

  const email = document.getElementById('email');
  const completeName = document.getElementById('fullName');
  const address = document.getElementById('address');
  const pwd = document.getElementById('pwd');
  const rePwd = document.getElementById('rePwd');

  // Clear previous error messages
  clearErrors();

  let errors = 0;

  if (email.value === '') {
    displayError('email', 'The email is empty');
    email.classList.add('failed-input');
    errors++;
  } else {
    const emailExists = await checkEmailExists(email);
    if (emailExists) {
      displayError('email', 'The email is already used');
      email.classList.add('failed-input');
      errors++;
    }
  }

  if (completeName.value === '') {
    displayError('fullName', 'The name field is empty');
    completeName.classList.add('failed-input');
    errors++;
  }

  if (address.value === '') {
    displayError('address', 'The address field is empty');
    address.classList.add('failed-input');
    errors++;
  }

  if (pwd.value === '') {
    displayError('pwd', 'The password field is empty');
    pwd.classList.add('failed-input');
    errors++;
  }

  if (rePwd.value === '') {
    displayError('rePwd', 'The confirm password field is empty');
    rePwd.classList.add('failed-input');
    errors++;
  }

  console.log(errors);

  if (errors <= 0) {
    this.submit();
  }
});

// Function to check if email exists and return a boolean value
async function checkEmailExists() {
  const email = document.getElementById('email').value;
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

// Display error messages
function displayError(inputId, errorMessage) {
  const errorElement = document.getElementById(inputId + 'Error');
  if (errorElement) {
    errorElement.textContent = errorMessage;
    return errorElement;
  }
}

// Clear all error messages
function clearErrors() {
  const errorElements = document.querySelectorAll('.error-message');
  errorElements.forEach((errorElement) => {
    errorElement.textContent = '';
  });
}
