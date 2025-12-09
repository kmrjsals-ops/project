<?php
include '../common/header.php';
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main>
  <div class="container-fluid py-5">
    <section  class="mx-auto" style="max-width: 900px;">
      <div class="p-0">
        <h2 class="text-center mb-5">문의 작성</h2>

        <div class="card shadow-lg mx-auto" style="max-width: 700px;">
          <div class="card-body p-4 p-md-5">
            <!-- 유저 정보 + 카테고리 + 첨부파일 -->
            <div class="d-flex align-items-center mb-4">
              <!-- 프로필 -->
              <img src="../images/user_admin/user_default.png" class="rounded-circle me-3" width="45" height="45" alt="profile">
              <!-- 닉네임 -->
              <div class="fw-semibold me-3">
                고드릭노눈임
              </div>
            
              <!-- 카테고리 선택 -->
              <select class="form-select w-auto me-auto" name="category">
                <option selected disabled>카테고리 선택</option>
                <option value="계정 및 로그인">계정/로그인</option>
                <option value="게임이용">게임이용</option>
                <option value="결제/환불">결제/환불</option>
                <option value="보안/기타">보안/기타</option>
              </select>
            </div>
            <form action="#" method="get">
              <!-- 제목 -->
              <div class="mb-3">
                <label class="form-label fw-semibold">제목을 입력해주세요</label>
                <input type="text" class="form-control" name="title" placeholder="제목을 입력해주세요">
              </div>
              
              <!-- 내용 -->
              <div class="mb-4">
                <label class="form-label fw-semibold">내용을 입력해주세요</label>
                <textarea class="form-control"
                          name="content"
                          rows="10"
                          placeholder="내용을 입력해주세요"></textarea>
              </div>
              
              <!-- 등록 버튼 -->
              <div class="text-center">
                <div class="text-center">
                  <button type="submit" class="btn btn-danger px-4">등록하기</button>
                  <button type="submit" class="btn btn-dark px-4">취소하기</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<?php
include_once '../common/footer.php';
?>