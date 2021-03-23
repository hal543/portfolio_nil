<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' ); ?>

     <div class="uf_wrapper">
         <div class="uf_main">
            <div class="uf_titles">
                <p class="uf_title1">お問い合わせ</p>
                <p class="uf_title2">-Contact US-</p>
                <p class="uf_title3">投稿内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
            </div>
            
            <div class="uf_form">
                <form method="post" action="user_form_check.php">
                    <div class="uf_f_content1">
                        <p class="uf_p1">件名<span>※必須</span></p>
                        <input name="t_form" type="text" placeholder="" class="uf_t" required></td>
                    </div>
                    <div class="uf_f_content2">
                        <p class="uf_p2">内容(500文字以内)<span>※必須</span></p>
                        <textarea name="m_form" rows="4" cols="500" class="uf_m" required></textarea>
                    </div>
                        <input type=hidden name="user_id" value="<?= ($_SESSION['user_all']["user_id"])?>">
                        <input type=hidden name="user_name" value="<?= ($_SESSION['user_all']["user_name"])?>">
                        <input type=hidden name="user_mail" value="<?= ($_SESSION['user_all']["user_mail"])?>">
                    <div class="uf_f_content3">
                        <input type="reset" value="リセッﾄ" class="uf_re">
                        <input type="submit" value="確認画面へ" class="uf_sub">
                    </div>
                </form>
            </div>    
        </div>
    </div>

    <?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>