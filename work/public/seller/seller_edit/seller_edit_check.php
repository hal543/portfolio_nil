<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php
$new_corp= filter_input(INPUT_POST,'corp',FILTER_SANITIZE_SPECIAL_CHARS);
$new_seller= filter_input(INPUT_POST,'seller',FILTER_SANITIZE_SPECIAL_CHARS);
$new_phone=filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
$new_fax=filter_input(INPUT_POST,'fax',FILTER_SANITIZE_SPECIAL_CHARS);
$new_mail=filter_input(INPUT_POST,'mail',FILTER_SANITIZE_SPECIAL_CHARS);
$new_postnumber=filter_input(INPUT_POST,'postnumber',FILTER_SANITIZE_SPECIAL_CHARS);
$new_address1=filter_input(INPUT_POST,'address1',FILTER_SANITIZE_SPECIAL_CHARS);
$new_address2=filter_input(INPUT_POST,'address2',FILTER_SANITIZE_SPECIAL_CHARS);
$new_web=filter_input(INPUT_POST,'web',FILTER_SANITIZE_SPECIAL_CHARS);
$new_pass=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_SPECIAL_CHARS);
$new_passag=filter_input(INPUT_POST,'passag',FILTER_SANITIZE_SPECIAL_CHARS);

if($new_corp=='')
{
	print '法人名/屋号が入力されていません';
}

if($new_seller=='')
{
	print '担当者名が入力されていません';
}

if($new_mail=='')
{
	print 'メールアドレスが入力されていません';
}

if($new_pass!=$new_passag)
{
	print 'パスワードが一致しません。<br />';
}
?>

<?php if($new_corp=='' || $new_seller==''||$new_mail==''||$new_pass!=$new_passag): ?>
	<div>
		<form>
			<input type="button" onclick="history.back()" value="戻る">
		</form>
	</div>
<?php else :?>

<div class ="sec-wrapper">
	<div class="sec-title">
		<p>編集内容の確認</p>
    </div>

	<div class= "sec-middle">

        <ul class="sec-list">
            <li>法人名/屋号：<?= $new_corp;?></li>
            <li>担当者名:<?= $new_seller; ?></li>
            <li>電話番号：<?= $new_phone; ?></li>
            <li>FAX番号：<?= $new_fax; ?></li>
            <li>メールアドレス：<?= $new_mail; ?></li>
            <li>郵便番号：<?= $new_postnumber; ?></li>
            <li>住所（都道府県）：<?= $new_address1; ?></li>
            <li>住所（市町村）：<?= $new_address2; ?></li>
            <li>WEB：<?= $new_web; ?></li>
        </ul>
	</div>

	<?php $new_pass=md5($new_pass); ?>
		<form method="POST" action="seller_edit_done.php">
		<input type="hidden" name="corp" value="<?= $new_corp ;?>">
		<input type="hidden" name="seller" value="<?= $new_seller ;?>">
		<input type="hidden" name="phone" value="<?= $new_phone ;?>">
		<input type="hidden" name="fax" value="<?= $new_fax ;?>">
		<input type="hidden" name="mail" value="<?= $new_mail ;?>">
		<input type="hidden" name="postnumber" value="<?= $new_postnumber ;?>">
		<input type="hidden" name="address1" value="<?= $new_address1 ;?>">
		<input type="hidden" name="address2" value="<?= $new_address2 ;?>">
		<input type="hidden" name="web" value="<?= $new_web ;?>">
		<input type="hidden" name="pass" value="<?= $new_pass ;?>">
		
		<div class="tc_post_contents">
		<div class="uac-title2">
			<span>上記の内容で送信しますか？</span>
		</div>
			<input type="button" onclick="history.back()" value="戻る" class="sec-re">
			<input type="submit" value="ＯＫ" class="sec-sub">
		</form>
		</div>

<?php endif ?>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>