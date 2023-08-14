document.getElementById('myForm').addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent form submission

  // Get form values
  var username = document.getElementById('username');
  var email = document.getElementById('email').value;
  var password = document.getElementById('pwd').value;

  // Perform input validation
  var errors = [];
  if (username.value === '') {
    errors.push('Username is required');
    username.style.border = '1px solid red'; // Change the border style to indicate an error
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
    // Display errors to the user (e.g., in a <div>)
    const errorDiv = document.getElementById('errorMessage');

    if (errorDiv !== null) {
      errorDiv.innerHTML = errors.join('<br>');
    }
  } else {
    // Submit the form
    event.target.submit();
  }
});

// Email validation function
function isValidEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
