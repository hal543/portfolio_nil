<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' );
require_once '../../../app/data_function/Getdata.php' ;

try{


$si_title= filter_input(INPUT_POST,'si_title',FILTER_SANITIZE_SPECIAL_CHARS);
$si_content=filter_input(INPUT_POST,'si_content',FILTER_SANITIZE_SPECIAL_CHARS);
$si_date=filter_input(INPUT_POST,'si_date',FILTER_SANITIZE_SPECIAL_CHARS);
$seller_id=filter_input(INPUT_POST,'seller_id',FILTER_SANITIZE_SPECIAL_CHARS);

$result=sellerInfoPost($si_title,$si_content,$si_date,$seller_id);
$dbh=null;

}
catch (Exception $e)
{
  print '申し訳御座いません。只今システム障害が発生しておりますので、また後ほど再読み込みをお願い致します';
  exit();
}

?>

<div class="spd-content">
  <span class="spd-1"><?='お知らせを投稿しました。';?></span>
  <div>
    <a href="../seller_top/seller_top.php" class="spd-2">TOPページに戻る</a>
  </div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>