<?php include ( dirname(__FILE__) . '/../user_parts/user_seller_header.php' ); ?>
<div class="smp-info-wrapper">
        <div class="smp-info-main">
            <p class="smp-info-title">店舗からのお知らせ</p>
            <table class="smp-info-table">
                <tr class="smp-info-tr">
                    <th class="smp-info-th"><a href="../user_seller_info/user_seller_info_detail.php?info_id=<?=$sellerInfo['info_id'] ; ?>"><?= $sellerInfo['si_date'] ?>&emsp;<?= $sellerInfo['si_title'] ?></a></th>
                </tr>
            </table>
            <a href="../user_seller_info/user_seller_info_top.php?seller_id=<?=$sellerId ; ?>" class="info_button">お知らせ一覧へ</a>
        </div>
    </div>
    <div class="smp-event-wrapper">
        <div class="smp-event-content">
            <p></p>
        </div>
    </div>

    <div class="smp-lbn-main">
        <div class="smp-fav-lbn1">
        <h3>PICK UP</h3>
		<div class="smp-showlbn1">
						<?php foreach($picks as $pick): ?>
                        <div class="pick-content">
                            <div class="pick-left">
							    <a href ="lbn_details.php?lbn_id=<?="{$pick['id']}"; ?>"><img src ="<?= "{$pick['p_file_path']}"; ?>" ,alt= "" class="smp-p-showpic"></a>
                            </div>
                            <ul class="pick-right">
                                <li class="pname">生体名：<?=$pick['p_name']?></li>
                                <li class="pmorph">モルフ：<?=$pick['p_morph']?></li>
                                <li class="pprice">価格：<?=$pick['p_price']?></li>
                                <li class="pcomment">コメント：<?=$pick['p_comment']?></li>
                            </ul>
                        </div>
						<?php endforeach?>
			
        </div>

        <div class="smp-fav-lbn2">
        <h3>新着情報</h3>
					<div class="smp-showlbn2">
						<?php foreach($sellerLbns as $sellerLbn): ?>
							<a href ="../user_lbn_details/user_lbn_details.php?lbn_id=<?="{$sellerLbn['lbn_id']}"; ?>">
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
					<div class="smp-moreButton">
						<a href="user_seller_mypage_all.php?seller_id=<?=$sellerId ; ?>"><button class="smp-more-button" type="button">
							もっと見る
						</button></a>
					</div>
                </div>
            </div>
			
            <?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>





