<?php include ( dirname(__FILE__) . '/../user_parts/user_top_header.php' ); ?>

<?php
$ca_lbn=$_GET['name'];
$ca_lbn=htmlspecialchars("$ca_lbn", ENT_QUOTES, 'UTF-8');

define('MAX','20');
$files = GetLbnCa($ca_lbn);
$files_num = count($files);
$max_page = ceil($files_num / MAX);
 
if(!isset($_GET['page_id'])){
    $now = 1;
}else{
    $now = $_GET['page_id'];
}
 
$start_no = ($now - 1) * MAX;
$disp_data = array_slice($files, $start_no, MAX, true);

?>

<div class="lbn_main">
	<div class="fav_lbn">
    <h2><?= ($ca_lbn);?>カテゴリーの検索結果</h2>
        <div class="showlbn1">
            <?php foreach($disp_data as $ca_lbn): ?>
                            <?php if ($ca_lbn['soldout'] == '1') :?>
                                <a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$ca_lbn['lbn_id']}"; ?>">             
                                    <div class="sold_out_ust-show">
                                    <div class="sold_out_border">
                                        <img src ="<?= "{$ca_lbn['file_path']}"; ?>" ,alt= "" class="sold_out_ust-showpic">
                                    </div>
                                    </div>
                            </div>
                                </a>
							<?php else: ?>
							        <a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$ca_lbn['lbn_id']}"; ?>">
                                        <div class="ust-show">
                                            <img src ="<?= "{$ca_lbn['file_path']}"; ?>" ,alt= "" class="ust-showpic">
                                        </div>
                                    </a>
                            <?php endif ?>
            <?php endforeach?>
        </div>
        </div>
        <div>
            <p class="uc_all">全件数&ensp;:&ensp;<?=$files_num ?>件</p>
        </div>
        
        <div class="uca_page">
            <?php if($now > 1){ // リンクをつけるかの判定
                echo '<a href="user_category_ad.php?name='.$ca_ad['address1'].'&page_id='.($now - 1).'">前へ</a>'.'　';
            } else {
                echo '前へ'.'　';
            }
            
            for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
                if ($i == $now) { // 現在表示中のページ数の場合はリンクを貼らない
                    echo $now. ' '; 
                } else {
                    echo '<a href="user_category_ad.php?name='.$ca_ad['address1'].'&page_id='.$i.'" class="una_a">'. $i .'</a>';
                }
            }
            
            if($now < $max_page){ // リンクをつけるかの判定
                echo '<a href="user_category_ad.php?name='.$ca_ad['address1'].'&page_id='.($now + 1).'">次へ</a>';
            } else {
                echo '　'.'次へ';
            }
            ?>
        </div>
</div>
</div>

<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>



