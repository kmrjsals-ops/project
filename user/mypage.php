
<?php
include '../common/header.php';
?>
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
  <script src="../script/mypage.js"></script>
</main>

<?php
include_once '../common/footer.php';
?>
