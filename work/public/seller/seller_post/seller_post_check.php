<?php include ( dirname(__FILE__) . 'seller_parts/seller_header.php' ); ?>

<?php

$lbn_name=$_POST['lbn_name'];
$morph=$_POST['morph'];
$storein=$_POST['storein'];
$birth=$_POST['birth'];
$price=$_POST['price'];
$ac=$_POST['ac'];
$wccb=$_POST['wccb'];
$lbn_pic=$_FILES['lbn_pic'];
$comment=$_POST['comment'];
$id=$_POST['id'];

$lbn_name=htmlspecialchars($lbn_name, ENT_QUOTES, 'UTF-8');
$morph=htmlspecialchars($morph, ENT_QUOTES, 'UTF-8');
$storein=htmlspecialchars($storein, ENT_QUOTES, 'UTF-8');
$birth=htmlspecialchars($birth, ENT_QUOTES, 'UTF-8');
$price=htmlspecialchars($price, ENT_QUOTES, 'UTF-8');
$ac=htmlspecialchars($ac, ENT_QUOTES, 'UTF-8');
$wccb=htmlspecialchars($wccb, ENT_QUOTES, 'UTF-8');
$comment=htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
$id=htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

if($lbn_name=='')
{
	print '生体が入力されていません。<br />';
}

if($morph=='')
{
	print 'モルフが入力されていません。<br />';
}

if(preg_match('/\A[0-9]+\z/',$price)==0)
{
	print '価格をきちんと入力してください。<br />';
}

if($lbn_pic=='')
{
	print '写真が選択されていません。<br />';

}elseif($lbn_pic['size']>2000000)
{
	print '画像が大き過ぎます';
}
else{
	move_uploaded_file($_FILES['lbn_pic']['tmp_name'],'./lbn_pic/'.$lbn_pic);
}


if($lbn_name=='' || $morph=='' || preg_match('/\A[0-9]+\z/',$price)==0 || $lbn_pic=='' || $lbn_pic['size']>2000000)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{

echo '生体名：';
echo $lbn_name.'<br />' ;

echo 'モルフ：';
echo $morph.'<br />' ;

if(!$storein==''){
	echo '入店日：';
	echo $storein.'<br />' ;
}

if(!$birth==''){
	echo '誕生日：';
	echo $birth.'<br />' ;
}

echo '価格：';
echo $price.'<br />' ;

if(!$ac==''){
	echo '慣れ度：';
	echo $ac.'<br />' ;
}

echo 'WC／CB：';
echo $wccb.'<br />' ;

echo '<img src="./lbnPic/'.$lbn_pic['lbn_pic'].'">'.'<br />' ;

echo 'コメント：';
echo $comment.'<br />';

	print '上記の生体を投稿します。<br />';
	print '<form method="post" action="seller_post_done.php" enctype="multipart/form-data">';
	print '<input type="hidden" name="lbn_name" value="'.$lbn_name.'">';
	print '<input type="hidden" name="morph" value="'.$morph.'">';
	print '<input type="hidden" name="storein" value="'.$storein.'">';
	print '<input type="hidden" name="birth" value="'.$birth.'">';
	print '<input type="hidden" name="price" value="'.$price.'">';
	print '<input type="hidden" name="ac" value="'.$ac.'">';
	print '<input type="hidden" name="wccb" value="'.$wccb.'">';
	print '<input type="hidden" name="lbn_pic" value="'.$lbn_pic['lbn_name'].'">';
	print '<input type="hidden" name="comment" value="'.$comment.'">';
	print '<input type="hidden" name="id" value="'.$id.'">';

	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>