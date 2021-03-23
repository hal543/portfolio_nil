<?php include ( dirname(__FILE__) . '/../seller_parts/seller_top_header.php' ); ?>
<?php

require_once '../../../app/data_function/Getdata.php' ;

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

            <span class="st-header-title">全ての投稿<span>
                <div class="st-showlbn">
                        <?php foreach($disp_data as $select_lbn): ?>
				<a href ="../seller_lbn_details/seller_lbn_details.php?lbn_id=<?="{$select_lbn['lbn_id']}"; ?>">
					<div class="st-show">
							<form action="sold_out_check.php" method="post"  class="sold_out_button">
								<input type=hidden name="lbn_id" value="<?= $select_lbn['lbn_id']?>">
								<input type=hidden name="num" value="1">
								<input type=submit value="販売済" class="sold_out_check_button">
							</form>
						<div class="deletes">
							<form action="lbn_delete.php" method="post"  class="st_delete">
								<input type=hidden name="lbn_id" value="<?= $select_lbn['lbn_id']?>">
								<input type=submit value="&#xf00d;" class="fas" id="delete">
							</form>
						</div>
						<img src ="<?= "{$select_lbn['file_path']}"; ?>" ,alt= "" class="st-showpic">
							<?php if ($select_lbn['soldout'] == '1') :?>
								<div class="st_sold_out">
									<span class="st_sold_out_text">売約済</span>    
								</div>
               				 <?php endif ?>
						<div class="st-price-content">
							<p class="st-price">¥<?=$select_lbn['price']?></p>
						</div>
					</div>
				</a>
			<?php endforeach?>
        </div>
        <div class="sla_all">
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


<?php include ( dirname(__FILE__) . '/../seller_parts/seller_top_footer.php' ); ?>