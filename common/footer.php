<footer>
    <ul>
      <li><a href="" title="about">about</a></li>
      <li><a href="" title="copyright">copyright</a></li>
      <li><a href="" title="privacy policy">privacy policy</a></li>
      <li><a href="" title="terms">terms</a></li>
    </ul>
    <div class="f_logo">
      <a href="" title="페이지 상단 바로가기">
        <img src="../images/footer_logo.png" alt="푸터 로고">
      </a>
      <span class="location">
        <a href="https://maps.app.goo.gl/zyh4ZD2e4ZCoW8gd8" title="위치 알아보기" target="_blank">
          KOREA &nbsp;&nbsp;&nbsp;37.402652, 127.101576
        </a>
      </span>
    </div>
  </footer>
  <!-- 부트스트랩 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" ></script>
  <!-- 스와이퍼 js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const catSwiper = new Swiper('.categorySwiper', {
      slidesPerView: 'auto',
      spaceBetween: 8,
      freeMode: true,
      navigation: {
        nextEl: '.swiper-cat-next',
        prevEl: '.swiper-cat-prev',
      },
    });
  });
  document.addEventListener('click', function(e) {
  if (e.target.classList.contains('cat-btn')) {

    // 기존 active 제거
    document.querySelectorAll('.cat-btn').forEach(btn => {
      btn.classList.remove('active');
    });

    // 클릭한 버튼에 active 추가
    e.target.classList.add('active');
  }
});
</script>
</body>
</html>