<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_out_header.php' ); ?>

<div class="main_log1">
	<div class="main_log2">
		<p class="log">ログアウトしました</p>
		<p class="log2"><a href='../seller_log/seller_login.php'>ログインページに戻る</a></p>
	</div>
</div>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_out_footer.php' ); ?>

