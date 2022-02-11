const modal = document.querySelector('#my-modal');
const btnModal = document.querySelector('#modal-btn').addEventListener('click', openModal);
const btnCancel = document.querySelector('#cancel').addEventListener('click', closeModal);

window.addEventListener('click', outsideClick);

function openModal() {
  modal.style.display = 'block';
}

function closeModal() {
  modal.style.display = 'none';
}

function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}