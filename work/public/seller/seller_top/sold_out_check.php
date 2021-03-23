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

$lbn_id=filter_input(INPUT_POST,'lbn_id',FILTER_SANITIZE_SPECIAL_CHARS);
$num=filter_input(INPUT_POST,'num',FILTER_SANITIZE_SPECIAL_CHARS);

$result=soldOutCheck($num,$lbn_id);

header("Location:seller_top.php");
exit;

?>