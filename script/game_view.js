const topView = document.getElementById('top_view');
const thumbs = document.querySelectorAll('.thumb');

// 클릭 시 top_view에 해당 이미지 출력
thumbs.forEach(thumb => {
  thumb.addEventListener('click', () => {
    const src = thumb.dataset.src;
    topView.innerHTML = `<img src="${src}" alt="">`;

    thumbs.forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
  });
});

// Swiper 기본 설정
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: -240,
  centeredSlides: true,
  loop: true,
  speed: 350,
});

