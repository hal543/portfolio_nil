<?php include ( dirname(_FILE_) . '/../user_parts/user_seller_header.php' ); ?>

<?php
$ca_lbn=$_GET['name'];

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

<div class="usc_wrapper">
<div class="lbn_main">
	<div class="fav_lbn">
    <p class="usc_ca"><?= ($ca_lbn);?>カテゴリーの検索結果</p>
        <div class="showlbn1">
            <?php foreach($disp_data as $ca_lbn): ?>
                    <a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$ca_lbn['lbn_id']}"; ?>">
                    <img src ="<?= "{$ca_lbn['file_path']}"; ?>" ,alt= "" class="showpic"></a>
                <?php if ($sellerLbn['soldout'] == '1') :?>
                    <div class="usm_sold_out">
                        <span class="smp_sold_out_text"></span>    
                    </div>
                <?php endif ?>
            <?php endforeach?>
        </div>
        
        <div class="usc_page">
            <?php if($now > 1){ // リンクをつけるかの判定
                echo '<a href="user_newLbn_all.php?page_id='.($now - 1).'">前へ</a>'.'　';
            } else {
                echo '前へ'.'　';
            }
            
            for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
                if ($i == $now) { // 現在表示中のページ数の場合はリンクを貼らない
                    echo $now. ' '; 
                } else {
                    echo '<a href="user_newLbn_all.php?page_id='.$i.'" class="una_a">'. $i .'</a>';
                }
            }
            
            if($now < $max_page){ // リンクをつけるかの判定
                echo '<a href="user_newLbn_all.php?page_id='.($now + 1).'">次へ</a>';
            } else {
                echo '　'.'次へ';
            }
            ?>
        </div>
    </div>
</div>
</div>

<?php include ( dirname(_FILE_) . '/../user_parts/user_footer.php' ); ?>