<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザー</title>
  <link rel="stylesheet" href="../../css/public.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>

<div class="header">
    <div class="header-container">
      	<div class="header-left">
        	<a href="user_top.php"><img src="../../pic/nil_logo.jpeg"></a>
      	</div>
      	<div class="header-right">
		</div>
  	</div>
</div>

<?php

$user_name=$_POST['user_name'];
$user_mail=$_POST['user_mail'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$user_address=$_POST['user_address'];
$w_lbn=$_POST['w_lbn'];
$w_morph=$_POST['w_morph'];
$user_pass=$_POST['user_pass'];
$user_passag=$_POST['user_passag'];


$user_name=htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8');
$user_mail=htmlspecialchars($user_mail, ENT_QUOTES, 'UTF-8');
$age=htmlspecialchars($age, ENT_QUOTES, 'UTF-8');
$gender=htmlspecialchars($gender, ENT_QUOTES, 'UTF-8');
$user_address=htmlspecialchars($user_address, ENT_QUOTES, 'UTF-8');
$w_lbn=htmlspecialchars($w_lbn, ENT_QUOTES, 'UTF-8');
$w_morph=htmlspecialchars($w_morph, ENT_QUOTES, 'UTF-8');
$user_pass=htmlspecialchars($user_pass, ENT_QUOTES, 'UTF-8');
$user_passag=htmlspecialchars($user_passag, ENT_QUOTES, 'UTF-8');

if($user_name=='')
{
	print 'ニックネームが入力されていません。<br />';
}

if($user_mail=='')
{
	print 'メールアドレスが入力されていません。<br />';
}

if($age=='')
{
	print '年齢が入力されていません。<br />';
}

if($gender=='')
{
	print '性別が選択されていません。<br />';
}

if($user_pass=='')
{
	print 'パスワードが入力されていません。<br />';
}

if($user_pass!=$user_passag)
{   
    print "パスワードが一致しておりません。";
}
?>

<?php if($user_name=='' || $user_mail=='' || $age=='' || $gender=='' || $user_pass=='' || $user_pass!=$user_passag) :?>

	<form>
		<input type="button" onclick="history.back()" value="戻る">
	</form>

<?php else : ?>
<?php $user_pass=md5($user_pass);?>

<div class ="uac-main">
	<div class="uac-title">
		<p class="uac-title1">登録内容の確認</p>
		<p class="uac-title2">以下の内容で登録してもよろしいでしょうか？</p>
	</div>

	<div class="uac-middle">
        <ul class="uac_list">
            <li>ニックネーム：<?= $user_name;?></li>
            <li>メールアドレス:<?= $user_mail; ?></li>
            <li>年齢：<?= $storein; ?></li>
            <li>性別：<?= $birth; ?></li>
            <li>住所：<?= $user_address; ?></li>
            <li>お探しの生体（種類）：<?= $w_lbn; ?></li>
            <li>生体名：<?= $w_morph; ?></li>
		</ul>
	</div>

	<form method="post" action="user_add_done.php" class="ua_form"> 
		<input type="hidden" name="user_name" value="<?= $user_name ?>">
		<input type="hidden" name="user_mail" value="<?= $user_mail ?>">
		<input type="hidden" name="age" value="<?= $age ?>">
		<input type="hidden" name="gender" value="<?= $gender ?>">
		<input type="hidden" name="user_address" value="<?= $user_address ?>">
		<input type="hidden" name="w_lbn" value="<?= $w_lbn ?>">
		<input type="hidden" name="w_morph" value="<?= $w_morph ?>">
		<input type="hidden" name="user_pass" value="<?= $user_pass ?>">
		<input type="button" onclick="history.back()" value="戻る" class="uac-re">
		<input type="submit" value="ＯＫ" class="uac-sub">
	</form>
</div>



	<?php endif ?>

	<div class="footer">
    <div class="footer-contents">

      <ul class="footer-menu">
      </ul>
    </div>

  <div class="footer-img">
    <p>© All rights reserved by NIL.</p>
  </div>
</div>

</body>
</html>