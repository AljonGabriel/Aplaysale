document.getElementById('myForm').addEventListener('submit', async function (event) {
  event.preventDefault();

  const email = document.getElementById('email').value;
  const username = document.getElementById('username').value;

  // Clear previous error messages
  clearErrors();

  if (email === '') {
    displayError('email', 'The email is empty');
  } else {
    const emailExists = await checkEmailExists(email);
    if (emailExists) {
      displayError('email', 'The email is already used');
    }
  }

  if (username === '') {
    displayError('username', 'The username is empty');
  } else {
    const usernameTaken = await checkUsernameTaken(username); // Replace with your function
    if (usernameTaken) {
      displayError('username', 'The username is already taken');
    }
  }
});

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

// Function to check if email exists and return a boolean value
async function checkUsernameTaken(username) {
  const response = await fetch('inc/signup/check_username.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ username }),
  });

  const data = await response.text();

  try {
    const jsonData = JSON.parse(data);
    return jsonData.message === 'Username already exists';
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
