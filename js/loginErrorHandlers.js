document.getElementById('loginForm').addEventListener('click', (event) => {
  event.preventDefault();

  const emalInput = document.getElementById('emailInput');
  const pwdInput = document.getElementById('pwdInput');

  const sanEmailInpVal = sanitizeInputs(emalInput.value);
  const sanPwdInpVal = sanitizeInputs(emalInput.value);

  if (sanEmailInpVal == '') {
  }

  console.log(sanEmailInpVal);

  function sanitizeInputs(input) {
    const tempElem = document.createElement('div');
    const sanInput = input.replace(/<script>/gi, '');

    tempElem.textContent = sanInput;

    return tempElem.innerHTML;
  }

  function displayError(inputId, message) {}
});
