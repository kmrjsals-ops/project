<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <title>페이지를 찾을 수 없습니다</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {

      color: white;
      height: 100vh;
      overflow: hidden;
    }

    /* 캐릭터 이미지 */
    .error-img {
      width: 300px;
      max-width: 80%;
    }

    /* 말풍선 컨테이너 */
    .speech-wrap {
      position: relative;
      width: 900px;
      margin: 0 auto;
      margin-top: 10px;
    }

    /* 말풍선 배경 */
    .speech-bubble {
      width: 100%;
      display: block;
    }

    /* 중심 텍스트 */
    .speech-text {
      position: absolute;
      top: 50%;
      left: 43%;
      transform: translate(-50%, -50%);
      width: 60%;
      text-align: center;
      color: #000;
      font-size: 28px;
      font-weight: 600;
      line-height: 1.4;
    }

    /* 오른쪽 말풍선 영역 (버튼 들어가는 자리) */
    .speech-btn-box {
      position: absolute;
      right: 15px;          /* 버튼 말풍선 안 x 위치 */
      top: 2%;             /* 버튼 말풍선 안 y 위치 */
      width: 260px;         /* 버튼 공간 */
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
      pointer-events: none;           /* 말풍선 클릭 방지 */
    }

    /* 홈으로 버튼 */
    .home-btn {
      padding: 12px 28px;
      border-radius: 6px;
      color: #333;
      text-decoration: none;
      font-size: 18px;
      font-weight:600;
      pointer-events: auto;          /* 버튼 클릭 가능하게 복구 */
    }
    
    .home-btn:hover {
      text-decoration: underline;
      color:#f00;
    }

  </style>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center text-center flex-column" style="height: 100vh;">

    <!-- 캐릭터 GIF -->
    <img src="./images/404.gif" alt="404 이미지" class="error-img mb-4">

    <!-- 말풍선 전체 -->
    <div class="speech-wrap">

      <!-- 배경 말풍선 -->
      <img src="./images/404_text.png" alt="말풍선 이미지" class="speech-bubble">

      <!-- 중앙 텍스트 -->
      <div class="speech-text">
        <br>
        <br>


        죄..죄송해요!<br>
        아직 개발중 입니다!<br>
        404 Not Found...
      </div>

      <!-- 오른쪽 말풍선 안의 버튼 -->
      <div class="speech-btn-box">
        <a href="/webzen/index.php"  class="home-btn">&#x003E;&nbsp;메인으로 돌아가기</a>
      </div>

    </div>

  </div>

</body>
</html>
