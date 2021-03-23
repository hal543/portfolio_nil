<?php include ( dirname(__FILE__) . '/../user_parts/user_out_header.php' ); ?>

<div class="main_login1">
<div class="main_login2">
  <p class="login-text1">ユーザーログイン</p>
   <form method="post" action="user_login_check.php">
      <div class="login_contents">
        <div class="login-detail1">
          <span class="login-text2">メールアドレス</span>
          <input type="text" name="user_mail" class="M">
        </div>
        <div class="login-detail2">
          <span class="login-text3">パスワード</span>
          <input type="password" name="user_pass" class="M">
        </div>
          <div class="login-detail3">
            <input type="submit" value="ログイン" class="login-submit">
          </div>
       </div>
       <div class="login-detail4">
        <a href="../user_add/user_add.php" class="login-submit2">アカウントをお持ちでない方はこちら</a>
      </div>
      <div class="login-detail5">
        <a href="" class="login-submit3">アカウント・パスワードを忘れた方はこちら</a>
      </div>
    </form>
</div>
</div>

<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>