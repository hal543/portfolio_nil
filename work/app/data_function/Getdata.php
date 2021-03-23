<?php

function dbc(){

    try {
        $host = "localhost";
        $dbname = "projectNIL";
        $user='root';
        $password='root';

        $dsn='mysql:dbname=projectNIL;host=localhost;charset=utf8';
        $pdo=new PDO($dsn,$user,$password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

        ]);
        return $pdo;
        
        }catch (PDOException $e){
        echo $e->getMessage();
        exit;
        }
}

function getLbn20Files()
{
    $sql = "SELECT * FROM lbnTable ORDER BY lbn_id DESC LIMIT 20";
    $fileData = dbc()->query($sql);
    return $fileData;
}

function userLoginCheck($user_mail,$user_pass)
{
    $sql='SELECT user_mail FROM userTable WHERE user_mail=:user_mail AND user_pass=:user_pass';
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':user_mail', $user_mail, PDO::PARAM_STR );
    $stmt->bindvalue( ':user_pass', $user_pass, PDO::PARAM_STR );
    $stmt->execute();    
    $file=$stmt->fetch(PDO::FETCH_ASSOC);
    return $file;
}

function userLoginCheck2($user_mail,$user_pass){
    $sql='SELECT * FROM userTable WHERE user_mail=:user_mail AND user_pass=:user_pass';
	$stmt = dbc()->prepare($sql);
	$stmt->bindvalue( ':user_mail', $user_mail, PDO::PARAM_STR );
    $stmt->bindvalue( ':user_pass', $user_pass, PDO::PARAM_STR );
	$stmt->execute();
    $file=$stmt->fetch(PDO::FETCH_ASSOC);
    return $file;
}

function sellerLoginCheck($mail,$pass)
{
    $sql='SELECT mail FROM sellerTable WHERE mail=:mail AND pass=:pass';
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':mail', $mail, PDO::PARAM_STR );
    $stmt->bindvalue( ':pass', $pass, PDO::PARAM_STR );
    $stmt->execute();    
    $file=$stmt->fetch(PDO::FETCH_ASSOC);
    return $file;
}

function sellerLoginCheck2($mail,$pass){
    $sql='SELECT * FROM sellerTable WHERE mail=:mail AND pass=:pass';
	$stmt = dbc()->prepare($sql);
	$stmt->bindvalue( ':mail', $mail, PDO::PARAM_STR );
    $stmt->bindvalue( ':pass', $pass, PDO::PARAM_STR );
	$stmt->execute();
    $file=$stmt->fetch(PDO::FETCH_ASSOC);
    return $file;
}

function getAllFile()
{
    $sql = "SELECT * FROM lbnTable ORDER BY lbn_id DESC";
    $stmt =dbc()->query($sql);
    $stmt->execute();
    $file=$stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getLbn10Files()
{
    $sql = "SELECT * FROM lbnTable ORDER BY lbn_id DESC LIMIT 10";
    $fileData = dbc()->query($sql);
    return $fileData;
}

function getLbnNearFiles($user_address)
{
    $sql = "SELECT * FROM lbnTable INNER JOIN sellerTable ON lbnTable.id = sellerTable.id WHERE address1=:user_address ORDER BY lbn_id DESC LIMIT 5";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':user_address', $user_address, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getLbnDetailes($lbn_id)
{
    $sql = "SELECT * FROM lbnTable WHERE lbn_id=:lbn_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':lbn_id', $lbn_id, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getLbnSellerData($lbn_id)
{
    $sql = "SELECT * FROM lbnTable INNER JOIN sellerTable ON lbnTable.id = sellerTable.id WHERE lbn_id=:lbn_id" ;
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':lbn_id', $lbn_id, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file; 
}

function getUser($user_id)
{
    $sql = "SELECT * FROM userTable WHERE user_id=:user_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':user_id', $user_id, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function searchResult($search_name)
{
    $sql = " SELECT * FROM lbnTable WHERE lbn_name LIKE '%" . $search_name. "%' ";
    $stmt = dbc()->prepare($sql);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function favMatcehGet($favLbns)
{
    $sql = " SELECT * FROM lbnTable WHERE lbn_name LIKE '%" . $favLbns . "%' ORDER BY lbn_id DESC LIMIT 10";
    $stmt = dbc()->prepare($sql);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function favMatchGet($favLbn)
{
    $sql = "SELECT * FROM lbnTable WHERE lbn_name=:favLbn ORDER BY lbn_id DESC LIMIT 5";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':favLbn', $favLbn, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function favMatchAllGet($favLbn)
{
    $sql = "SELECT * FROM lbnTable WHERE lbn_name=:favLbn ORDER BY lbn_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':favLbn', $favLbn, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function info1Get()
{
    $sql = "SELECT * FROM infoTable ORDER BY info_id DESC LIMIT 1";
    $stmt = dbc()->prepare($sql);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function infoallGet()
{
    $sql = "SELECT * FROM infoTable ORDER BY info_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getInfoId($info_id)
{
    $sql = "SELECT * FROM infoTable  WHERE info_id=:info_id" ;
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':info_id', $info_id, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file; 
}

function GetLbnCa($ca_lbn)
{
    $sql = "SELECT * FROM lbnTable WHERE type=:ca_lbn ORDER BY lbn_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':ca_lbn', $ca_lbn, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function GetAdCa($ca_ad)
{
    $sql = "SELECT * FROM lbnTable INNER JOIN sellerTable ON lbnTable.id = sellerTable.id WHERE address1=:ca_ad" ;
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':ca_ad', $ca_ad, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function tweet10Get()
{
    $sql = "SELECT seller_id,corp,prof_file_path,seller_tweet,send_time FROM tweetTable INNER JOIN sellerTable ON tweetTable.seller_id = sellerTable.id ORDER BY tweet_id DESC LIMIT 5";
    $stmt = dbc()->prepare($sql);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getUserName($user_id)
{
    $sql = "SELECT user_name FROM userTable WHERE user_id=:user_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':user_id', $user_id, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

/*=========SELLER========================*/

function GetLbnSeller($select_lbn)
{
    $sql = "SELECT * FROM lbnTable WHERE type=:select_lbn ORDER BY lbn_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':select_lbn', $select_lbn, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function GetLbnSellerAll($seller_id)
{
    $sql = "SELECT * FROM lbnTable WHERE id=:seller_id ORDER BY lbn_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_STR );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}


function GetSoldOut($sold_out)
{
    $sql = "SELECT * FROM lbnTable WHERE soldout=:sold_out ORDER BY lbn_id DESC LIMIT 20";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':sold_out', $sold_out, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function lbnDelete($lbn_id)
{
    $sql='DELETE FROM lbnTable WHERE lbn_id=:lbn_id';
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':lbn_id', $lbn_id, PDO::PARAM_INT);
    $stmt->execute();
}

function soldOutCheck($num,$lbn_id)
{
    $sql='UPDATE lbnTable SET soldout=:num WHERE lbn_id=:lbn_id';
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':num', $num, PDO::PARAM_INT);
    $stmt->bindvalue( ':lbn_id', $lbn_id, PDO::PARAM_INT);
    $stmt->execute();
}

function getSellerIdLbn($id)
{
    $sql = "SELECT * FROM lbnTable INNER JOIN sellerTable ON lbnTable.id = sellerTable.id WHERE sellerTable.id=:id ORDER BY lbn_id DESC LIMIT 10" ;
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getPickIdLbn($seller_id)
{
    $sql = "SELECT * FROM pickTable WHERE id=:seller_id ORDER BY p_id DESC LIMIT 1" ;
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function getseller($seller_id)
{
    $sql = "SELECT * FROM sellerTable WHERE id=:seller_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT );
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function sellerInfoGet($seller_id)
{
    $sql = "SELECT * FROM sellerInfoTable WHERE seller_id=:seller_id ORDER BY info_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function sellerInfo1Get($seller_id)
{
    $sql = "SELECT * FROM sellerInfoTable WHERE seller_id=:seller_id ORDER BY info_id DESC LIMIT 1";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function sellerInfo3Get($seller_id)
{
    $sql = "SELECT * FROM sellerInfoTable WHERE seller_id=:seller_id ORDER BY info_id DESC LIMIT 3";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function sellerInfoIdGet($info_id)
{
    $sql = "SELECT * FROM sellerInfoTable WHERE info_id=:info_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':info_id', $info_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function chatGet($seller_id)
{
    $sql = "SELECT * FROM userChatTable INNER JOIN sellerTable ON userChatTable.seller_id = sellerTable.id WHERE seller_id=:seller_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function tweetGet($seller_id)
{
    $sql = "SELECT * FROM tweetTable INNER JOIN sellerTable ON tweetTable.seller_id = sellerTable.id WHERE seller_id=:seller_id ORDER BY tweet_id DESC";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function tweetDelete($tweet_id)
{
    $sql='DELETE FROM tweetTable WHERE tweet_id=:tweet_id';
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':tweet_id', $tweet_id, PDO::PARAM_INT);
    $stmt->execute();
}

function chatLastGet($user_id)
{
    $sql = "SELECT * FROM userChatTable INNER JOIN sellerTable ON userChatTable.seller_id = sellerTable.id WHERE seller_id=:seller_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function homeGet($seller_id)
{
    $sql = "SELECT home_file_name, home_file_path FROM sellerTable WHERE id=:seller_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function profGet($seller_id)
{
    $sql = "SELECT prof_file_name, prof_file_path FROM sellerTable WHERE id=:seller_id";
    $stmt = dbc()->prepare($sql);
    $stmt->bindvalue( ':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetchall( PDO::FETCH_ASSOC );
    return $file;
}

function sellerInfoPost($si_title,$si_content,$si_date,$seller_id)
{
    $sql='INSERT INTO sellerInfoTable (si_title,si_content,si_date,seller_id)
    VALUES (:si_title,:si_content,:si_date,:seller_id)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':si_title', $si_title, PDO::PARAM_STR);
    $stmt->bindValue(':si_content', $si_content, PDO::PARAM_STR);
    $stmt->bindValue(':si_date', $si_date, PDO::PARAM_STR);
    $stmt->bindValue(':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->execute();
}


function sellerAdd($corp,$seller,$phone,$fax,$mail,$postnumber,$address1,$address2,$web,$pass)
{
    $sql='INSERT INTO sellerTable (corp,seller,phone,fax,mail,postnumber,address1,address2,web,pass)
    VALUES (:corp,:seller,:phone,:fax,:mail,:postnumber,:address1,:address2,:web,:pass)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':corp', $corp, PDO::PARAM_STR);
    $stmt->bindValue(':seller', $seller, PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindValue(':fax', $fax, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':postnumber', $postnumber, PDO::PARAM_STR);
    $stmt->bindValue(':address1', $address1, PDO::PARAM_STR);
    $stmt->bindValue(':address2', $address2, PDO::PARAM_STR);
    $stmt->bindValue(':web', $web, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();
}

function sellerFormPost($t_form,$m_form,$seller_id,$corp,$seller,$mail)
{
    $sql='INSERT INTO sellerFormTable (t_form,m_form,seller_id,corp,seller,seller_mail) 
    VALUES (:t_form,:m_form,:seller_id,:corp,:seller,:seller_mail)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':t_form', $t_form, PDO::PARAM_STR);
    $stmt->bindValue(':m_form', $m_form, PDO::PARAM_STR);
    $stmt->bindValue(':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->bindValue(':corp', $corp, PDO::PARAM_STR);
    $stmt->bindValue(':seller', $seller, PDO::PARAM_STR);
    $stmt->bindValue(':seller_mail', $mail, PDO::PARAM_STR);
    $stmt->execute();
}


function sellerPickPost($p_name,$p_morph,$p_storein,$p_birth,$p_price,$p_ac,$p_wccb,$p_pic,$p_comment,$p_file_name,$p_file_path,$id)
{
    $sql='INSERT INTO pickTable (p_name,p_morph,p_storein,p_birth,p_price,p_ac,p_wccb,p_pic,p_comment,p_file_name,p_file_path,id)
    VALUES (:p_name,:p_morph,:p_storein,:p_birth,:p_price,:p_ac,:p_wccb,:p_pic,:p_comment,:p_file_name,:p_file_path,:id)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':p_name', $p_name, PDO::PARAM_STR);
    $stmt->bindValue(':p_morph', $p_morph, PDO::PARAM_STR);
    $stmt->bindValue(':p_storein', $p_storein, PDO::PARAM_STR);
    $stmt->bindValue(':p_birth', $p_birth, PDO::PARAM_STR);
    $stmt->bindValue(':p_price', $p_price, PDO::PARAM_STR);
    $stmt->bindValue(':p_ac', $p_ac, PDO::PARAM_STR);
    $stmt->bindValue(':p_wccb', $p_wccb, PDO::PARAM_STR);
    $stmt->bindValue(':p_pic', $p_pic, PDO::PARAM_STR);
    $stmt->bindValue(':p_comment', $p_comment, PDO::PARAM_STR);
    $stmt->bindValue(':p_file_name', $p_file_name, PDO::PARAM_STR);
    $stmt->bindValue(':p_file_path', $p_file_path, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function sellerLbnPost($type,$lbn_name,$morph,$lbn_gender,$storein,$birth,$price,$ac,$wccb,$lbn_pic,$comment,$save_filename,$save_path,$id)
{
$sql='INSERT INTO lbnTable (type,lbn_name,morph,lbn_gender,storein,birth,price,ac,wccb,lbn_pic,comment,file_name,file_path,id)
VALUES (:type,:lbn_name,:morph,:lbn_gender,:storein,:birth,:price,:ac,:wccb,:lbn_pic,:comment,:save_filename,:save_path,:id)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->bindValue(':lbn_name', $lbn_name, PDO::PARAM_STR);
    $stmt->bindValue(':morph', $morph, PDO::PARAM_STR);
    $stmt->bindValue(':lbn_gender', $lbn_gender, PDO::PARAM_STR);
    $stmt->bindValue(':storein', $storein, PDO::PARAM_STR);
    $stmt->bindValue(':birth', $birth, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':ac', $ac, PDO::PARAM_STR);
    $stmt->bindValue(':wccb', $wccb, PDO::PARAM_STR);
    $stmt->bindValue(':lbn_pic', $lbn_pic, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindValue(':save_filename', $save_filename, PDO::PARAM_STR);
    $stmt->bindValue(':save_path', $save_path, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function sellerTweetPost($seller_tweet,$seller_id,$send_time)
{    
    $sql='INSERT INTO tweetTable (seller_tweet,seller_id,send_time) VALUES (:seller_tweet,:seller_id,:send_time)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':seller_tweet', $seller_tweet, PDO::PARAM_STR);
    $stmt->bindValue(':seller_id', $seller_id, PDO::PARAM_INT);
    $stmt->bindValue(':send_time', $send_time, PDO::PARAM_STR);
    $stmt->execute();
}
function userAdd($user_name,$user_mail,$age,$gender,$user_address,$w_lbn,$w_morph,$user_pass)
{
    $sql='INSERT INTO userTable (user_name,user_mail,age,gender,user_address,w_lbn,w_morph,user_pass)
    VALUES (:user_name,:user_mail,:age,:gender,:user_address,:w_lbn,:w_morph,:user_pass)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_mail', $user_mail, PDO::PARAM_STR);
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':user_address', $user_address, PDO::PARAM_STR);
    $stmt->bindValue(':w_lbn', $w_lbn, PDO::PARAM_STR);
    $stmt->bindValue(':w_morph', $w_morph, PDO::PARAM_STR);
    $stmt->bindValue(':user_pass', $user_pass, PDO::PARAM_INT);
    $stmt->execute();
}

function userEdit($user_name,$user_mail,$age,$gender,$user_address,$w_lbn,$w_morph,$user_pass,$user_id)
{
    $sql='UPDATE userTable SET user_name=:user_name,user_mail=:user_mail,age=:age,gender=:gender,user_address=:user_address,w_lbn=:w_lbn,w_morph=:w_morph,user_pass=:user_pass WHERE user_id=:user_id';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_mail', $user_mail, PDO::PARAM_STR);
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':user_address', $user_address, PDO::PARAM_STR);
    $stmt->bindValue(':w_lbn', $w_lbn, PDO::PARAM_STR);
    $stmt->bindValue(':w_morph', $w_morph, PDO::PARAM_STR);
    $stmt->bindValue(':user_pass', $user_pass, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
}

function userFormPost($t_form,$m_form,$user_id,$user_name,$user_mail)
{
    $sql='INSERT INTO formTable (t_form,m_form,user_id,user_name,user_mail) VALUES (:t_form,:m_form,:user_id,:user_name,:user_mail)';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':t_form', $t_form, PDO::PARAM_STR);
    $stmt->bindValue(':m_form', $m_form, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_mail', $user_mail, PDO::PARAM_STR);
    $stmt->execute();
}

function sellerEdit($id,$corp,$seller,$phone,$fax,$mail,$postnumber,$address1,$address2,$web,$pass)
{
    $sql='UPDATE sellerTable SET corp=:corp,seller=:seller,phone=:phone,fax=:fax,mail=:mail,postnumber=:postnumber,address1=:address1,address2=:address2,web=:web,pass=:pass WHERE id=:id';
    $stmt = dbc()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':corp', $corp, PDO::PARAM_STR);
    $stmt->bindValue(':seller', $seller, PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone, PDO::PARAM_INT);
    $stmt->bindValue(':fax', $fax, PDO::PARAM_INT);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':postnumber', $postnumber, PDO::PARAM_INT);
    $stmt->bindValue(':address1', $address1, PDO::PARAM_STR);
    $stmt->bindValue(':address2', $address2, PDO::PARAM_STR);
    $stmt->bindValue(':web', $web, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();
}