const openBtn = document.querySelector('.show-menu');
const closeBtn = document.querySelector('.close-menu');
const menuMobile = document.getElementById('for-mobile-view');

openBtn.addEventListener('click', () => {
 openBtn.classList.add('hidden');
 closeBtn.classList.remove('hidden');
 menuMobile.classList.toggle('hidden');
});

closeBtn.addEventListener('click', () => {
 openBtn.classList.remove('hidden');
 closeBtn.classList.add('hidden');
 menuMobile.classList.toggle('hidden');
});

checkTab();

function checkTab() {
 if (document.title === 'Kuya Jaypee Bigasan') {
  const home = document.getElementById('home');
  home.classList.add('underline');
  return;
 }

 if (document.title === 'Products') {
  const products = document.getElementById('products');
  products.classList.add('underline');
 }
}