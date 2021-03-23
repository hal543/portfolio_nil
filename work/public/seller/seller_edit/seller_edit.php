<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>
<?php

try
{

$dsn='mysql:dbname=projectNIL;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT * FROM sellerTable WHERE id=:id';
$stmt=$dbh->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$id=$rec['id'];

($_SESSION['all']["corp"]);



$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<div class="sp-main">
    <div class=sp-title>
        <p class="sp-title1">基礎情報修正</p>
        <p class="sp-title2">内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
    </div>

<form method="post" action="seller_edit_check.php">
<table>
    <tr>
        <th>法人名/屋号<span>※必須</span></th>
        <td><input name="corp" type="text" value="<?php print ($_SESSION['all']["corp"]); ?>" required></td>
    </tr>

    <tr>
        <th>担当者名<span>※必須</span></th>
        <td><input name="seller" type="text" value="<?php print ($_SESSION['all']["seller"]); ?>" required></td>
    </tr>

    <tr>
        <th>電話番号 -（ハイフン）は不要です</th>
        <td><input name="phone" type="tel" value="<?php print ($_SESSION['all']["phone"]); ?>"></td>
    </tr>

    <tr>
        <th>FAX番号</th>
        <td><input name="fax" type="text" value="<?php print ($_SESSION['all']["fax"]); ?>"></td>
    </tr>


    <tr>
        <th>メールアドレス<span>※必須</span></th>
        <td><input name="mail" type="text" value="<?php print ($_SESSION['all']["mail"]); ?>" required></td>
    </tr>


    <tr>
        <th>郵便番号  -（ハイフン）は不要です</th>
        <td><input name="postnumber" type="text" value="<?php print ($_SESSION['all']["postnumber"]); ?>"></td>
    </tr>


    <tr>
        <th>住所（都道府県）</th>
        <td><input name="address1" type="text" value="<?php print ($_SESSION['all']["address1"]); ?>"></td>
    </tr>

    <tr>
        <th>住所（市町村）</th>
        <td><input name="address2" type="text" value="<?php print ($_SESSION['all']["address2"]); ?>"></td>
    </tr>


    <tr>
        <th>WEB</th>
        <td><input name="web" type="text" pvalue="<?php print ($_SESSION['all']["web"]); ?>"></td>
    </tr>

    <tr>
        <th>パスワード<span>※必須</span></th>
        <td><input name="pass" type="password" placeholder="" required></td>
    </tr>

    <tr>
        <th>もう一度パスワードを入力してください<span>※必須</span></th>
        <td><input name="passag" type="password" placeholder="" required></td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="reset" value="リセッﾄ" class="se-re">
            <input type="submit" value="送信" class="se-sub">
        </td>
    </tr>
</table>
</form>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>      