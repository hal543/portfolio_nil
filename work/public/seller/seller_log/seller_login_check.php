<?php include ( dirname(__FILE__) . '/../seller_parts/seller_out_header.php' ); ?>
<?php require_once '../../../app/data_function/Getdata.php' ;


$mail= filter_input(INPUT_POST,'mail',FILTER_SANITIZE_SPECIAL_CHARS);
$pass= filter_input(INPUT_POST,'pass',FILTER_SANITIZE_SPECIAL_CHARS);
$pass=md5($pass);

$rec=sellerLoginCheck($mail,$pass);
?>

<?php if($rec==false) :?>
	<div class="ulc_wrapper">
		<div class="ulc_content">
			<p class="ulc_p">メールアドレスかパスワードが間違っています。</p>
			<a href="seller_login.php" class="ulc_button"> 戻る</a>
		</div>
	</div>
<?php else: ?>
<?php
	$all=sellerLoginCheck2($mail,$pass);
	session_start();
	$_SESSION['login']=1;
	$_SESSION['all']=$all;
	$_SESSION['pass']=$rec['pass'];
	header('Location:../seller_top/seller_top.php');
	exit();
?>

<?php endif?>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>