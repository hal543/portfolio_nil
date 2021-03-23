<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php

$file=$_FILES['lbn_pic'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = '../../../app/images/';

$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir.$save_filename;

$type= filter_input(INPUT_POST,'type',FILTER_SANITIZE_SPECIAL_CHARS);
$lbn_name= filter_input(INPUT_POST,'lbn_name',FILTER_SANITIZE_SPECIAL_CHARS);
$morph=filter_input(INPUT_POST,'morph',FILTER_SANITIZE_SPECIAL_CHARS);
$lbn_gender=filter_input(INPUT_POST,'lbn_gender',FILTER_SANITIZE_SPECIAL_CHARS);
$storein=filter_input(INPUT_POST,'storein',FILTER_SANITIZE_SPECIAL_CHARS);
$birth=filter_input(INPUT_POST,'birth',FILTER_SANITIZE_SPECIAL_CHARS);
$price=filter_input(INPUT_POST,'price',FILTER_SANITIZE_SPECIAL_CHARS);
$ac=filter_input(INPUT_POST,'ac',FILTER_SANITIZE_SPECIAL_CHARS);
$wccb=filter_input(INPUT_POST,'wccb',FILTER_SANITIZE_SPECIAL_CHARS);
$comment=filter_input(INPUT_POST,'comment',FILTER_SANITIZE_SPECIAL_CHARS);
$id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($type))
{
    array_push($err_msgs,'分類が入力されていません。');
}


if(empty($lbn_name))
{
    array_push($err_msgs,'生体が入力されていません。');
}

if(empty($morph))
{
    array_push($err_msgs,'モルフが入力されていません。<br />');
}

if(empty($lbn_gender))
{
    array_push($err_msgs,'性別が入力されていません。<br />');
}

if(preg_match('/\A[0-9]+\z/',$price)==0)
{
	print '価格をきちんと入力してください。<br />';
}

if($filesize > 1048576 || $file_err== 2){
    echo "ファイルサイズを１MB未満にしてください　<br />";
}

$allow_ext = array('jpg','jpeg','png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($file_ext),$allow_ext)){
    array_push($err_msgs,'画像ファイルを添付してください　<br />');
}

if(count($err_msgs) === 0){
    if(is_uploaded_file($tmp_path)){
        if(move_uploaded_file($tmp_path,$save_path))
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
    }else{
    echo "ファイルが選択されていません　<br />";
    }

}else{
    foreach($err_msgs as $err_msg){
        echo $err_msg;
        echo '<br>';
    }
}

?>


<?php if($type =="" || $lbn_name ==='' || $morph==='' || $lbn_gender=='' ||$filesize > 1048576 || preg_match('/\A[0-9]+\z/',$price)==0 || $lbn_pic==='' || !in_array(strtolower($file_ext),$allow_ext)): ?>
    <div>
		<form>
			<input type="button" onclick="history.back()" value="戻る">';
		</form>
	</div>
<?php else : ?>

<div class ="tc_main">
	<div class="tc_post">
		<p>投稿内容の確認</p>
    </div>

<div class= "tc_middle">
    <div class="tc_left">
	<img src="<?=$save_path?>" class="tc_lbnpic">
    </div> 
    <div class="tc_right">
        <ul class="tc_right-list">
            <li>分類：<?= $type;?></li>
            <li>生体名：<?= $lbn_name;?></li>
            <li>モルフ:<?= $morph; ?></li>
            <li>入店日：<?= $storein; ?></li>
            <li>誕生日：<?= $birth; ?></li>
            <li>価格：<?= $price; ?></li>
            <li>慣れ度：<?= $ac; ?></li>
            <li>WC(野生)／CB(繁殖)：<?= $wccb; ?></li>
            <li>コメント：<?= $comment; ?></li>
        </ul>
	</div>
</div>
	<form method="post" action="seller_post_done.php" enctype="multipart/form-data">
		<input type="hidden" name="type" value="<?= $type;?>">
		<input type="hidden" name="lbn_name" value="<?= $lbn_name;?>">
		<input type="hidden" name="morph" value="<?= $morph;?>">
		<input type="hidden" name="lbn_gender" value="<?= $lbn_gender;?>">
		<input type="hidden" name="storein" value="<?= $storein;?>">
		<input type="hidden" name="birth" value="<?= $birth;?>">
		<input type="hidden" name="price" value="<?= $price;?>">
		<input type="hidden" name="ac" value="<?= $ac;?>">
		<input type="hidden" name="wccb" value="<?= $wccb;?>">
		<input type="hidden" name="lbn_pic" value="<?= $lbn_pic['lbn_name']?>">
		<input type="hidden" name="comment" value="<?= $comment;?>">
		<input type="hidden" name="file_name" value="<?= $save_filename;?>">
		<input type="hidden" name="file_path" value="<?= $save_path;?>">
		<input type="hidden" name="id" value="<?= $id;?>">

<div class="tc_post_contents">
	<div class="tc_post2">
		<span>上記の内容で投稿しますか？</span>
    </div>
		<input type="button" onclick="history.back()" value="戻る" class="tc_post3">
		<input type="submit" value="ＯＫ" class="tc_post4">
	</form>
</div>

<?php endif ?>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>