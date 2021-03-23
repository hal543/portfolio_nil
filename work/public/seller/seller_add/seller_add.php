<?php include ( dirname(__FILE__) . '/../seller_parts/seller_out_header.php' ); ?>

<div class="sa-wrapper">
 <h1 class="sa_title1">会員登録ページ</h1>
        <p class="sa_title2">ご登録内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
   <form method="post" action="seller_add_check.php">
                <table class="sa_table">
                    <tr>
                        <th>法人名/屋号<span>※必須</span></th>
                        <td><input name="corp" type="text" placeholder="株式会社NIL" required></td>
                    </tr>

                    <tr>
                        <th>担当者名<span>※必須</span></th>
                        <td><input name="seller" type="text" placeholder="田中　太郎" required></td>
                    </tr>

                    <tr>
                        <th>電話番号 -（ハイフン）は不要です</th>
                        <td><input name="phone" type="tel" placeholder="0000000000"></td>
                    </tr>

                    <tr>
                        <th>FAX番号</th>
                        <td><input name="fax" type="text" placeholder="0000000000"></td>
                    </tr>


                    <tr>
                        <th>メールアドレス<span>※必須</span></th>
                        <td><input name="mail" type="text" placeholder="nil@gmail.com" required></td>
                    </tr>


                    <tr>
                        <th>郵便番号  -（ハイフン）は不要です</th>
                        <td><input name="postnumber" type="text" placeholder="0000000"></td>
                    </tr>


                    <tr>
                        <th>住所（都道府県）</th>
                        <td><input name="address1" type="text" placeholder="東京都" required></td>
                    </tr>

                    <tr>
                        <th>住所（市町村　マンション名）</th>
                        <td><input name="address2" type="text" placeholder="渋谷区"></td>
                    </tr>

                    <tr>
                        <th>WEB</th>
                        <td><input name="web" type="text" placeholder="https://......"></td>
                    </tr>

                    <tr>
                        <th>パスワード<span>※必須</span></th>
                        <td><input name="pass" type="password" placeholder="" required></td>
                    </tr>

                    <tr>
                        <th>もう一度パスワードを入力してください<span>※必須</span></th>
                        <td><input name="passag" type="password" placeholder="" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="reset" value="リセッﾄ" class="sa-re">
                            <input type="submit" value="送信" class="sa-sub">
                        </td>
                    </tr>
                </table>
    </form>
</div>

    <?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); 