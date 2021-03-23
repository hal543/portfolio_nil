<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>


<div class="sip_wrapper">
         <div class="sip_main">
            <div class="sip_titles">
                <p class="sip_title1">お知らせ投稿</p>
                <p class="sip_title2">投稿内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
            </div>
            
            <div class="sip_form">
                <form method="post" action="seller_info_post_check.php">
                    <div class="sip_content1">
                        <p class="sip_p1">タイトル<span>※必須</span></p>
                        <input name="si_title" type="text" placeholder="" class="uf_t" required></td>
                    </div>
                    <div class="sip_content2">
                        <p class="sip_p2">内容(500文字以内)<span>※必須</span></p>
                        <textarea name="si_content" rows="4" cols="500" class="uf_m" required></textarea>
                    </div>
                        <input type=hidden name="seller_id" value="<?= ($_SESSION['all']["id"])?>">
                    <div class="sip_content3">
                        <input type="reset" value="リセッﾄ" class="sip_re">
                        <input type="submit" value="確認画面へ" class="sip_sub">
                    </div>
                </form>
            </div>    
        </div>
    </div>

    <?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>