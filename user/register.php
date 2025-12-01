<?php

include('../db/db_conn.php');

// 로그인 상태 확인
$isLogin = isset($_SESSION['mb_no']);   // true/false

// 로그인된 경우 → 기존 회원 정보 가져오기
if($isLogin) {
    $user_no = $_SESSION['mb_no'];

    $sql = "SELECT * FROM users WHERE user_no = $user_no";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}
?>

<?php include('../common/header.php'); ?>

<section class="auth-wrap">
    <div class="container">
        
        <!-- 제목 -->
        <h2>
            <?php echo $isLogin ? "회원정보 수정" : "회원가입"; ?>
        </h2>

        <!-- form 시작 -->
        <form 
            action="<?php echo $isLogin ? 'edit_ok.php' : 'register_ok.php'; ?>" 
            method="post" 
            enctype="multipart/form-data">

            <!-- 이름 -->
            <p>
                <label>*이름</label>
                <input type="text" name="user_name" 
                    value="<?php echo $isLogin ? $user['user_name'] : ''; ?>" 
                    required>
            </p>

            <!-- 아이디 (수정 불가) -->
            <p>
                <label>*아이디</label>
                <input type="text" name="user_id" 
                    value="<?php echo $isLogin ? $user['user_id'] : ''; ?>"
                    <?php echo $isLogin ? 'readonly' : 'required'; ?>>
            </p>

            <!-- 비밀번호 -->
            <p>
                <label><?php echo $isLogin ? "새 비밀번호 (변경 시 입력)" : "*비밀번호"; ?></label>
                <input type="password" name="user_pw" <?php echo $isLogin ? '' : 'required'; ?>>
            </p>

            <!-- 닉네임 -->
            <p>
                <label>*닉네임</label>
                <input type="text" name="user_nickname" 
                    value="<?php echo $isLogin ? $user['user_nickname'] : ''; ?>" 
                    required>
            </p>

            <!-- 전화번호 -->
            <p>
                <label>*휴대폰 번호</label>
                <input type="text" name="user_phone" 
                    value="<?php echo $isLogin ? $user['user_phone'] : ''; ?>" 
                    required>
            </p>

            <!-- 이메일 -->
            <p>
                <label>이메일</label>
                <input type="email" name="user_email" 
                    value="<?php echo $isLogin ? $user['user_email'] : ''; ?>">
            </p>

            <!-- 프로필 이미지 -->
            <p>
                <label>프로필 이미지</label>

                <?php if($isLogin) { ?>
                    <div class="profile-preview">
                        <img src="../uploads/profile/<?php echo $user['user_img']; ?>" 
                            alt="프로필 이미지" 
                            style="width:80px;border-radius:50%;margin-bottom:10px;">
                    </div>
                <?php } ?>

                <input type="file" name="user_img">
            </p>

            <!-- 수정 모드일 경우 user_no 숨겨서 전달 -->
            <?php if($isLogin) { ?>
                <input type="hidden" name="user_no" value="<?php echo $user['user_no']; ?>">
            <?php } ?>

            <!-- 버튼 -->
            <button type="submit">
                <?php echo $isLogin ? "회원정보 수정" : "회원가입"; ?>
            </button>

        </form>
    </div>
</section>

<?php include('../common/footer.php'); ?>