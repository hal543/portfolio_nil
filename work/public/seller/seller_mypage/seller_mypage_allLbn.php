<?php include ( dirname(__FILE__) . '/../seller_parts/seller_mypage_header.php' ); ?>
<?php

define('MAX','20');
$files = GetLbnSellerAll($sellerId);
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
        <div class="sma-wrapper">
            <h3 class="sma-title">全ての投稿</h3>
					<div class="sma-showlbn">
						<?php foreach($disp_data as $sellerLbn): ?>
							<a href ="../seller_lbn_details/seller_lbn_details.php?lbn_id=<?=$sellerLbn['lbn_id']?>" class="sma_detail_button">
                                <div class="smp-show">
                                    <img src ="<?= "{$sellerLbn['file_path']}"; ?>" ,alt= "" class="smp-showpic">
                                    <?php if ($sellerLbn['soldout'] == '1') :?>
                                        <div class="smp_sold_out">
                                            <span class="smp_sold_out_text">売約済</span>    
                                        </div>
                                    <?php endif ?>
                                </div>
                            </a>
						<?php endforeach?>
					</div>
                </div>               
                <div class="sma-page">
            <?php if($now > 1){ // リンクをつけるかの判定
                echo '<a href="seller_lbn_all.php?page_id='.($now - 1).'">前へ</a>'.'　';
            } else {
                echo '前へ'.'　';
            }
            
            for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
                if ($i == $now) { // 現在表示中のページ数の場合はリンクを貼らない
                    echo $now. ' '; 
                } else {
                    echo '<a href="seller_lbn_all.php?page_id='.$i.'" class="sla_a">'. $i .'</a>';
                }
            }
            
            if($now < $max_page){ // リンクをつけるかの判定
                echo '<a href="seller_lbn_all.php?.php?page_id='.($now + 1).'">次へ</a>';
            } else {
                echo '　'.'次へ';
            }
            ?>
        </div>
        </div>
    </div>
</div>



<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>