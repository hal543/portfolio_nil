<?php include ( dirname(__FILE__) . '/../user_parts/user_out_header.php' ); 
require_once '../../../app/data_function/Getdata.php' ;

$user_mail= filter_input(INPUT_POST,'user_mail',FILTER_SANITIZE_SPECIAL_CHARS);
$user_pass= filter_input(INPUT_POST,'user_pass',FILTER_SANITIZE_SPECIAL_CHARS);
$user_pass=md5($user_pass);


$rec=userLoginCheck($user_mail,$user_pass);

?>

<?php if($rec==false) :?>
	<div class="ulc_wrapper">
		<div class="ulc_content">
			<p class="ulc_p">メールアドレスかパスワードが間違っています。</p>
			<a href="user_login.php" class="ulc_button"> 戻る</a>
		</div>
	</div>

<?php else :?>
	<?php
	$user_all=userLoginCheck2($user_mail,$user_pass);
	session_start();
	$_SESSION['login']=1;
	$_SESSION['user_all']=$user_all;
	$_SESSION['user_pass']=$rec['user_pass'];
	header('Location:../user_top/user_top.php');
	exit();
	?>

<?php endif ?>

<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); 