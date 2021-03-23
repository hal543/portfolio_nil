<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' );
require_once '../../../app/data_function/Getdata.php';

try
{
    $t_form= filter_input(INPUT_POST,'t_form',FILTER_SANITIZE_SPECIAL_CHARS);
    $m_form=filter_input(INPUT_POST,'m_form',FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id=filter_input(INPUT_POST,'user_id',FILTER_SANITIZE_SPECIAL_CHARS);
    $user_name=filter_input(INPUT_POST,'user_name',FILTER_SANITIZE_SPECIAL_CHARS);
    $user_mail=filter_input(INPUT_POST,'user_mail',FILTER_SANITIZE_SPECIAL_CHARS);
  
$result = userFormPost($t_form,$m_form,$user_id,$user_name,$user_mail);
$dbh=null;
}
catch (Exception $e)
{
	print '申し訳御座いません。只今システム障害が発生しております。';
	exit();
}
?>

<div class="ufd_main">
    <div class="ufd_me">
        <p class="ufd_me1">お問い合わせ有難う御座います。<p>
        <p class="ufd_me2">内容を確認後、ご登録いただいたメールアドレスに返信致します。</p>
        <a href="../user_top/user_top.php" class="ufd_me3">TOPページに戻る</a>
    </div>
</div>


<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>