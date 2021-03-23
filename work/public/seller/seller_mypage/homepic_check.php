<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="user_login.html">ログイン画面へ</a>';
	exit();
}

$file=$_FILES['home_pic'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = '../../../app/seller_home_pics/';

$seller_id = $_SESSION['all']["id"];

$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir.$save_filename;

if($filesize > 2097152 || $file_err== 2){
    echo "ファイルサイズを2MB未満にしてください　<br />";
}

$allow_ext = array('jpg','jpeg','png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($file_ext),$allow_ext)){
    array_push($err_msgs,'画像ファイルを添付してください　<br />');
}

if(count($err_msgs) === 0){
    if(is_uploaded_file($tmp_path)){
        if(move_uploaded_file($tmp_path,$save_path))
        { 
        }
        else{        
            echo "ファイルが保存できませんでした";
            print '<form>';
            echo '<br>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
            exit();
        }
    }else{
    echo "ファイルが選択されていません　<br />";
    }

}else{
    foreach($err_msgs as $err_msg){
        echo $err_msg;
        echo '<br>';
    }
}

if($filesize > 2097152 || !in_array(strtolower($file_ext),$allow_ext)){
    header("Location:seller_mypage_pre");
    exit;
}else{

try
{

$dsn='mysql:dbname=projectNIL;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE sellerTable SET home_file_name=:home_file_name,home_file_path=:home_file_path WHERE id=:seller_id';
$stmt=$dbh->prepare($sql);
$stmt->bindValue(':home_file_name', $save_filename, PDO::PARAM_STR);
$stmt->bindValue(':home_file_path', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':seller_id', $seller_id, PDO::PARAM_INT);
$stmt->execute();

$dbh=null;

}
catch (Exception $e)
{
    echo $e;
    print '申し訳御座いません。只今システム障害が発生しております。';
	exit();
}

header("Location:seller_mypage_pre.php");
exit;

}

?>