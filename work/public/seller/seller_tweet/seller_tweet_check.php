<?php 
require_once '../../../app/data_function/Getdata.php' ;

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="user_login.html">ログイン画面へ</a>';
	exit();
}
date_default_timezone_set('Asia/Tokyo');
$send_time = date('Y/m/d/H:i');
$seller_tweet= filter_input(INPUT_POST,'seller_tweet',FILTER_SANITIZE_SPECIAL_CHARS);
$seller_id= filter_input(INPUT_POST,'seller_id',FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($seller_tweet)==TRUE || $seller_tweet===""){
    header("Location:seller_tweet_top.php");
    exit;
}else{

try
{   

$result = sellerTweetPost($seller_tweet,$seller_id,$send_time);
$dbh=null;

}
catch (Exception $e)
{
    echo $e;
    print '申し訳御座いません。只今システム障害が発生しております。';
	exit();
}

header("Location:seller_tweet_top.php");
exit;

}

?>