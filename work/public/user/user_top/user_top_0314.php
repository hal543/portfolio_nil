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

$user_address = $_SESSION['user_all']["user_address"];
$favLbn = $_SESSION['user_all']["w_morph"];

$files = getLbn10Files();
$info = info1Get();
foreach($info as $info);
$favLbns = favMatchGet($favLbn);
$allTweets=tweet10Get();
$nearLbns=getLbnNearFiles($user_address);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title>ユーザー</title>
	<link rel="stylesheet" href="../../css/public.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script src="../../../app/js/test.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../../slick/slick/slick.css">
  	<link rel="stylesheet" type="text/css" href="../../slick/slick/slick-theme.css">
</head>

<body>
<div class="wrap">
<div class="header">
    <div class="header-container">
      	<div class="header-left">
        	<a href="user_top.php"><img src="../../pic/nil_logo.jpeg"></a>
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

<div class="main">
    <div class="middle-wrapper">
    	<div class="middle-title">
			<h1 class="search_title1">Nature In Living</h1>
			<p class="search_title2">運命の子に出会おう。</p>    		
			<form id="form2" action="../user_research/result.php" method="post">
				<input class="sbox2"  id="s" name="lbn_result" type="text" placeholder="お探しの生体名を入力して下さい"/>
				<button type="submit" class="sbtn2"><i class="fas fa-search"></i></button>
			</form>
    	</div>
	</div>

<div class ="sub_header">
	<div class="login_name">
		<?= ($_SESSION['user_all']["user_name"]);?>
		<?= 'さんログイン中<br />';?>
	</div>
	<div class="edit_content"> 
		<a href="../user_edit/user_edit.php" class="edit">プロフ編集</a>
	</div>
</div>

	<div class="category_wrapper">
		<div class="category_contents">
						
			<div class="lbn_category">
				<div class="lbn_cg_title">
					<p>カテゴリー別検索</p>
				</div>
				<div class="lbn_cg_list">
					<ul class="lbn_cg_ul">
						<a href="../user_research/user_category.php?name=トカゲ" class="lbn_cg_a"><li>トカゲ<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=ヤモリ" class="lbn_cg_a"><li>ヤモリ<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=ナミヘビ" class="lbn_cg_a"><li>ナミヘビ<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=ボアパイソン" class="lbn_cg_a"><li>ボアパイソン<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=リクガメ" class="lbn_cg_a"><li>リクガメ<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=ミズガメ" class="lbn_cg_a"><li>ミズガメ<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=カメレオン" class="lbn_cg_a"><li>カメレオン<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=両生類" class="lbn_cg_a"><li>両生類<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=小動物" class="lbn_cg_a"><li>小動物<span>＞</span></li></a>
						<a href="../user_research/user_category.php?name=その他" class="lbn_cg_a"><li>その他<span>＞</span></li></a>
					</ul>
				</div>
			</div>

			<div class="address_category">
				<div class="ad_cg_title">
					<p>都道府県から検索</p>
				</div>
				<div class="ad_cg_list">
					<ul class="ad_cg_ul">
						<li class="ad_hk_menu"><a href="../user_research/user_category_ad.php?name=北海道">北海道</a>
						</li>
						
						<li class="ad_th_menu">東北<span class="sp">＞</span>
							<ul class="th_second_level">
								<a href="../user_research/user_category_ad.php?name=青森県" class="te"><li>青森県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=岩手県" class="te"><li>岩手県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=秋田県" class="te"><li>秋田県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=宮城県" class="te"><li>宮城県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=山形県" class="te"><li>山形県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=福島県" class="te"><li>福島県<span>＞</span></li></a>
							</ul>
						</li>
						
						<li class="ad_kt_menu">関東<span class="sp">＞</span>
							<ul class="kt_second_level">
								<a href="../user_research/user_category_ad.php?name=茨城県" class="te"><li>茨城県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=栃木県" class="te"><li>栃木県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=群馬県" class="te"><li>群馬県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=埼玉県" class="te"><li>埼玉県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=千葉県" class="te"><li>千葉県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=東京都" class="te"><li>東京都<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=神奈川県" class="te"><li>神奈川県<span>＞</span></li></a>
							</ul>
						</li>
						
						<li class="ad_tb_menu">中部<span class="sp">＞</span>
							<ul class="tb_second_level">
								<a href="../user_research/user_category_ad.php?name=新潟県" class="te"><li>新潟県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=富山県" class="te"><li>富山県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=石川県" class="te"><li>石川県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=福井県" class="te"><li>福井県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=山梨県" class="te"><li>山梨県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=長野県" class="te"><li>長野県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=岐阜県" class="te"><li>岐阜県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=静岡県" class="te"><li>静岡県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=愛知県" class="te"><li>愛知県<span>＞</span></li></a>
							</ul>
						</li>

						<li class="ad_kk_menu">近畿<span class="sp">＞</span>
							<ul class="kk_second_level">
								<a href="../user_research/user_category_ad.php?name=三重県" class="te"><li>三重県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=滋賀県" class="te"><li>滋賀県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=京都府" class="te"><li>京都府<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=大阪府" class="te"><li>大阪府<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=兵庫県" class="te"><li>兵庫県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=奈良県" class="te"><li>奈良県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=和歌山県" class="te"><li>和歌山県<span>＞</span></li></a>
							</ul>
						</li>
						
						<li class="ad_tg_menu">中国<span class="sp">＞</span>
							<ul class="tg_second_level">
								<a href="../user_research/user_category_ad.php?name=鳥取県" class="te"><li>鳥取県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=島根県" class="te"><li>島根県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=岡山県" class="te"><li>岡山県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=広島県" class="te"><li>広島県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=山口県" class="te"><li>山口県<span>＞</span></li></a>
							</ul>
						</li>

						<li class="ad_sk_menu">四国<span class="sp">＞</span>
							<ul class="sk_second_level">
								<a href="../user_research/user_category_ad.php?name=徳島県" class="te"><li>徳島県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=香川県" class="te"><li>香川県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=愛媛県" class="te"><li>愛媛県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=高知県" class="te"><li>高知県<span>＞</span></li></a>
							</ul>
						</li>
						
						<li class="ad_ks_menu">九州地方<span class="sp_m">＞</span>
							<ul class="ks_second_level">
								<a href="../user_research/user_category_ad.php?name=福岡県" class="te"><li>福岡県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=佐賀県" class="te"><li>佐賀県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=長野県" class="te"><li>長崎県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=熊本県" class="te"><li>熊本県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=大分県" class="te"><li>大分県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=宮崎県" class="te"><li>宮崎県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=鹿児島県" class="te"><li>鹿児島県<span>＞</span></li></a>
								<a href="../user_research/user_category_ad.php?name=沖縄県" class="te"><li>沖縄県<span>＞</span></li></a>
							</ul>
						</li>
					</ul>
				</div>
			</div>

		</div>
		
		<div class="seller_ad1">
			<a href="../../seller/seller_add/seller_add.php" class="seller_ad2"><span>販売者の方はこちら<span><a>
		</div>
	</div>


	<div class="info-middle">
		<div class="info-wrapper">
			<div class="info-main">
				<p class="info-title">お知らせ</p>
				<table class="info-table">
					<tr class="info-tr">
						<th class="info-th"><a href="../user_info/user_info.php"><?= $info['date'] ?>&emsp;<?= $info['info_title'] ?></a></th>
					</tr>
				</table>
			</div>
		</div>

		<div class="lbn_main">

			<div class="fav_lbn">
				<h2><?= ($_SESSION['user_all']["user_name"]);?>さんのお探しの生体</h2>
						<div class="showlbn1">
							<?php foreach($favLbns as $favLbn): ?>
								<a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$favLbn['lbn_id']}"; ?>"><img src ="<?= "{$favLbn['file_path']}"; ?>" ,alt= "" class="showpic"></a>
								<?php if ($favLbn['soldout'] == '1') :?>
                                    <div class="ut_sold_out">
                                        <span class="ut_sold_out_text">売約済</span>    
                                    </div>
                                <?php endif ?>
							<?php endforeach?>
						</div>
						<div class="moreButton">
							<button class="more-button" type="button">
								もっと見る
							</button>
						</div>
			</div>
			<div class="utweet_wrapper">
				<div class="sliderArea">
					<div class="regular_2 slider">
               			 <?php foreach($allTweets as $tweet): ?>
                            <div class="utweet_content">
                                <div class="tweet_header">
                                <a href ="../user_seller_page/user_seller_top.php?seller_id=<?="{$tweet['seller_id']}"; ?>" class="">
                                    <span><img src ="<?= $tweet['prof_file_path']; ?>" ,alt= "" class="utweet_pic"></span>
                                    <div class="tweet_right">
                                        <p class="tweet_corp_name"><?= $tweet['corp'] ?></p> 
                                        <p class="tweet_time"><?= $tweet['send_time']?></p>
                                    </div>
                                </div>
                                <div class="tweet_footer">
                                    <p class="utweet"><?= $tweet['seller_tweet']?></p>
                                </div>
                                </a>
                            </div>
							<?php endforeach?>  
                    </div>
                </div>
                
            </div>

			<div class="all_lbn">
				<p class="all_lbn_title">全ての新着生体情報</p>
					<div class="showlbn2">
						<?php foreach($files as $file): ?>
						<div class="ut_all_lbn">
							<a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$file['lbn_id']}"; ?>">
								<img src ="<?= "{$file['file_path']}"; ?>" ,alt= "" class="showpic">
							</a>
							<?php if ($file['soldout'] == '1') :?>
								<div class="ut_sold_out">
									<span class="ut_sold_out_text">売約済</span>    
								</div>
							<?php endif ?>
							</div>
						<?php endforeach?>
					</div>
					<div class="moreButton">
						<button class="more-button" type="button">
							もっと見る
						</button>
					</div>
			</div>

			<div class="near_lbn">
				<p class="near_lbn_title">近隣エリアの新着生体情報</p>
					<div class="showlbn2">
						<?php foreach($nearLbns as $nearLbn): ?>
							<a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$nearLbn['lbn_id']}"; ?>"><img src ="<?= "{$nearLbn['file_path']}"; ?>" ,alt= "" class="showpic"></a>
							<?php if ($nearLbn['soldout'] == '1') :?>
								<div class="ut_sold_out">
									<span class="ut_sold_out_text">売約済</span>    
								</div>
							<?php endif ?>
						<?php endforeach?>
					</div>
					<div class="moreButton">
						<button class="more-button" type="button">
							もっと見る
						</button>
					</div>
			</div>
		</div>
	</div>
</div>

	<div class="footer">
    <div class="footer-contents">

      <ul class="footer-menu">
        <li>&nbsp;会社概要 </li>
        <li>&nbsp;レンタルアクアリウム </li>
        <li>&nbsp;オーダーメイドアクアリウム </li>
        <li>&nbsp;アクアリウスフラワーマネジメント</li>
        <li>&nbsp;ワークショップ</li>
        <li>&nbsp;イベントアクアリウム</li>
        <li>&nbsp;事例紹介</li>
        <li>&nbsp;お知らせ</li>
        <li>&nbsp;採用情報</li>
        <li>&nbsp;お問い合わせ</li>
        <li>&nbsp;個人情報保護方針</li>
      </ul>
	</div>
			</div>

  <div class="footer-img">
    <p>© All rights reserved by NIL.</p>
  </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="../../slick/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
$(document).on('ready', function() {
  $(".regular_2").slick({
	autoplay: true,
	autoplaySpeed: 2500,
	pauseOnHover: true,
    infinite: true,
	centerMode: true,
	centerPadding: '1px',
    slidesToShow: 2,
    slidesToScroll: 1
  });
});

</script>

</body>
</html>