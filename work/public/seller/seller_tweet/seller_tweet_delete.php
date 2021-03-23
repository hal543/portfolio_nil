<?php

require_once '../../../app/data_function/Getdata.php' ;

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="seller_login.html">ログイン画面へ</a>';
	exit();
}

$tweet_id=filter_input(INPUT_POST,'tweet_id',FILTER_SANITIZE_SPECIAL_CHARS);
$result=tweetDelete($tweet_id);

header("Location:seller_tweet_top.php");
exit;

?>