<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="seller_login.html">ログイン画面へ</a>';
	exit();
}

require_once '../../../app/data_function/Getdata.php' ;

$sellerId = $_SESSION['all']["id"];
$sellerLbns = getSellerIdLbn($sellerId);
foreach($sellerLbns as $insert_prof){};

$sellerInfos = sellerInfo1Get($sellerId);
foreach($sellerInfos as $sellerInfo){};

$sellers= getseller($sellerId);
foreach($sellers as $seller){};

$picks=getPickIdLbn($sellerId);
foreach($picks as $pick){};

$home_pic = homeGet($sellerId);
$prof_pic = profGet($sellerId);

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
				<li><a href="seller_mypage.php">マイページ設定</a></li>
			</ul>
		</div>
  	</div>
</div>

<div class="seller_main">
<div class="smp-main">
    <div class="smp-top">
        <div>
            <?php foreach($home_pic as $home_pic): ?>
                <img src ="<?= "{$home_pic['home_file_path']}"; ?>" alt= ""  onerror="this.onerror = null; this.src='';" class="home_pic">
            <?php endforeach?>
            <img src="../../pic/home-pic.png" class="home-set-button">
        </div>
        <div>
            <?php foreach($prof_pic as $prof_pic): ?>
                <a href="seller_mypage_update.php"><img src ="<?= "{$prof_pic['prof_file_path']}"; ?>" alt= ""  onerror="this.onerror = null; this.src='';" class="prof_pic"></a>
            <?php endforeach?>
            <a href="seller_mypage_update.php"><img src="../../pic/profile_icon.png" class="prof_icon" alt=""  onerror="this.onerror = null; this.src='';"></a>
            <a href="seller_mypage_update.php" class="update">基本情報変更</a>
        </div>
    </div>

    <div class="prof-top-left">
        <div class=prof-2>
            <div class="tweet-button">
                <a href="../seller_tweet/seller_tweet_top.php" class="tweet-button2">つぶやき</a>
            </div>
        </div>
    </div>

<!--　home変更ボタン　-->
    <div class="home-set">
        <div class="home-set-con">
        <label>
            <p class="home-edit">ホーム画面の編集</p>
            <p class="file-select">ファイルを選択</p>
            <form method="post" action="homepic_check.php" enctype="multipart/form-data" required>
                <input class="file-post" type="file" accept="image/png/jpeg" name="home_pic" onchange="previewImage(this);">
                <div>
                    <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";>
                </div>
                <input type="submit" value="決定" class="smp-sub">
            </form>
                
        </label>
            <p class="home-cancel">キャンセル</p>
        </div>
    </div>

<!--　prof変更ボタン　-->
        <div class="prof-set">
        <div class="prof-set-con">
        <label>
            <p class="prof-edit">プロフィール画像の編集</p>
            <p class="file-select">ファイルを選択</p>
            <form method="post" action="homepic_check.php" enctype="multipart/form-data" required>
                <input class="file-post" type="file" accept="image/png/jpeg" name="prof_pic" onchange="previewImage2(this);">
                <div>
                    <img id="preview2" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";>
                </div>
                <input type="submit" value="決定" class="smp-sub">
            </form>
                
        </label>
            <p class="prof-cancel">キャンセル</p>
        </div>
    </div>
<!--home, prof変更はここまで -->

    <div class="prof-top">
        <div>
            <span class="prof_name"><?= $insert_prof['corp']?></span>
        </div>
        <div class="prof-1">
            <p class="prof-title">タイトル<p>
            <p class="prof-content"><?= $insert_prof['mp_comment']?><p>
        </div>
        <div class="corp-info">
                <p>住所：<?= $seller['address1']?><?= $seller['address2']?></p>
                <p>電話番号：<?= $seller['phone']?></p>
                <p>営業日：<?= $seller['business_day']?></p>
                <p>営業時間：<?= $seller['business_time']?></p>
                <p>WEB:<?= $seller['web']?></p>
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
						<a href="seller_mypage_cg.php?name=トカゲ" class="smp-lbn-cg-a"><li>トカゲ<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=ヤモリ" class="smp-lbn-cg-a"><li>ヤモリ<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=ナミヘビ" class="smp-lbn-cg-a"><li>ナミヘビ<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=ボアパイソン" class="smp-lbn-cg-a"><li>ボアパイソン<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=リクガメ" class="smp-lbn-cg-a"><li>リクガメ<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=ミズガメ" class="smp-lbn-cg-a"><li>ミズガメ<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=カメレオン" class="smp-lbn-cg-a"><li>カメレオン<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=両生類" class="smp-lbn-cg-a"><li>両生類<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=小動物" class="smp-lbn-cg-a"><li>小動物<span>＞</span></li></a>
						<a href="seller_mypage_cg.php?name=その他" class="smp-lbn-cg-a"><li>その他<span>＞</span></li></a>
					</ul>
				</div>
			</div>
        </div>
    </div>
    <div class="smp-info-wrapper">
        <div class="smp-info-main">
            <p class="smp-info-title">店舗からのお知らせ</p>
            <table class="smp-info-table">
                <tr class="smp-info-tr">
                    <th class="smp-info-th"><a href="../seller_info/seller_info_list.php"><?= $sellerInfo['si_date'] ?>&emsp;<?= $sellerInfo['si_title'] ?></a></th>
                </tr>
            </table>
            <a href="../seller_info/seller_info_list.php" class="info_button">お知らせ一覧へ</a>
        </div>
    
    
    <div class="smp-event-wrapper">
        <div class="smp-event-content">
            <p></p>
        </div>
    </div>

    <div class="smp-lbn-main">
        <div class="smp-fav-lbn1">
            <h3 class="smp-pick">PICK UP</h3>
                <div class="smp-showlbn1">
                    <?php foreach($picks as $pick): ?>
                    <div class="pick-content">
                        <div class="pick-left">
                            <a href ="lbn_details.php?lbn_id=<?="{$pick['id']}"; ?>"><img src ="<?= "{$pick['p_file_path']}"; ?>" ,alt= "" class="smp-p-showpic"></a>
                        </div>
                        <ul class="pick-right">
                            <li class="pname">生体名：<?=$pick['p_name']?></li>
                            <li class="pmorph">モルフ：<?=$pick['p_morph']?></li>
                            <li class="pprice">価格：<?=$pick['p_price']?></li>
                            <li class="pcomment">コメント：<?=$pick['p_comment']?></li>
                        </ul>
                    </div>
                    <?php endforeach?>
                </div>
		 </div>

        <div class="smp-fav-lbn2">
        <h3>新着情報</h3>
					<div class="smp-showlbn2">
						<?php foreach($sellerLbns as $sellerLbn): ?>
							<a href ="../seller_lbn_details/seller_lbn_details.php?lbn_id=<?=$sellerLbn['lbn_id']?>">
                                <div class="smp-show">
                                    <img src ="<?= "{$sellerLbn['file_path']}"; ?>" ,alt= "" class="smp-showpic">
                                    <?php if ($sellerLbn['soldout'] == '1') :?>
                                        <div class="smp_sold_out">
                                            <span class="smp_sold_out_text">売約済</span>    
                                        </div>
                                    <?php endif ?>
                                </div>
                            </a>
						<?php endforeach?>
					</div>
                </div>
					<div class="smp-moreButton">
						<a href="seller_mypage_allLbn.php"><button class="smp-more-button" type="button">
							もっと見る
						</button></a>
					</div>
        </div>
    </div>
</div>


<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>