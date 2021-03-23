<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php

$file=$_FILES['prof_pic'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = '../../../app/images/';

$seller_prof_save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$seller_prof_save_path = $upload_dir.$seller_prof_save_filename;

$corp= filter_input(INPUT_POST,'corp',FILTER_SANITIZE_SPECIAL_CHARS);
$phone=filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
$postnumber=filter_input(INPUT_POST,'postnumber',FILTER_SANITIZE_SPECIAL_CHARS);
$address1=filter_input(INPUT_POST,'address1',FILTER_SANITIZE_SPECIAL_CHARS);
$address2=filter_input(INPUT_POST,'address2',FILTER_SANITIZE_SPECIAL_CHARS);
$web=filter_input(INPUT_POST,'web',FILTER_SANITIZE_SPECIAL_CHARS);
$business_day=filter_input(INPUT_POST,'business_day',FILTER_SANITIZE_SPECIAL_CHARS);
$business_time=filter_input(INPUT_POST,'business_time',FILTER_SANITIZE_SPECIAL_CHARS);
$mp_comment=filter_input(INPUT_POST,'mp_comment',FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($corp))
{
    array_push($err_msgs,'企業名/屋号が入力されていません。');
}

if($filesize > 1048576 || $file_err== 2){
    echo "ファイルサイズを１MB未満にしてください　<br />";
}

$allow_ext = array('jpg','jpeg','png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(count($err_msgs) === 0){
    if(is_uploaded_file($tmp_path)){
        if(move_uploaded_file($tmp_path,$seller_prof_save_path))
        { 
        }
        else{        
            echo "ファイルが保存できませんでした";
            print '<form>';
            echo '<br>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
            exit();
        }
    }}



?>


<?php if( $corp ==='' || $filesize > 1048576 ): ?>
    <div>
		<form>
			<input type="button" onclick="history.back()" value="戻る">';
		</form>
	</div>
<?php else : ?>

<div class ="smc_main">
    <div class ="smc_wrapper">
	    <div class="smc_title">
		    <p>編集内容の確認</p>
        </div>

        <div class= "smc_middle">
            <div class="smc_content">
                <img src="<?=$seller_prof_save_path?>" class="smc_prof_pic">
            </div> 
            <div class="smc_content">
                <ul class="smc_list">
                    <li>法人名/屋号：<?= $corp;?></li>
                    <li>電話番号:<?= $phone; ?></li>
                    <li>郵便番号：<?= $postnumber; ?></li>
                    <li>住所（都道府県）：<?= $address1; ?></li>
                    <li>住所（市町村）：<?= $address2; ?></li>
                    <li>WEB：<?= $web; ?></li>
                    <li>営業日：<?= $business_day; ?></li>
                    <li>営業時間：<?= $business_time; ?></li>
                    <li>自己紹介：<?= $mp_comment; ?></li>
                </ul>
            </div>
        </div>
        <form method="post" action="seller_mypage_done.php" enctype="multipart/form-data">
            <input type="hidden" name="corp" value="<?= $corp;?>">
            <input type="hidden" name="phone" value="<?= $phone;?>">
            <input type="hidden" name="postnumber" value="<?= $postnumber;?>">
            <input type="hidden" name="address1" value="<?= $address1;?>">
            <input type="hidden" name="address2" value="<?= $address2;?>">
            <input type="hidden" name="web" value="<?= $web;?>">
            <input type="hidden" name="business_day" value="<?= $business_day;?>">
            <input type="hidden" name="business_time" value="<?= $business_time;?>">
            <input type="hidden" name="mp_comment" value="<?= $mp_comment;?>">
            <input type="hidden" name="seller_prof_file_name" value="<?= $seller_prof_save_filename;?>">
            <input type="hidden" name="seller_prof_file_path" value="<?= $seller_prof_save_path;?>">
            <input type="hidden" name="prof_pic" value="<?= $prof_pic['corp']?>">

            <div class="tc_post_contents">
                <div class="tc_post2">
                    <span>上記の内容で投稿しますか？</span>
                </div>
		    <input type="button" onclick="history.back()" value="戻る" class="smc_post1">
		    <input type="submit" value="ＯＫ" class="smc_post2">
	    </form>
    </div>
</div>

<?php endif ?>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>