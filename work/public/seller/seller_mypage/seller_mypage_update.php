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
$sellers= getseller($sellerId);
foreach($sellers as $seller){};

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
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
  <script src="../../../app/js/seller.js" type="text/javascript"></script>
 <body>

 <div class="header">
    <div class="header-container">
      	<div class="header-left">
        	<a href="../seller_top/seller_top.php"><img src="../../pic/nil_logo.jpeg"></a>
      	</div>
      	<div class="header-right">
        	<ul style="list-style: none;">
        		<li><a href="form_html" class="info">お問い合わせ</a></li>
        		<li><a href="seller_logout.php">ログアウト</a></li>
        		<li><a href="seller_chat.php">チャット</a></li>
				<li><a href="seller_post.php">投稿</a></li>
				<li><a href="seller_mypage.php">マイページ設定</a></li>
			</ul>
		</div>
  	</div>
</div>


<?php

try
{

$dsn='mysql:dbname=projectNIL;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT * FROM sellerTable WHERE id=:id';
$stmt=$dbh->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$id=$rec['id'];

$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>
<div class="smu-wrapper">
<div class="smu-main">
    <div class=smu-title>
        <p class="smu-title1">マイページ情報修正</p>
        <p class="smu-title2">内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
    </div>

    <form method="post" action="seller_mypage_check.php" enctype="multipart/form-data">
 
        <table class="smu-table">
            <tr>
                <th>プロフ写真</th>
                <td><div class="smu_prof">
                <img src ="<?= "{$seller['prof_file_path']}"; ?>" alt=""  onerror="this.onerror = null; this.src='';" class="view_prof_pic">
                    <input class="smu_pic" type="file" alt="" accept="image/png/jpeg" name="prof_pic" onchange="previewImage(this);">
                    <img id="preview" class="smu_pics" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";>
                </div></td>
            </tr>
            <tr>
                <th>法人名/屋号<span>※必須</span></th>
                <td><input name="corp" type="text" value="<?= $insert_prof['corp']?>" required></td>
            </tr>

            <tr>
                <th>電話番号 -（ハイフン）は不要です</th>
                <td><input name="phone" type="tel" value="<?= $insert_prof['phone']?>"></td>
            </tr>

            <tr>
                <th>郵便番号  -（ハイフン）は不要です</th>
                <td><input name="postnumber" type="text" value="<?= $insert_prof['postnumber']?>"></td>
            </tr>

            <tr>
                <th>住所（都道府県）</th>
                <td><input name="address1" type="text" value="<?= $insert_prof['address1']?>"></td>
            </tr>

            <tr>
                <th>住所（市町村）</th>
                <td><input name="address2" type="text" value="<?= $insert_prof['address2']?>"></td>
            </tr>

            <tr>
                <th>WEB</th>
                <td><input name="web" type="text" value="<?= $insert_prof['web']?>"></td>
            </tr>


            <tr>
                <th>営業日</th>
                <td><input name="business_day" type="text" value="<?= $insert_prof['business_day']?>"></td>
            </tr>

            <tr>
                <th>営業時間</th>
                <td><input name="business_time" type="text" value="<?= $insert_prof['business_time']?>"></td>
            </tr>

            <tr>
                <th>自己紹介</th>
                <td><textarea name="mp_comment" type="text" class="smu_text"><?= $insert_prof['mp_comment']?></textarea></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="reset" value="リセッﾄ" class="se-re">
                    <input type="submit" value="送信" class="se-sub">
                </td>
            </tr>
        </table>
    </form>
</div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>   