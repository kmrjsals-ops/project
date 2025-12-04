<?php
	include '../common/header.php';
?>
<link rel="stylesheet" href="../css/notice_view.css" type="text/css">
<body>
<section class="notice_view">
    <div class="main-container">
        <div class="top-nav">
            <div class="page-category">공지사항</div>
            <a href="index.html" class="btn-list">목록</a>
        </div>

        <div class="post-header">
            <div class="post-title">
                [상품] 2025년 11월 20일 신규 판매 상품 안내
            </div>
            <div class="post-info">
                <div class="info-left">R2 ORIGIN</div>
                <div class="info-right">
                    <span>조회수 / 2025.11.20</span>
                    <svg class="icon-folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="post-body">
            <img src="../images/notice/R2_notice 1.png" alt="공지사항 배너" class="post-banner">
            
            <div class="text-highlight">
                No Rules, Just Power! 태초의 힘을 찾아 떠나는 여정.<br>
                안녕하세요, R2 ORIGIN입니다.
            </div>
            <br>
            <div class="text-sub">
                2025년 11월 20일(목) 정기 점검 이후 추가된 상품 7종에 대해 안내드립니다.<br><br>
                자세한 내용은 아래 정보를 확인해 주시기 바랍니다.
            </div>
        </div>

        <div class="post-nav-list">
            <div class="nav-item">
                <div class="nav-arrow arrow-up"></div>
                <div class="nav-title nav-left">[상품] 프리미엄 시즌2 변신 소환 카를로스 안내</div>
                <div class="nav-date">2025.11.19</div>
            </div>
            <div class="nav-item">
                <div class="nav-arrow arrow-down"></div>
                <div class="nav-title nav-right">[당첨자 발표] R2 ORIGIN의 50일을 축하해주세요!! 이벤트 당첨자 안내</div>
                <div class="nav-date">2025.11.20</div>
            </div>
        </div>
    </div>
</section>
<script>
	document.addEventListener('DOMContentLoaded',function(){
		const titleLeft = document.querySelector('.nav-left');
		const titleRight = document.querySelector('.nav-right');


		if(!titleLeft,!titleRight){
			return;
		}
		const mediaQuery = window.matchMedia('(max-width: 768px)');

		function handleScreenChange(e){
			if(e.matches){
				titleLeft.textContent = '이전글';
				titleRight.textContent = '다음글';
			}
		}
		handleScreenChange(mediaQuery);

		mediaQuery.addListener(handleScreenChange);
	});
</script>
</body>

<?php
	include '../common/footer.php';
?>