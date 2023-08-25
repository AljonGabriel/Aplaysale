const modals = document.querySelectorAll(".modal");
const modalButtons = document.getElementsByClassName("modal-btn");
const closeModalButtons = document.getElementsByClassName("close");
const adminInputs = document.querySelectorAll(".admin-updateuser-input");

function openModal(modalId, data, userId) {
  const modalNameInput = document.querySelector(`#admModUpdNamInp_${userId}`),
    modalAddInput = document.querySelector(`#admModUpdAddInp_${userId}`);

  modalNameInput.placeholder = data.fullname;
  modalAddInput.placeholder = data.completeaddress;

  const modal = document.getElementById(modalId);
  modal.style.display = "block";
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "none";
  modalButtons.placeholder = "";
}

// Attach click event listeners to open modals
for (let i = 0; i < modalButtons.length; i++) {
  modalButtons[i].addEventListener("click", async function () {
    const modalId = this.getAttribute("data-modal-id"),
      userId = this.getAttribute("data-user-id");

    //get user information in the server
    const response = await fetch(`inc/get_user.inc.php?user_id=${userId}`),
      data = await response.json();

    openModal(modalId, data, userId);

    const url = `index.php?id=${userId}`;
    history.pushState({}, "", url);
  });
}

// Attach click event listeners to close modals
for (let i = 0; i < closeModalButtons.length; i++) {
  closeModalButtons[i].addEventListener("click", function () {
    const modalId = this.getAttribute("data-modal-id");

    closeModal(modalId);
  });
}

// Attach click event listener to close modal when clicking outside the modal
window.addEventListener("click", function (event) {
  if (event.target.classList.contains("modal")) {
    const modalId = event.target.getAttribute("id");
    closeModal(modalId);
  }
});
