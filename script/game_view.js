
const topView = document.getElementById('top_view');
const thumbs = document.querySelectorAll('.thumb');

//페이지 첫 로드 시 비디오 삽입
topView.innerHTML = `<video src="../images/game/details_thumbs.mp4" controls autoplay></video>`;

// 클릭 시 top_view 교체
thumbs.forEach(thumb => {
  thumb.addEventListener('click', () => {

    const type = thumb.dataset.type;
    const src = thumb.dataset.src;

    if (type === 'video') {
      topView.innerHTML = `<video src="${src}" controls autoplay></video>`;
    } else {
      topView.innerHTML = `<img src="${src}" alt="">`;
    }

    // active 표시
    thumbs.forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
  });
});

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: -240,   // ★ 겹치는 정도 (1/3 정도)
  centeredSlides: true,
  loop: true,
  speed: 350,
});
