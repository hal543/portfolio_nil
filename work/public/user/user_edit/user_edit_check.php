<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' ); ?>

<?php

$new_user_name=$_POST['user_name'];
$new_user_mail=$_POST['user_mail'];
$new_age=$_POST['age'];
$new_gender=$_POST['gender'];
$new_user_address=$_POST['user_address'];
$new_w_lbh=$_POST['w_lbh'];
$new_w_morph=$_POST['w_morph'];
$new_user_pass=$_POST['user_pass'];
$new_user_passag=$_POST['user_passag'];

$new_user_name=htmlspecialchars($new_user_name, ENT_QUOTES, 'UTF-8');
$new_user_mail=htmlspecialchars($new_user_mail, ENT_QUOTES, 'UTF-8');
$new_age=htmlspecialchars($new_age, ENT_QUOTES, 'UTF-8');
$new_gender=htmlspecialchars($new_gender, ENT_QUOTES, 'UTF-8');
$new_user_address=htmlspecialchars($new_user_address, ENT_QUOTES, 'UTF-8');
$new_w_lbn=htmlspecialchars($new_w_lbn, ENT_QUOTES, 'UTF-8');
$new_w_morph=htmlspecialchars($new_w_morph, ENT_QUOTES, 'UTF-8');
$new_user_pass=htmlspecialchars($new_user_pass, ENT_QUOTES, 'UTF-8');
$new_user_passag=htmlspecialchars($new_user_passag, ENT_QUOTES, 'UTF-8');

if($new_user_name === '')
{
	print 'ニックネームが入力されていません。';
	print '<br />';
}

if($new_user_mail === '')
{
	print 'メールアドレスが入力されていません。';
	print '<br />';
}

if($new_user_pass === '')
{
	print 'パスワードが入力されていません。';
	print '<br />';
}

if($new_user_pass !== $new_user_passag)
{
	print 'パスワードが一致しません。<br />';
}

?>

<?php if($new_user_name === '' || $new_user_mail ==='' || $new_user_pass ==='' || $new_user_pass!==$new_user_passag) :?>
	<form>
		<input type="button" onclick="history.back()" value="戻る">';
	</form>
<?php else :?>
<?php $new_user_pass=md5($new_user_pass);?>
	
<div class ="uec_wrapper">
	<div class="uec_main">
		<p class="uec_title">編集内容の確認</p>
		<p class="uec_title2">以下の内容で変更してもよろしいでしょうか？</p>


		<ul class="uec-list">
			<li>ユーザーネーム：<?= $new_user_name;?></li>
			<li>メールアドレス:<?= $new_user_mail; ?></li>
			<li>年齢：<?= $new_age; ?></li>
			<li>性別：<?= $new_gender; ?></li>
			<li>住所：<?= $new_user_address; ?></li>
			<li>お探しの生体：<?= $new_w_lbn; ?></li>
			<li>生体名：<?= $new_w_morph; ?></li>
		</ul>
	</div>

		<form method="post" action="user_edit_done.php">
			<input type="hidden" name="user_name" value="<?= $new_user_name ?>">
			<input type="hidden" name="user_mail" value="<?= $new_user_mail ?>">
			<input type="hidden" name="age" value="<?= $new_age ?>">
			<input type="hidden" name="gender" value="<?= $new_gender ?>">
			<input type="hidden" name="user_address" value="<?= $new_user_address ?>">
			<input type="hidden" name="w_lbn" value="<?= $new_w_lbn ?>">
			<input type="hidden" name="w_morph" value="<?= $new_w_morph ?>">
			<input type="hidden" name="user_pass" value="<?= $new_user_pass ?>">

			<input type="button" onclick="history.back()" value="戻る" class="uec-re">
			<input type="submit" value="ＯＫ" class="uec-sub">
		</form>

<?php endif ?>
<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>