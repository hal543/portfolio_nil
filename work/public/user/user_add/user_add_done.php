<?php require_once '../../../app/data_function/Getdata.php'  ;?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザー</title>
  <link rel="stylesheet" href="../../css/public.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<div class="header">
    <div class="header-container">
      	<div class="header-left">
        	<a href="user_top.php"><img src="../../pic/nil_logo.jpeg"></a>
      	</div>
      	<div class="header-right">
		</div>
  	</div>
</div>
 <body>

<?php

try{ 

$user_name= filter_input(INPUT_POST,'user_name',FILTER_SANITIZE_SPECIAL_CHARS);
$user_mail= filter_input(INPUT_POST,'user_mail',FILTER_SANITIZE_SPECIAL_CHARS);
$age= filter_input(INPUT_POST,'age',FILTER_SANITIZE_SPECIAL_CHARS);
$gender= filter_input(INPUT_POST,'gender',FILTER_SANITIZE_SPECIAL_CHARS);
$user_address= filter_input(INPUT_POST,'user_address',FILTER_SANITIZE_SPECIAL_CHARS);
$w_lbn= filter_input(INPUT_POST,'w_lbn',FILTER_SANITIZE_SPECIAL_CHARS);
$w_morph= filter_input(INPUT_POST,'w_morph',FILTER_SANITIZE_SPECIAL_CHARS);
$user_pass= filter_input(INPUT_POST,'user_pass',FILTER_SANITIZE_SPECIAL_CHARS);


$result = userAdd($user_name,$user_mail,$age,$gender,$user_address,$w_lbn,$w_morph,$user_pass);
$dbh=null;
}
catch (Exception $e)
{
  echo $e->getMessage();
  exit();
}

?>

<div class="uad_main">
  <div class="uad_me">
      <p class="uad_me1">Welcome!</p>
      <p class="uad_me2"><?= $user_name ?>さんの登録が完了しました！</p>
      <a href="../user_log/user_login.php">ログイン画面へ</a>
  </div>
</div>

<div class="footer">
    <div class="footer-contents">

      <ul class="footer-menu">
      </ul>
    </div>

  <div class="footer-img">
    <p>© All rights reserved by NIL.</p>
  </div>

 　　<script src="script.js"></script>
  </body>
 </html>