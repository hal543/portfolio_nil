<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' );
require_once '../../../app/data_function/Getdata.php' ;


try
{
    $t_form= filter_input(INPUT_POST,'t_form',FILTER_SANITIZE_SPECIAL_CHARS);
    $m_form=filter_input(INPUT_POST,'m_form',FILTER_SANITIZE_SPECIAL_CHARS);
    $seller_id=filter_input(INPUT_POST,'seller_id',FILTER_SANITIZE_SPECIAL_CHARS);
    $corp=filter_input(INPUT_POST,'corp',FILTER_SANITIZE_SPECIAL_CHARS);
    $seller=filter_input(INPUT_POST,'seller',FILTER_SANITIZE_SPECIAL_CHARS);
    $mail=filter_input(INPUT_POST,'mail',FILTER_SANITIZE_SPECIAL_CHARS);

$result=sellerFormPost($t_form,$m_form,$seller_id,$corp,$seller,$mail);
$dbh=null;

}
catch (Exception $e)
{
    echo $e;
	print '申し訳御座いません。只今システム障害が発生しております。';
	exit();
}
?>

<div class="ufd_main">
    <div class="ufd_me">
        <p class="ufd_me1">お問い合わせ有難う御座います。<p>
        <p class="ufd_me2">内容を確認後、ご登録いただいたメールアドレスに返信致します。</p>
        <a href="../seller_top/seller_top.php" class="ufd_me3">TOPページに戻る</a>
    </div>
</div>


<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>