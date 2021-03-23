<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php


$si_date = date('Y/m/d');

$si_title= filter_input(INPUT_POST,'si_title',FILTER_SANITIZE_SPECIAL_CHARS);
$si_content=filter_input(INPUT_POST,'si_content',FILTER_SANITIZE_SPECIAL_CHARS);
$seller_id=filter_input(INPUT_POST,'seller_id',FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($si_title))
{
    array_push($err_msgs,'タイトルが入力されていません。');
}

if(empty($si_content))
{
    array_push($err_msgs,'内容が入力されていません。');
}
?>


<?php if( $si_title ==='' || $si_content ===''): ?>
    <div>
		<form>
			<input type="button" onclick="history.back()" value="戻る">';
		</form>
	</div>
<?php else : ?>

<div class ="sipc_main">
    <div class ="sipc_wrapper">
	    <div class="sipc_title">
		    <p>投稿内容の確認</p>
        </div>

        <div class= "sipc_middle">
            <div class="sipc_content">
                <ul class="sipc_list">
                    <li class="sipc_title1">タイトル</li>
                    <p class="sipc_box1"><?= $si_title;?></p>
                    <li class="sipc_content">内容</li>
                    <p class="sipc_box2"><?= $si_content; ?></p>
                    <li>投稿日時：<?= $si_date; ?></li>
                </ul>
            </div>
        </div>
        <form method="post" action="seller_info_post_done.php" enctype="multipart/form-data">
            <input type="hidden" name="si_title" value="<?= $si_title;?>">
            <input type="hidden" name="si_content" value="<?= $si_content;?>">
            <input type="hidden" name="si_date" value="<?= $si_date;?>">
            <input type="hidden" name="seller_id" value="<?= $seller_id;?>">

            <div class="sip_post_contents">
                <div class="tc_post2">
                    <span>上記の内容で投稿しますか？</span>
                </div>
		    <input type="button" onclick="history.back()" value="戻る" class="sipc_re">
		    <input type="submit" value="ＯＫ" class="sipc_sub">
	    </form>
    </div>
</div>

<?php endif ?>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>