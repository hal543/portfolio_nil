<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

     <div class="uf_wrapper">
         <div class="uf_main">
            <div class="uf_titles">
                <p class="uf_title1">お問い合わせ</p>
                <p class="uf_title2">-Contact US-</p>
                <p class="uf_title3">投稿内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
            </div>
            
            <div class="uf_form">
                <form method="post" action="seller_form_check.php">
                    <div class="uf_f_content1">
                        <p class="uf_p1">件名<span>※必須</span></p>
                        <input name="t_form" type="text" placeholder="" class="uf_t" required></td>
                    </div>
                    <div class="uf_f_content2">
                        <p class="uf_p2">内容(500文字以内)<span>※必須</span></p>
                        <textarea name="m_form" rows="4" cols="500" class="uf_m" required></textarea>
                    </div>
                        <input type=hidden name="seller_id" value="<?= ($_SESSION['all']["id"])?>">
                        <input type=hidden name="corp" value="<?= ($_SESSION['all']["corp"])?>">
                        <input type=hidden name="seller" value="<?= ($_SESSION['all']["seller"])?>">
                        <input type=hidden name="mail" value="<?= ($_SESSION['all']["mail"])?>">
                    <div class="uf_f_content3">
                        <input type="reset" value="リセッﾄ" class="uf_re">
                        <input type="submit" value="確認画面へ" class="uf_sub">
                    </div>
                </form>
            </div>    
        </div>
    </div>

    <?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>