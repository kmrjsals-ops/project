<footer>
    <div class="fd_wrap">
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
            KOREA&nbsp;37.402652, 127.101576
          </a>
        </span>
      </div>
    </div>

    <div class="fm_wrap">
      <div class="fm_logo">
        <a href="" title="메인페이지 바로가기">
          <img src="../images/header_logo.png" alt="푸터 로고">
        </a>
      </div>

      <div class="info_wrap">
        <ul class="link_group_wrapper">
          <li>
            <ul class="link_group">
              <li><a href="" title="이용약관">이용약관</a></li>
              <li><a href="" title="개인정보처리방침">개인정보처리방침</a></li>
              <li><a href="" title="청소년보호정책">청소년보호정책</a></li>
            </ul>
          </li>
          <li>
            <ul class="link_group">
              <li><a href="" title="회사소개">회사소개</a></li>
              <li><a href="" title="웹젠PC방">웹젠PC방</a></li>
            </ul>
          </li>
        </ul>
        
        <div class="company_info">
          <p>상호명 : (주)웹젠&nbsp;대표이사 : 김태영&nbsp;사업자등록 : 214-86-57130</p>
          <p>통신판매업 신고번호 : 제2012-경기성남-0753호</p>
          <p>주소 : 경기도 성남시 분당구 판교로 242 (주)웹젠</p>
          <p>웹마스터메일 : <a href="mailto:webzen-help@webzen.co.kr">webzen-help@webzen.co.kr</a></p>
          <p>고객지원센터 : 1566-3003 <a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=2148657130">사업자정보확인</a></p>
        </div>

      </div>
      
      <div class="top_btn">
        <i class="fa-solid fa-angle-up"></i>
      </div>
      
      <div class="copyright">
        Webzen Inc. Global Digital Entertainment Leader<br>
        COPYRIGHT&copy; Webzen Inc. ALL RIGHTS RESERVED.
      </div>
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

    // 모바일 메뉴 탭
    document.addEventListener("DOMContentLoaded", () => {
      const openBtn = document.getElementById("open_tab");
      const closeBtn = document.getElementById("clo_tab");
      const mPanel = document.querySelector(".m_nav_panel");

      openBtn.addEventListener("click", () => {
        mPanel.style.display = "block";
        openBtn.style.display = "none";
        closeBtn.style.display = "block";
      });

      closeBtn.addEventListener("click", () => {
        mPanel.style.display = "none";
        closeBtn.style.display = "none";
        openBtn.style.display = "block";
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