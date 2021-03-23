<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php

require_once  '../../../app/data_function/Getdata.php' ;
$info_id = $_GET['info_id'];
$sellerInfos =  sellerInfoIdGet($info_id);
foreach($sellerInfos as $sellerInfo);


include ( dirname(_FILE_) . '/user_parts/user_header.php' ); 
?>

<div class="uid_wrapper">
    <div class="uid_main">
        <div>
            <p class="uid_title1"><?=$sellerInfo['si_title'] ?></p>
            <p class="uid_title2"><?=$sellerInfo['si_date'] ?></p>
        </div>
        <div>
            <?=$sellerInfo['si_content'] ?>
        </div>
    </div>
</div>


<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>