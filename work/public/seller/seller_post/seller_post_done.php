<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' );
require_once '../../../app/data_function/Getdata.php' ;

try{

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
$save_filename=filter_input(INPUT_POST,'file_name',FILTER_SANITIZE_SPECIAL_CHARS);
$save_path=filter_input(INPUT_POST,'file_path',FILTER_SANITIZE_SPECIAL_CHARS);
$id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);

$result = sellerLbnPost($type,$lbn_name,$morph,$lbn_gender,$storein,$birth,$price,$ac,$wccb,$lbn_pic,$comment,$save_filename,$save_path,$id);
$dbh=null;

}
catch (Exception $e)
{
  echo $e;
  print '申し訳御座いません。只今システム障害が発生しておりますので、また後ほど再読み込みをお願い致します';
  exit();
}

?>
<div class="spd-wrapper">
<div class="spd-content">
  <span class="spd-1">投稿が完了しました！</span>
  <div>
    <a href="../seller_top/seller_top.php" class="spd-3">TOPページに戻る</a>
  </div>
</div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>