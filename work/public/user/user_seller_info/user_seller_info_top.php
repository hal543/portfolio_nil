<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' ); ?>

<?php require_once '../../../app/data_function/Getdata.php' ;

$sellerId = $_GET['seller_id'];

$sellerInfos = sellerInfoGet($sellerId);
foreach($sellerInfos as $sellerInfo){};

?>

<div class="ui_wrapper">
    <div class="ui_main">
        <p class="ui_title1">お知らせ</p>
        <table class="ui_table">
            <?php foreach($sellerInfos as $sellerInfo): ?>
                <tr class="ui_tr">
                    <th class="ui_th"><a href ="user_seller_info_detail.php?info_id=<?="{$sellerInfo['info_id']}"; ?>"><?= "{$sellerInfo['si_date']}"; ?></a></th>
                    <td class="ui_td"><a href ="user_seller_info_detail.php?info_id=<?="{$sellerInfo['info_id']}"; ?>"><?= "{$sellerInfo['si_title']}"; ?></a></th>
                </tr>
            <?php endforeach?>
        </table>
    </div>
</div>


<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>