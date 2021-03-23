<?php

require_once '../app/data_function/Getdata.php' ;
$files = getLbn20Files();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>NIL</title>
	<link rel="stylesheet" href="css/public.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="../app/js/index.js" type="text/javascript"></script>
</head>


<body>
    <div class="in_wrap">
        <div class="in-header">
            <div class="in-header-container">
                <div class="in-header-left">
                    <a href="index.php"><img src="pic/nil_logo.jpeg"></a>
                </div>
                <div class="in-header-right">
                    <ul>
                        <li class="new_login1">ログイン
                            <ul class="new_login2">
                                <a href="user/user_log/user_login.php"><li>ユーザー</li></a>
                                <a href="seller/seller_log/seller_login.php"><li>販売者</li></a>
                            </ul>
                        </li>
                        <li class="new_register1">新規登録
                            <ul class="new_register2">
                                <a href="user/user_add/user_add.php"><li>ユーザー</li></a>
                                <a href="seller/seller_add/seller_add.php"><li>販売者</li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

       
        <div class="in_main">
            <div class="in_middle-wrapper">
                <div class="in_middle-title">
                    <p class="in_title1">Nature In Living</p>
                    <p class="in_title2">運命の子に出会おう。</p> 
                <div>
                <div class="user_register">
                    <p class="user_text">生体をお探しの方</p>
                        <a href="user/user_add/user_add.php" class="user_register_button">会員登録</a>
                </div>
                <div class="seller_register">
                    <p class="seller_text">販売者の方はこちら</p>
                        <a href="seller/seller_add/seller_add.php" class="seller_register_button">登録</a>
                </div>
            </div>
        </div>
    </div>

        <div class="concept-main">
            <div class="concept-content">
                <p class="concept-text1">Concept</p>
                <p class="concept-text2">NILは完全無料のエキゾチックアニマルに特化した<br>
                販売者と飼育者を繋ぐプラットフォームです。
                </p>
            </div>
        </div>

        <div class="feature-main">
            <div class="feature-title1">
                <p class="feature-title2">Feature</p>
            </div>

            <div class="feature-content1-wrap">
                <div class="feature-content1">
                    <img src="pic/in_light.png" class="in-search1">
                    <div class="feature-content1-right">
                        <p class="feature-content1-text1">POINT１</p>
                        <p class="feature-content1-text2">
                            お探しの子をピンポイントで見つける事が出来ます。</p><br>
                           <p> NILではお探しの子の生体情報を入力する事により、<br>
                            その情報を基に販売者が販売したタイミングでお知らせします。</p>
                    </div>
                </div>
            </div>

                <div class="feature-content2">
                    <img src="pic/in_heart.jpg" class="in-search2">
                    <div class="feature-content2-right">
                        <p class="feature-content2-text1">POINT２</p>
                        <p class="feature-content2-text2">
                            新しい発見が出来ます。</p><br>
                           <p>NILでは全国の協力販売店より、日々新しい生体情報 <br>
                            更新していただいておりますので、自分の知らない<br>
                            素敵な生体に会うことが出来ます。</p>
                    </div>
                </div>

            <div class="feature-content3">
                <img src="pic/in_search.jpg" class="in-search3">
                <div class="feature-content3-right">
                    <p class="feature-content3-text1">POINT３</p>
                    <p class="feature-content3-text2">
                        効率良く情報を収集出来ます。
                    </p><br>
                        <p>情報が一元化されていますので直接イベントや店舗に</br>
                            出向かわなくても効率良く生体情報を収集出来ます。
                        </p>
                </div>
            </div>
        </div>

        <div class="in-lbn-wrap">
            <p class="in-lbn-title">現在掲載されている新着生体<p>
            <div class="in-lbn-content">
                <?php foreach($files as $file) :?>
                    <div class="index-show">
                        <img src ="../app/images/<?= "{$file['file_name']}"; ?>" ,alt= "" class="index-showpic">
                    </div>
                <?php endforeach?>
            </div>
        </div>

        <div>
            <div class="index-footer">
                <a href="user/user_add/user_add.php"><p class="index_footer_button">全ての生体に会いにいく</p></a>
                <p class="index_footer_text">※本サービスは全て無料でご利用いただけます</p>
            </div>
        </div>
</div>
    
    <div class="in_footer">
        <div class="footer-contents">
            <div class="in_footer-menu">
                <span><a href="index.php">TOP</a></span>
                <span><a href="privacy/privacy.php">個人情報保護方針</a></span>
                <span><a href="user/user_commmon/administrator.php">運営者</span>
            </div>
            <div class="footer-img">
                <p>© All rights reserved by NIL.</p>
            </div>
        </div>
    </div>
</body>