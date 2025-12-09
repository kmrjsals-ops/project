<?php
include '../common/header.php';
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main>
    <section class="faq_section">
    <div>
    <h2 class="text_center">SURPORT</h2>

        <!-- 검색창 -->
        <div class="search_wrap">
        <form action="#" method="get" class="search_form">
            <!-- 아이콘, 입력창 -->
            <div class="search_group">
            <input type="text" name="search" class="search_input" placeholder="검색어를 입력해주세요.">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </div>
            <!-- 검색버튼 -->
            <button class="btn_red search_btn" type="button">검색</button>
        </form>
        </div>

        <!-- 문의 테이블 -->
        <table class="table_wrap02">
        <thead>
            <tr><th class="text_center">No.</th><th class="text_center">질문/답변</th><th></th></tr>
        </thead>
        <tbody>
            <tr class="question">
            <td class="text_center">1</td>
            <td class="text_start">Q. [ㅇㅇ 문의] 질문1 블라블라 !@#!@#</td>
            <td class="text_center"><i class="fa-solid fa-sort-down"></i></td>
            </tr>
            <tr class="answer text_start"><td colspan='3'>A. 답변1</td></tr>
        </tbody>
        </table>

        <!-- 페이지네이션 pagination -->
        <div class="pagination02">
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
    <script src="../script/faq.js"></script>
</main>

<?php
include_once '../common/footer.php';
?>