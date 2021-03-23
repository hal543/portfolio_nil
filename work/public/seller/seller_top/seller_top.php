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

<div class="st-wrap">
 <div class="header">
    <div class="header-container">
      	<div class="header-left">
        	<a href="seller_top.php"><img src="../../pic/nil_logo.jpeg"></a>
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

		<span class="st-header-title">全ての投稿<span>
		<div class="st-showlbn">
			<?php foreach($sellerLbns as $sellerLbn): ?>
				<a href ="../seller_lbn_details/seller_lbn_details.php?lbn_id=<?="{$sellerLbn['lbn_id']}"; ?>">
					<div class="st-show">
							<form action="sold_out_check.php" method="post"  class="sold_out_button">
								<input type=hidden name="lbn_id" value="<?= $sellerLbn['lbn_id']?>">
								<input type=hidden name="num" value="1">
								<input type=submit value="販売済" class="sold_out_check_button">
							</form>
						<div class="deletes">
							<form action="lbn_delete.php" method="post"  class="st_delete">
								<input type=hidden name="lbn_id" value="<?= $sellerLbn['lbn_id']?>">
								<input type=submit value="&#xf00d;" class="fas" id="delete">
							</form>
						</div>
						<img src ="<?= "{$sellerLbn['file_path']}"; ?>" ,alt= "" class="st-showpic">
							<?php if ($sellerLbn['soldout'] == '1') :?>
								<div class="st_sold_out">
									<span class="st_sold_out_text">売約済</span>    
								</div>
               				 <?php endif ?>
						<div class="st-price-content">
							<p class="st-price">¥<?=$sellerLbn['price']?></p>
						</div>
					</div>
				</a>
			<?php endforeach?>
		</div>
		<div class="st-moreButton">
			<a href="../seller_research/seller_lbn_all.php">
				<button class="st-more-button" type="button">
					もっと見る
				</button>
			</a>
		</div>
	</div>

	<div class="st-info">
	<div class="st-info-title">
		<p>お知らせ投稿<p>
	</div>
	<div class="st-info-wrapper">
		<?php foreach($infos as $info): ?>
		<div class="st-info-content">
			<a href="../seller_info/seller_info_list.php"><?= $info['si_date'] ?>&emsp;<?= $info['si_title'] ?></a>
		</div>
		<?php endforeach?>
		<div>
			<a href="../seller_info/seller_info_list.php" class="st_info_button">お知らせ一覧へ</a>
		</div>
	</div>
</div>
</div>

<div class="st-right">
	<div class="st-right-wrapper">
		<ul class="st-right-list">
			<li><a href=../seller_edit/seller_edit.php class="st">基本情報の変更</a></li>
			<li class="mypage_button">マイページ関連
				<ul class="mypage_button_content">
					<a href="../seller_mypage/seller_mypage_pre.php" class="st"><li>マイページブレビュー</li></a>
					<a href="../seller_mypage/seller_mypage_update.php" class="st"><li>マイページ編集</li></a>
				</ul>
			</li>
			<li class="post_button">投稿関連
				<ul class="post_button_content">
					<a href="../seller_post/seller_post.php" class="st"><li>生体投稿</li></a>
					<a href="../seller_pickup/seller_pickup.php" class="st"><li>PICK UP投稿</li></a>
					<a href="../seller_info/seller_info_post.php" class="st"><li>お知らせ投稿</li></a>
				</ul>
			</li>
			<li><a href="../seller_tweet/seller_tweet_top.php" class="st">つぶやき</a></li>
			<li><a href="../seller_form/seller_form.php" class="st">問い合わせ</a></li>
			<li class="account_button">アカウント
				<ul class="account_button_content">
					<a href="../seller_log/seller_logout.php" class="st"><li>ログアウト</li></a>
					<a href="../seller_pickup/seller_pickup.php" class="st"><li>アカウント削除</li></a>
				</ul>
			</li>
		</ul>
	</div>
</div>
		

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>	