<?php include ( dirname(_FILE_) . '/../seller_parts/seller_out_header.php' ); ?>

<div class="main_login1">
	<div class="main_login2">
    <p class="login-text1">販売者ログイン</p>
     <form method="post" action="seller_login_check.php">
        <div class="login_contents">
          <div class="login-detail1">
            <span class="login-text2">メールアドレス</span>
            <input type="text" name="mail" class="M">
          </div>
        
          <div class="login-detail2">
            <span class="login-text3">パスワード</span>
            <input type="password" name="pass" class="M">
          </div>
  
            <div class="login-detail3">
              <input type="submit" value="ログイン" class="login-submit">
            </div>
         </div>

         <div class="login-detail4">
          <a href="../seller_add/seller_add.php" class="login-submit2">アカウントをお持ちでない方はこちら</a>
        </div>

        <div class="login-detail5">
          <a href="" class="login-submit3">アカウント・パスワードを忘れた方はこちら</a>
        </div>
  
      </form>

      
      
  </div>
</div>

<?php include ( dirname(_FILE_) . '/../seller_parts/seller_out_footer.php' ); ?>