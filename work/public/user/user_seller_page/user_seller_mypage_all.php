<?php include ( dirname(__FILE__) . '/../user_parts/user_seller_header.php' ); 

define('MAX','20');
$files=GetLbnSellerAll($sellerId);
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
        <h3>全ての投稿</h3>
					<div class="smp-showlbn2">
						<?php foreach($disp_data as $sellerLbn): ?>
                            <a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?=$sellerLbn['lbn_id']?>" class="sma_detail_button">
                                <div class="smp-show">
                                    <img src ="<?= "{$sellerLbn['file_path']}"; ?>" ,alt= "" class="smp-showpic">
                                    <?php if ($sellerLbn['soldout'] == '1') :?>
                                        <div class="usm_sold_out">
                                            <span class="smp_sold_out_text"></span>    
                                        </div>
                                    <?php endif ?>
                                </div>
                            </a>
						<?php endforeach?>
					</div>
                     
					<div class="usm_all">
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
			
            <?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>