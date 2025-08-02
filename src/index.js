new Swiper('.card-wrapper', {
  loop: true,
  spaceBetween: 30,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints: {
   0: {
    slidesPerView: 1
   },
   700: {
    slidesPerView: 2
   },
   1024: {
    slidesPerView: 3
   }
  }
});

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
