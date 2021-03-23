<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' ); 
require_once '../../../app/data_function/Getdata.php'  ;

try
{

    $user_id=($_SESSION['user_all']["user_id"]);

    $user_name=$_POST['user_name'];
    $user_mail=$_POST['user_mail'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $user_address=$_POST['user_address'];
    $w_lbn=$_POST['w_lbn'];
    $w_morph=$_POST['w_morph'];
    $user_pass=$_POST['user_pass'];
    
    $user_name=htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8');
    $user_mail=htmlspecialchars($user_mail, ENT_QUOTES, 'UTF-8');
    $age=htmlspecialchars($age, ENT_QUOTES, 'UTF-8');
    $gender=htmlspecialchars($gender, ENT_QUOTES, 'UTF-8');
    $user_address=htmlspecialchars($user_address, ENT_QUOTES, 'UTF-8');
    $w_lbn=htmlspecialchars($w_lbn, ENT_QUOTES, 'UTF-8');
    $w_morph=htmlspecialchars($w_morph, ENT_QUOTES, 'UTF-8');
    $user_pass=htmlspecialchars($user_pass, ENT_QUOTES, 'UTF-8');

$result = userEdit($user_name,$user_mail,$age,$gender,$user_address,$w_lbn,$w_morph,$user_pass,$user_id);
$dbh=null;

}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
?>

<div class="ued-content">
    <p class="ued-1">プロフィール修正が完了しました。</p>
    <a href="../user_top/user_top.php" class="ued-2"> TOPページに戻る</a>
</div>

<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>