<?php

require_once '../../../app/data_function/Getdata.php' ;

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="user_login.html">ログイン画面へ</a>';
	exit();
}

$sellerId = $_GET['seller_id'];
$sellerLbns = getSellerIdLbn($sellerId);
foreach($sellerLbns as $insert_prof){};

$sellerInfos = sellerInfoGet($sellerId);
foreach($sellerInfos as $sellerInfo){};


$picks=getPickIdLbn($sellerId);
foreach($picks as $pick){};

$home_pic = homeGet($sellerId);
$prof_pic = profGet($sellerId);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>NIL_販売者ページ</title>
  <link rel="stylesheet" href="../../css/public.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script src="test.js" type="text/javascript"></script>
  
</head>

<body>
<div class="wrap">
<div class="header">
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
<div class="seller_main">

<div class="ush-main">
    <div class="smp-top">
        <div>
            <?php foreach($home_pic as $home_pic): ?>
                <img src ="<?= "{$home_pic['home_file_path']}"; ?>" ,alt= "" class="home_pic">
            <?php endforeach?>
        </div>
        <div>
            <?php foreach($prof_pic as $prof_pic): ?>
                <a href="../user_seller_page/user_seller_top.php?seller_id=<?=$sellerId; ?>"><img src ="<?= "{$prof_pic['prof_file_path']}"; ?>" ,alt= "" class="prof_pic"></a>
            <?php endforeach?>
        </div>
    </div>

    <div class="prof-top-left">
        <div class=prof-2>
            <div class="tweet-button">
                <a href="../user_seller_tweet/user_seller_tweet_top.php?seller_id=<?=$sellerId?>" class="tweet-button2">つぶやき</a>
            </div>
        </div>
    </div>

    <div class="prof-top">
        <div>
            <span class="prof_name"><?= $insert_prof['corp']?></span>
        </div>
        <div class="prof-1">
            <p class="prof-title">自己紹介<p>
            <p class="prof-content"><?= $insert_prof['mp_comment']?><p>
        </div>
        <div class="us-corp-info">
                <p>住所：<?= $insert_prof['address1']?><?= $insert_prof['address2']?></p>
                <a class="address_button" href="https://www.google.com/maps/search/?api=1&query=<?= $insert_prof['address1']?><?= $insert_prof['address2']?>">MAP</a>
                <p>電話番号：<?= $insert_prof['phone']?></p>
                <p>営業日：<?= $insert_prof['business_day']?></p>
                <p>営業時間：<?= $insert_prof['business_time']?></p>
                <p>WEB:<?= $insert_prof['web']?></p>
            </div>
    </div>

    <div class="smp-category-wrapper">
		<div class="smp-category-contents">
						
			<div class="smp-lbn-category">
				<div class="smp-lbn-cg-title">
					<p>カテゴリー別検索</p>
				</div>
				<div class="smp-lbn-cg-list">
					<ul class="smp-lbn-cg-ul">
                        <a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=トカゲ" class="smp-lbn-cg-a"><li>トカゲ<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=ヤモリ" class="smp-lbn-cg-a"><li>ヤモリ<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=ナミヘビ" class="smp-lbn-cg-a"><li>ナミヘビ<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=ボアパイソン" class="smp-lbn-cg-a"><li>ボアパイソン<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=リクガメ" class="smp-lbn-cg-a"><li>リクガメ<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=ミズガメ" class="smp-lbn-cg-a"><li>ミズガメ<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=カメレオン" class="smp-lbn-cg-a"><li>カメレオン<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=両生類" class="smp-lbn-cg-a"><li>両生類<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=小動物" class="smp-lbn-cg-a"><li>小動物<span>＞</span></li></a>
						<a href="../user_research/user_seller_category.php?seller_id=<?= $sellerId?>&name=その他" class="smp-lbn-cg-a"><li>その他<span>＞</span></li></a>
					</ul>
				</div>
			</div>
        </div>
    </div>
    