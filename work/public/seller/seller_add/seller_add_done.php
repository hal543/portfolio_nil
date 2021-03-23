<?php include ( dirname(__FILE__) . '/../seller_parts/seller_out_header.php' ); 
require_once '../../../app/data_function/Getdata.php' ;

try{ 

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

$result=sellerAdd($corp,$seller,$phone,$fax,$mail,$postnumber,$address1,$address2,$web,$pass);
$dbh=null;

}
catch (Exception $e)
{
  echo $e->getMessage();
  exit();
}

?>

<div class="sad_main">
  <div class="sad_me">
      <p class="sad_me2">登録が完了しました。</p>
      <a href="../seller_log/seller_login.php" class="sad_me2">ログイン画面へ</a>
  </div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>