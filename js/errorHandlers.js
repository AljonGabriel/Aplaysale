/* document.getElementById('myForm').addEventListener('submit', async function (event) {
  event.preventDefault(); // Prevent form submission

  // Get form values
  var username = document.getElementById('username');
  var email = document.getElementById('email').value;
  var password = document.getElementById('pwd').value;

  // Perform input validation
  var errors = [];
  if (username.value === '') {
    errors.push('Username is required');
    username.style.border = '1px solid red';
  }
  if (email === '') {
    errors.push('Email is required');
  } else if (!isValidEmail(email)) {
    errors.push('Invalid email format');
  } 
  if (password === '') {
    errors.push('Password is required');
  }

  // Display errors or submit the form
  if (errors.length > 0) {
    const errorDiv = document.getElementById('errorMessage');
    if (errorDiv !== null) {
      errorDiv.innerHTML = errors.join('<br>');
    }
  } else {
    event.target.submit();
  }
});

// Rest of your code (isValidEmail function, etc.)
// Email validation function
function isValidEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
 */

// Create a URLSearchParams object from the current URL search parameters

var username = document.getElementById('username');
var email = document.getElementById('email');
var password = document.getElementById('pwd');

var urlParams = new URLSearchParams(window.location.search);

// Get the value of the 'signup' parameter
var signupValue = urlParams.get('signup');

if (signupValue === 'failed') {
  // Get the value of the 'error_data' parameter
  var errorData = urlParams.get('error_data');

  if (errorData) {
    // Decode the serialized error data and parse it as JSON
    var errors = JSON.parse(decodeURIComponent(errorData));

    // Check for specific error messages and highlight corresponding fields
    if (errors.hasOwnProperty('empty_strings')) {
      username.classList.add('failed-input');
      email.style.border = '1px solid red';
      password.style.border = '1px solid red';
    } else if (!errors.hasOwnProperty('empty_strings') || username.value !== null) {
      username.classList.add('success-input');

      email.classList.add('success-input');

      password.classList.add('success-input');
    }
    if (errors.hasOwnProperty('username_taken')) {
      username.style.border = '1px solid red';
    }
    if (errors.hasOwnProperty('email_used')) {
      email.style.border = '1px solid red';
    }
  }
} else {
  // No signup failure, reset borders to gray
}
