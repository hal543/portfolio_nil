<?php
include ( dirname(_FILE_) . '/seller_parts/seller_header.php' ); 
require_once '../../app/Getdata.php' ;

$sellerId = $_SESSION['all']["id"];
$sellerInfos = sellerInfoGet($sellerId);
var_dump($sellerInfos);

?>

<div class="ui_wrapper">
    <div class="ui_main">
        <p class="ui_title1">お知らせ</p>
        <table class="ui_table">
            <?php foreach($infos as $info): ?>
                <tr class="ui_tr">
                    <th class="ui_th"><a href ="user_info_detail.php?info_id=<?="{$info['info_id']}"; ?>"><?= "{$info['date']}"; ?></a></th>
                    <td class="ui_td"><a href ="user_info_detail.php?info_id=<?="{$info['info_id']}"; ?>"><?= "{$info['info_title']}"; ?></a></th>
                </tr>
            <?php endforeach?>
        </table>
    </div>
</div>




<?php 
include ( dirname(_FILE_). '/seller_parts/seller_footer.php')
?>