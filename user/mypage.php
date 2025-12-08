<?php
include '../common/header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/game.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<main>
  <div>
    <h2 class="text_center">MY PAGE</h2>
    <div class="page_wrap">
      <!-- 1. 내정보 섹션 -->
      <section id="info" class="page_section">
        <h3 class="head_tag">
          <p>내 정보</p>
        </h3>
        <!-- 프로필 이미지 -->
        <div class="profile_img">
          <img src="../images/user_admin/img_upload.png" alt="프로필 이미지" class="p_img">
        </div>
        <!-- 정보 테이블  -->
        <table>
          <tbody>
            <tr>
              <th class="text_end">이름</th>
              <td class="text_start">김승태</td>
            </tr>
            <tr>
              <th class="text_end">전화번호</th>
              <td class="text_start">010-8282-3333</td>
            </tr>
            <tr>
              <th class="text_end">닉네임</th>
              <td class="text_start">코드깍는노인</td>
            </tr>
            <tr>
              <th class="text_end">아이디</th>
              <td class="text_start">oldman</td>
            </tr>
            <tr>
              <th class="text_end">이메일</th>
              <td class="text_start">icuttingelder@gmail.com</td>
            </tr>
          </tbody>
        </table>
      </section>
      
      <!-- 2. 내가 쓴 글 섹션 -->
      <section id="my_writing" class="page_section">
        <h3 class="head_tag">
          <i class="fa-solid fa-angle-left" onclick='infoPage()'></i>
          <p>내가 쓴 글</p>
        </h3>
        <!-- 내가 쓴 글 테이블 -->
        <table class="table_wrap">
          <thead>
            <tr><th class="text_center">No.</th><th class="text_center">제목</th><th class="text_center">조회수</th><th class="text_center">작성일</th></tr>
          </thead>
          <!-- tr*20>td{$}+{td>a{제목$ 블라블라 !@#!@#}}+td{작성일$}+td{조회수$} -->
          <tbody>
            <tr>
              <td class="text_center">1</td>
              <td class="text_start"><a href="#" title="">제목1 블라블라 !@#!@#</a></td>
              <td class="text_center">조회수1</td>
              <td class="text_center">작성일1</td>
            </tr>
          </tbody>
        </table>

        <!-- 페이지네이션 pagination -->
        <div class="pagination">
          <ul class="pagination_modal">
            <li><a href="#" class="arrow"><i class="fa-solid fa-angle-left"></i></a></li> 
            <li><a href="#" class="num active_num">1</a></li>
            <li><a href="#" class="num">2</a></li>
            <li><a href="#" class="num">3</a></li>
            <li><a href="#" class="num">4</a></li>
            <li><a href="#" class="num">5</a></li>
            <li><a href="#" class="num">6</a></li>
            <li><a href="#" class="num">7</a></li>
            <li><a href="#" class="num">8</a></li>
            <li><a href="#" class="num">9</a></li>
            <li><a href="#" class="num">10</a></li> <li><a href="#" class="arrow"><i class="fa-solid fa-angle-right"></i></a></li>
          </ul>
        </div>
      </section>
    
      <!-- 3. 문의 내역 섹션 -->
      <section id="inquiries" class="page_section">
        <div>
        <h3 class="head_tag">
          <i class="fa-solid fa-angle-left" onclick='infoPage()'></i>
          <p>문의 내역</p>
        </h3>

          <!-- 문의하기 버튼 -->
          <div class="btn_wrap">
            <button class="btn_red" type="button" onclick="location.href='문의하기.html'">문의하기</button> <!--문의하기.html는 수정해야해요-->
          </div>

          <!-- 문의 테이블 -->
          <table class="table_wrap">
            <thead class="">
              <tr><th class="text_center">No.</th><th class="text_center">제목</th><th class="text_center">작성일</th><th class="text_center">처리상태</th><th></th></tr>
              </thead>
              <!-- tr*20>td{$}+td{제목$ 블라블라 !@#!@#}+td{작성일$}+td{처리상태$}+td>i{.fa-solid.fa-sort-down} -->
              <tbody>
                <tr class="question">
                  <td class="text_center">1</td>
                  <td class="text_start">제목1 블라블라 !@#!@#</td>
                  <td class="text_center">작성일1</td>
                  <td class="text_center">처리상태1</td>
                  <td class="text_center"><i class="fa-solid fa-sort-down"></i></td>
                </tr>
                <tr class="answer text_center"><td colspan='5'>답변1</td></tr>
              </tbody>
          </table>

          <!-- 페이지네이션 pagination -->
          <div class="pagination">
            <ul class="pagination_modal">
              <li><a href="#" class="left arrow"><i class="fa-solid fa-angle-left"></i></a></li> 
              <li><a href="#" class="num active_num">1</a></li>
              <li><a href="#" class="num">2</a></li>
              <li><a href="#" class="num">3</a></li>
              <li><a href="#" class="num">4</a></li>
              <li><a href="#" class="num">5</a></li>
              <li><a href="#" class="num">6</a></li>
              <li><a href="#" class="num">7</a></li>
              <li><a href="#" class="num">8</a></li>
              <li><a href="#" class="num">9</a></li>
              <li><a href="#" class="num">10</a></li> <li><a href="#" class="right arrow"><i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- 좌측 네비게이션 -->
  <nav class="side_nav" id="side-nav">
    <ul>
      <li>
        <a href="#info" title="내 정보" class="active_nav">내 정보</a>
      </li>
      <li id="nav_register">
        <i class="fa-regular fa-user"></i>
        <a href="./register.html" title="정보 수정">내 정보 수정</a>
      </li> <!-- ./register.htm 변경시 206번째줄의 href값을 수정해야해요  -->
      <li>
        <i class="fa-regular fa-file-lines"></i>
        <a href="#my_writing" title="내가 쓴 글">내가 쓴 글</a>
      </li>
      <li>
        <i class="fa-regular fa-headphones"></i>
        <a href="#inquiries" title="문의 내역">문의 내역</a>
      </li>
      <li>
        <i class="fa-regular fa-circle-xmark"></i>
        <a href="#" title="탈퇴하기" onclick="leaveFunction()" class="leave">탈퇴하기</a>
      </li>
    </ul>
  </nav>
  
  <!-- javascript -->
  <script>
    //---------- 탈퇴 알림창 TEST ----------
    function leaveFunction() {alert('탈퇴하시겠습니까?');}

    document.addEventListener('DOMContentLoaded', () => {
      // 좌측nav - 선택섹션 제외 숨기기
      const sections = document.querySelectorAll('.page_wrap .page_section'); // 1. 추가 - 모든 마이페이지 섹션 요소 가져오기
      sections.forEach(section => {
        // 2. 초기화 - 초기 로드 시 '내 정보' 섹션 외 모두 숨김(한 번 실행)
        if (section.id !== 'info') {
          section.style.display = 'none';
        }
      });

      // ---------- 좌측nav - 클릭 효과 ----------
      const navLinks = document.querySelectorAll('.side_nav a');
        navLinks.forEach(link => {
          if (link.getAttribute('href') !== './register.html') { // '내 정보 수정' 제외
            link.addEventListener('click', function(event) {
              event.preventDefault(); // 기본 스크롤 동작 방지

              // 기존 active 클래스 제거 및 클릭된 요소에 active 클래스 추가 (기존 로직 유지)
              navLinks.forEach(l => l.classList.remove('active_nav'));
              this.classList.add('active_nav');
              
              // 페이지 스크롤 이동 (href="#id" 동작 유지)
              const targetId = this.getAttribute('href').substring(1);
  
              sections.forEach(section => {
                if (section.id === targetId) {
                  // 클릭된 대상 섹션은 보이도록 처리
                  section.style.display = 'block'; 
                } else {
                  // 나머지 섹션은 숨김 처리
                  section.style.display = 'none';
                }
              });

              // 최상단으로 스크롤 이동 (선택 사항: 섹션이동 효과를 명확히 하기 위해)
              window.scrollTo({ top: 0, behavior: 'smooth'});
          });
        }
      });

      // ---------- 아코디언 기능 (문의 내역) ----------
      const questionRows = document.querySelectorAll('.question');
      questionRows.forEach(row => {
        row.addEventListener('click', function() {
          const answerRow = this.nextElementSibling;
          const icon = this.querySelector('.fa-sort-down');

          if (answerRow && answerRow.classList.contains('answer')) {
            if (answerRow.style.display === 'table-row') {
              // 현재 열려 있다면 닫기
              answerRow.style.display = 'none';
              this.classList.remove('active');
              if (icon) icon.classList.remove('active');
            } else {
              // 현재 닫혀 있다면 열기
              answerRow.style.display = 'table-row';
              this.classList.add('active');
              if (icon) icon.classList.add('active');
            }
          }
        });
      });
    });
    // ---------- side_nav(ver.mobile) ----------
    function infoPage() {
      // 모바일 환경(768px 이하)에서만 작동
      if (window.innerWidth > 768) {
          window.location.hash = '#info';
          return;
      }
      
      // 1. #info 섹션으로 이동 및 해시 업데이트
      const targetId = 'info';
      window.location.hash = '#' + targetId;
      window.scrollTo({ top: 0, behavior: 'smooth'});

      // 2. 섹션 표시/숨김 로직 (기존 DOMContentLoaded의 로직을 복제하여 즉시 실행)
      const sections = document.querySelectorAll('.page_wrap .page_section'); 
      const navLinks = document.querySelectorAll('.side_nav a');
      const sideNav = document.getElementById('side-nav');

      // 모든 섹션 중 #info만 보이게 처리
      sections.forEach(section => {section.style.display = (section.id === targetId) ? 'block' : 'none';});
      
      // 3. side_nav 표시 (요청 6: info로 이동 시 nav는 보여야 함)
      if (sideNav) {
        // CSS를 건들지 않고 JS 인라인 스타일로 제어
        sideNav.style.display = 'block'; 
      }
      
      // 4. 활성 링크 업데이트 (info 링크 활성화)
      navLinks.forEach(l => l.classList.remove('active_nav'));
      const activeLink = document.querySelector(`.side_nav a[href="#${targetId}"]`);
      if (activeLink) {activeLink.classList.add('active_nav');}
    }
    document.addEventListener('DOMContentLoaded', () => {
  // 모바일 환경(768px 이하)이 아니면 추가 로직 실행 안 함
  if (window.innerWidth > 768) {return;}

  const sideNav = document.getElementById('side-nav');
  if (!sideNav) return;

  const navLinks = document.querySelectorAll('.side_nav a');
  // 💡 새로운 이벤트 리스너: navLinks 클릭 시 side_nav 숨김/표시만 추가로 처리
  navLinks.forEach(link => {
    // 기존의 이벤트 리스너가 이미 등록되어 있으므로, 
    // 새로운 리스너를 추가하여 side_nav 표시/숨김만 처리합니다.b
    link.addEventListener('click', function() {
      const targetHref = this.getAttribute('href');
      let targetId = targetHref.startsWith('#') ? targetHref.substring(1) : targetHref;

      // 'info' 섹션이 아니고, '#'으로 시작하는 링크(내부 페이지)가 아닐 때 (즉, my_writing, inquiries, register.html 일 때)
      if (targetId !== 'info' && targetId !== '') {
        // side_nav 숨김 (요청 4)
        sideNav.style.display = 'none';
      } else {
        // 'info' 섹션일 때 (혹시 모를 상황 대비)
        sideNav.style.display = 'block';
      }
    });
  });
  
  // 💡 초기 로드 시에도 현재 해시(URL)를 기반으로 side_nav 상태를 설정합니다.
  const initialHash = window.location.hash.substring(1) || 'info';
    if (initialHash !== 'info' && initialHash !== '') {sideNav.style.display = 'none';}
    else {sideNav.style.display = 'block';}
  });
  </script>
</main>

<?php
include_once '../common/footer.php';
?>