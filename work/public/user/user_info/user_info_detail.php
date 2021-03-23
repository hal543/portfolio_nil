<?php
require_once '../../../app/data_function/Getdata.php' ;
$info_id = $_GET['info_id'];
$infos =  getInfoId($info_id);
foreach($infos as $info);
include ( dirname(_FILE_) . '/../user_parts/user_header.php' ); 
?>

<div class="uid_wrapper">
    <div class="uid_main">
        <div>
            <p class="uid_title1"><?=$info['info_title'] ?></p>
            <p class="uid_title2"><?=$info['date'] ?></p>
        </div>
        <div>
            <?=$info['info_contents'] ?>
        </div>
    </div>
</div>

<?php 
include ( dirname(_FILE_). '/../user_parts/user_footer.php')?>