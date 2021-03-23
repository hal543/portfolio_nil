<?php 
require_once '../../../app/data_function/Getdata.php'  ;
require_once '../../../app/data_function/pagenation.php'  ;
include ( dirname(__FILE__) . '/../user_parts/user_top_header.php' );

define('MAX','20');
$favLbn = $_SESSION['user_all']["w_morph"];
$files = favMatchAllGet($favLbn);
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
				<h2>マッチした生体一覧</h2>
				<div class="una_lbn_content">
				<?php foreach($disp_data as $file): ?>
                    <div>
                        <?php if ($file['soldout'] == '1') :?>                       
                            <a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$file['lbn_id']}"; ?>">             
                                <div class="sold_out_ust_show">
                                    <div class="sold_out_border">
                                        <img src ="<?= "{$file['file_path']}"; ?>" ,alt= "" class="sold_out_ust_showpic">
                                    </div>
                                </div>
                            </a>
                        <?php else: ?>
                            <a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$file['lbn_id']}"; ?>">
                                <div class="una-show">
                                    <img src ="<?= "{$file['file_path']}"; ?>" ,alt= "" class="una-showpic">
                                </div>
                            </a>
                        <?php endif ?>
                    </div>
				<?php endforeach?>
                </div>
			</div>
		</div>
        
        <div>
            <p class="uf_all">全件数&ensp;:&ensp;<?=$files_num ?>件</p>
        </div>
        
        <div class="una_php">
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



<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>