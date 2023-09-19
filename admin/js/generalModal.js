const modals = document.querySelectorAll(".modal-container");
const modalsContent = document.querySelectorAll(
  ".admin-products-modal-content",
);
const modalButton = document.getElementsByClassName("modal-trigger");

const x = document.getElementsByClassName("modal-close");

const openModal = (modalID) => {
  const modal = document.getElementById(modalID);

  modal.style.display = "block";
};

const closeModal = (modalID) => {
  const modal = document.getElementById(modalID);

  modal.style.display = "none";
};

for (let i = 0; i < modalButton.length; i++) {
  modalButton[i].addEventListener("click", () => {
    const modalID = modalButton[i].getAttribute("data-modal-id");

    openModal(modalID);
  });
}

for (let i = 0; i < x.length; i++) {
  x[i].addEventListener("click", () => {
    const modalID = x[i].getAttribute("data-modal-id");

    closeModal(modalID);
  });
}
