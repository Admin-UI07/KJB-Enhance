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

// scrollToTop
let calcScrollValue = () => {
  let scrollProgress = document.getElementById('progress');
  let progressValue = document.getElementById('progress-value');
  let pos = document.documentElement.scrollTop;
  let calcHeight =
    document.documentElement.scrollHeight - document.documentElement.clientHeight;
  // console.log(calcHeight);
  let scrollValue = Math.round((pos * 100)/calcHeight);
  // console.log(Math.round((pos * 100) / calcHeight));

  if (pos > 300) {
    scrollProgress.classList.remove('hidden');
    scrollProgress.classList.add('grid');
  } else {
    scrollProgress.classList.add('hidden');
  }

  scrollProgress.addEventListener('click', () => {
    document.documentElement.scrollTop = 0;
  });

  scrollProgress.style.background = `conic-gradient(#0cdb71 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
}

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;
