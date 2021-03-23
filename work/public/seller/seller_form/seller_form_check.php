<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php

$t_form= filter_input(INPUT_POST,'t_form',FILTER_SANITIZE_SPECIAL_CHARS);
$m_form=filter_input(INPUT_POST,'m_form',FILTER_SANITIZE_SPECIAL_CHARS);
$seller_id=filter_input(INPUT_POST,'seller_id',FILTER_SANITIZE_SPECIAL_CHARS);
$corp=filter_input(INPUT_POST,'corp',FILTER_SANITIZE_SPECIAL_CHARS);
$seller=filter_input(INPUT_POST,'seller',FILTER_SANITIZE_SPECIAL_CHARS);
$mail=filter_input(INPUT_POST,'mail',FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($t_form))
{
    array_push($err_msgs,'タイトルが入力されていません。');
}

if(empty($m_form))
{
    array_push($err_msgs,'内容が入力されていません。<br />');
}
?>


<?php if( empty($t_form) || empty($m_form)): ?>
    <div>
		<form>
			<input type="button" onclick="history.back()" value="戻る">';
		</form>
    </div>
    
<?php else : ?>

    <div class="ufc_wrapper">
         <div class="ufc_main">
            <div class="ufc_titles">
                <p class="ufc_title1">お問い合わせ内容の確認</p>
                <p class="ufc_title2">-Contact Check-</p>
                <p class="ufc_title3">以下の内容でよろしければ、下記の「送信」ボタンをクリックしてください。</p>
            </div>

            <div class="ufc_form">  
                <div class="ufc_f_content1">
                    <p class="ufc_p1">件名</p>
                    <p class="ufc_t"><?= $t_form ?></p>
                </div>
                <div class="ufc_f_content2">
                    <p class="ufc_p2">送信内容</p>
                    <p class="ufc_m"><?= $m_form ?></p>
                </div>
            </div>
         

            <form method="post" action="seller_form_done.php">
                <input type="hidden" name="t_form" value="<?= $t_form;?>">
                <input type="hidden" name="m_form" value="<?= $m_form;?>">
                <input type="hidden" name="seller_id" value="<?= $seller_id;?>">
                <input type="hidden" name="corp" value="<?= $corp;?>">
                <input type="hidden" name="seller" value="<?= $seller;?>">
                <input type="hidden" name="mail" value="<?= $mail;?>">

                <div class="ufc_post_contents">
                    <input type="button" onclick="history.back()" value="戻る" class="ufc_re">
                    <input type="submit" value="送信" class="ufc_sub">
                </div>
            </form>
        </div>
    </div>

<?php endif ?>
<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>