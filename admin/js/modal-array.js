const modals = document.querySelectorAll(".modal");
const modalButtons = document.getElementsByClassName("modal-btn");
const closeModalButtons = document.getElementsByClassName("close");

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "block";
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "none";
}

// Attach click event listeners to open modals
for (let i = 0; i < modalButtons.length; i++) {
  modalButtons[i].addEventListener("click", function () {
    const modalId = this.getAttribute("data-modal-id");
    openModal(modalId);
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
