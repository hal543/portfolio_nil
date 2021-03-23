<?php include ( dirname(__FILE__) . '/../seller_parts/seller_out_header.php' ); ?>

<?php

$corp= filter_input(INPUT_POST,'corp',FILTER_SANITIZE_SPECIAL_CHARS);
$seller= filter_input(INPUT_POST,'seller',FILTER_SANITIZE_SPECIAL_CHARS);
$phone= filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
$fax= filter_input(INPUT_POST,'fax',FILTER_SANITIZE_SPECIAL_CHARS);
$mail= filter_input(INPUT_POST,'mail',FILTER_SANITIZE_SPECIAL_CHARS);
$postnumber= filter_input(INPUT_POST,'postnumber',FILTER_SANITIZE_SPECIAL_CHARS);
$address1= filter_input(INPUT_POST,'address1',FILTER_SANITIZE_SPECIAL_CHARS);
$address2= filter_input(INPUT_POST,'address2',FILTER_SANITIZE_SPECIAL_CHARS);
$web= filter_input(INPUT_POST,'web',FILTER_SANITIZE_SPECIAL_CHARS);
$pass= filter_input(INPUT_POST,'pass',FILTER_SANITIZE_SPECIAL_CHARS);
$passag= filter_input(INPUT_POST,'passag',FILTER_SANITIZE_SPECIAL_CHARS);

if($corp=='')
{
	print '法人名/屋号が入力されていません。<br />';
}

if($seller=='')
{
	print '担当者名が入力されていません。<br />';
}

if($mail=='')
{
	print 'メールアドレスが入力されていません。<br />';
}

if($address1=='')
{
	print '住所（都道府県）が選択されていません。<br />';
}

if($pass=='')
{
	print 'パスワードが入力されていません。<br />';
}

if($pass!=$passag)
{   
    print "パスワードが一致しておりません。";
}
?>

<?php if($seller=='' || $mail=='' || $address1=='' || $pass=='' || $pass!=$passag) :?>
	<div class="sac_back">
		<form>
			<input type="button" onclick="history.back()" value="戻る">
		</form>
	</div>
<?php else:?>
	<?php $pass=md5($pass);?>
<div class="sac-wrapper">
	<div class ="sac_main">
		<div class="sac-title">
			<p class="sac_title1">登録内容の確認</p>
		</div>
		<div class="sac_middle">
			<ul class="sac_list">
				<li>法人名/屋号：<?= $corp;?></li>
				<li>担当者名:<?= $seller; ?></li>
				<li>電話番号：<?= $phone; ?></li>
				<li>FAX番号：<?= $fax; ?></li>
				<li>メールアドレス：<?= $mail; ?></li>
				<li>郵便番号：<?= $postnumber; ?></li>
				<li>住所（都道府県）：<?= $address1; ?></li>
				<li>住所（市町村　マンション名）：<?= $address2; ?></li>
				<li>WEB：<?= $web; ?></li>
			</ul>
		</div>
	</div>


	<form method="post" action="seller_add_done.php">
		<input type="hidden" name="corp" value="<?=$corp; ?>">
		<input type="hidden" name="seller" value="<?=$seller; ?>">
		<input type="hidden" name="phone" value="<?=$phone; ?>">
		<input type="hidden" name="fax" value="<?=$fax; ?>">
		<input type="hidden" name="mail" value="<?=$mail; ?>">
		<input type="hidden" name="postnumber" value="<?=$postnumber; ?>">
		<input type="hidden" name="address1" value="<?=$address1;?>">
		<input type="hidden" name="address2" value="<?=$address2;?>">
		<input type="hidden" name="web" value="<?=$web;?>">
		<input type="hidden" name="pass" value="<?=$pass;?>">

		<input type="button" onclick="history.back()" value="戻る" class="sac-re">
		<input type="submit" value="ＯＫ" class="sac-sub">
	</form>

<?php endif ?>
<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>