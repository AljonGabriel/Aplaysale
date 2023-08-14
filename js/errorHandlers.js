document.getElementById('myForm').addEventListener('submit', async function (event) {
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
  } else {
    // Check if email exists in the database
    try {
      var emailExists = await checkEmailExists(email);
      if (emailExists) {
        errors.push('Email is already registered');
      }
    } catch (error) {
      console.error('Error checking email:', error);
    }
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

// Function to check if email exists in the database
async function checkEmailExists(email) {
  return new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          resolve(response.exists);
        } else {
          reject();
        }
      }
    };
    xhr.open('GET', '../inc/signup/check-email.php?email=' + encodeURIComponent(email), true);
    xhr.send();
  });
}
