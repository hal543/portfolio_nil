<?php

require_once '../../../app/data_function/Getdata.php' ;
$infos = infoallGet();
foreach($infos as $info);
include ( dirname(_FILE_) . '/../user_parts/user_header.php' ); 
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
include ( dirname(_FILE_). '/../user_parts/user_footer.php')
?>