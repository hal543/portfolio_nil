<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="../seller_top/seller_login.html">ログイン画面へ</a>';
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>NIL_販売者用ページ</title>
  <link rel="stylesheet" href="../../css/public.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
 <body>

 <div class="header">
    <div class="header-container">
      	<div class="header-left">
        	<a href="../seller_top/seller_top.php"><img src="../../pic/nil_logo.jpeg"></a>
      	</div>
      	<div class="header-right">
        	<ul style="list-style: none;">
				<li><a href="../seller_form/seller_form.php" class="info">お問い合わせ</a></li>
        		<li><a href="../seller_log/seller_logout.php">ログアウト</a></li>
				<li><a href="../seller_post/seller_post.php">投稿</a></li>
				<li><a href="../seller_mypage/seller_mypage_pre.php">マイページ設定</a></li>
			</ul>
		</div>
  	</div>
</div>
	