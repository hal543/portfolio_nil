<?php include ( dirname(_FILE_) . './seller_parts/seller_header.php' ); ?>

<?php
require_once '../../../app/data_function/Getdata.php' ;

$lbn_id = filter_input(INPUT_GET,'lbn_id',FILTER_SANITIZE_SPECIAL_CHARS);
$file = getLbnSellerData($lbn_id);
foreach($file as $file){}

?>

<div class= middle>
    <div class="left">
        <img src="<?php echo $file['file_path']; ?>" ,alt= "" class="lbnpic">
    </div>
    <div class="right">
        <div>
        <ul class="right-list">
            <li>店舗名：<?= $file['corp']; ?>&nbsp;(<?= $file['address1']; ?></li>
            <li>生体名：<?= $file['lbn_name']; ?></li>
            <li>モルフ:<?= $file['morph']; ?></li>
            <li>入店日：<?= $file['storein']; ?></li>
            <li>誕生日：<?= $file['birth']; ?></li>
            <li>価格：<?= $file['price']; ?></li>
            <li>慣れ度：<?= $file['ac']; ?></li>
            <li>WC(野生)／CB(繁殖)：<?= $file['wccb']; ?></li>
            <li>コメント：<?= $file['comment']; ?></li>
        </ul>
    </div>
</div>



<?php 
include ( dirname(_FILE_). '/../seller_parts/seller_footer.php')?>
