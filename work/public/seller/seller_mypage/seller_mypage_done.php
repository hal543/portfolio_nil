<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php

try{

$id=($_SESSION['all']["id"]);

$corp= filter_input(INPUT_POST,'corp',FILTER_SANITIZE_SPECIAL_CHARS);
$phone=filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
$postnumber=filter_input(INPUT_POST,'postnumber',FILTER_SANITIZE_SPECIAL_CHARS);
$address1=filter_input(INPUT_POST,'address1',FILTER_SANITIZE_SPECIAL_CHARS);
$address2=filter_input(INPUT_POST,'address2',FILTER_SANITIZE_SPECIAL_CHARS);
$web=filter_input(INPUT_POST,'web',FILTER_SANITIZE_SPECIAL_CHARS);
$business_day=filter_input(INPUT_POST,'business_day',FILTER_SANITIZE_SPECIAL_CHARS);
$business_time=filter_input(INPUT_POST,'business_time',FILTER_SANITIZE_SPECIAL_CHARS);
$mp_comment=filter_input(INPUT_POST,'mp_comment',FILTER_SANITIZE_SPECIAL_CHARS);
$seller_prof_save_filename=$_POST['seller_prof_file_name'];
$seller_prof_save_path=$_POST['seller_prof_file_path'];


$dsn='mysql:dbname=projectNIL;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE sellerTable SET corp=:corp,phone=:phone,postnumber=:postnumber,address1=:address1,address2=:address2,web=:web,business_day=:business_day,business_time=:business_time,mp_comment=:mp_comment,prof_file_name=:prof_file_name,prof_file_path=:prof_file_path WHERE id=:id';
$stmt=$dbh->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':corp', $corp, PDO::PARAM_STR);
$stmt->bindValue(':phone', $phone, PDO::PARAM_INT);
$stmt->bindValue(':postnumber', $postnumber, PDO::PARAM_INT);
$stmt->bindValue(':address1', $address1, PDO::PARAM_STR);
$stmt->bindValue(':address2', $address2, PDO::PARAM_STR);
$stmt->bindValue(':web', $web, PDO::PARAM_STR);
$stmt->bindValue(':business_day', $business_day, PDO::PARAM_STR);
$stmt->bindValue(':business_time', $business_time, PDO::PARAM_STR);
$stmt->bindValue(':mp_comment', $mp_comment, PDO::PARAM_STR);
$stmt->bindValue(':prof_file_name', $seller_prof_save_filename, PDO::PARAM_STR);
$stmt->bindValue(':prof_file_path', $seller_prof_save_path, PDO::PARAM_STR);
$stmt->execute();

$dbh=null;

}
catch (Exception $e)
{
    echo $e;
  print '申し訳御座いません。只今システム障害が発生しておりますので、また後ほど再読み込みをお願い致します';
  exit();
}

?>

<div class="smd-wrapper">
    <div class="smd-me">
    <p>編集が完了しました。</p>
    <a href="seller_mypage_pre.php">プレビュー画面に戻る。</a>
  </div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>