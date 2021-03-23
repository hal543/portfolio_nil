<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="user_login.html">ログイン画面へ</a>';
	exit();

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NIL_ユーザー</title>
	<link rel="stylesheet" href="../../css/public.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="../../css/slick.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="slick.min.js"></script>
	<script src="test.js" type="text/javascript"></script>
</head>

<body class="header_body1">
<div class="header_body2">
    <div class="header-container">
      	<div class="header-left">
        	<a href="../user_top/user_top.php"><img src="../../pic/nil_logo.jpeg"></a>
      	</div>
      	<div class="header-right">
        	<ul style="list-style: none;">
        		<li><a href="../user_form/user_form.php" class="info">お問い合わせ</a></li>
        		<li><a href="event.php">イベント情報</a></li>
        		<li><a href="#">店舗検索</a></li>
				<li><a href="../user_info/user_info.php">お知らせ</a></li>
			</ul>
		</div>
  	</div>
</div>

<div class="header_main">