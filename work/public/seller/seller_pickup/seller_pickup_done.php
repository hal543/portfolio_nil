<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' );
require_once '../../../app/data_function/Getdata.php' ;

try{

$p_name= filter_input(INPUT_POST,'lbn_name',FILTER_SANITIZE_SPECIAL_CHARS);
$p_morph=filter_input(INPUT_POST,'morph',FILTER_SANITIZE_SPECIAL_CHARS);
$p_storein=filter_input(INPUT_POST,'storein',FILTER_SANITIZE_SPECIAL_CHARS);
$p_birth=filter_input(INPUT_POST,'birth',FILTER_SANITIZE_SPECIAL_CHARS);
$p_price=filter_input(INPUT_POST,'price',FILTER_SANITIZE_SPECIAL_CHARS);
$p_ac=filter_input(INPUT_POST,'ac',FILTER_SANITIZE_SPECIAL_CHARS);
$p_wccb=filter_input(INPUT_POST,'wccb',FILTER_SANITIZE_SPECIAL_CHARS);
$p_comment=filter_input(INPUT_POST,'comment',FILTER_SANITIZE_SPECIAL_CHARS);
$p_file_name=filter_input(INPUT_POST,'file_name',FILTER_SANITIZE_SPECIAL_CHARS);
$p_file_path=filter_input(INPUT_POST,'file_path',FILTER_SANITIZE_SPECIAL_CHARS);
$id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);

$result = sellerPickPost($p_name,$p_morph,$p_storein,$p_birth,$p_price,$p_ac,$p_wccb,$p_pic,$p_comment,$p_file_name,$p_file_path,$id);
$dbh=null;

}
catch (Exception $e)
{
  print '申し訳御座いません。只今システム障害が発生しておりますので、また後ほど再読み込みをお願い致します';
  exit();
}

?>

<div class="spd-wrapper">
<div class="spd-content">
  <span class="spd-2">投稿が完了しました！</span>
  <div>
    <a href="../seller_top/seller_top.php" class="spd-3">TOPページに戻る</a>
  </div>
</div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>