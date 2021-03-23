<?php

require_once '../../../app/data_function/Getdata.php' ;
$infos = info1Get();
foreach($infos as $info){};

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="../sellr_log/seller_login.php">ログイン画面へ</a>';
	exit();
}

$sellerId = $_SESSION['all']["id"];
$infos = sellerInfo3Get($sellerId);


$sellerLbns = getSellerIdLbn($sellerId);
foreach($sellerLbns as $insert_prof){};

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>NIL_販売者用ページ</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../../css/public.css">
    <link rel="stylesheet" type="text/css" href="../../css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../../css/slick.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="slick.min.js"></script>
    <script src="../../../app/js/test.js" type="text/javascript"></script>
    <script src="../../../app/js/seller.js" type="text/javascript"></script>
 <body>

<div class="sth-wrap">
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

<div class="header-info-wrapper">
	<div class="header-info-content">
		<span class="header-info"><a href="../../user/user_info/user_info.php"><?= $info['date'] ?>&emsp;<?= $info['info_title'] ?></a><span>
	</div>
</div>



<div class="st-left">
	<div class="st-left-wrapper">
		<div class="st-lbn-header">
			<ul class="st-lbn-li">
				<a href="../seller_research/seller_research_top.php?name=トカゲ"><li>トカゲ</li></a>
				<a href="../seller_research/seller_research_top.php?name=ヤモリ"><li>ヤモリ</li></a>
				<a href="../seller_research/seller_research_top.php?name=ナミヘビ"><li>ナミヘビ</li></a>
				<a href="../seller_research/seller_research_top.php?name=ボアパイソン"><li>ボアパイソン</li></a>
				<a href="../seller_research/seller_research_top.php?name=リクガメ"><li>リクガメ</li></a>
				<a href="../seller_research/seller_research_top.php?name=ミズガメ"><li>ミズガメ</li></a>
				<a href="../seller_research/seller_research_top.php?name=カメレオン"><li>カメレオン</li></a>
				<a href="../seller_research/seller_research_top.php?name=両生類"><li>両生類</li></a>
				<a href="../seller_research/seller_research_top.php?name=小動物"><li>小動物</li></a>
				<a href="../seller_research/seller_research_top.php?name=その他"><li>その他</li></a>
			</ul>
			<a href="../seller_research/seller_sold_out.php?sold_out=1"><span class="st-header-sold">売約済み</span></a>
		</div>
