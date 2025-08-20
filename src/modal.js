const openModal = document.getElementById('myModal');
const mainModal = document.getElementById('mainModal');
const closeModal = document.getElementById('closeModal');

openModal.addEventListener('click', () => {
 mainModal.classList.add('flex');
 mainModal.classList.remove('hidden');
});

closeModal.addEventListener('click', () => {
 mainModal.classList.add('hidden');
 mainModal.classList.remove('flex');
});