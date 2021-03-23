<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<div class="sp-main">
    <div class=sp-title>
        <p class="sp-title1">PICK UP</p>
        <p class="sp-title2">店内で最もオススメ生体をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
    </div>
   <form method="post" action="seller_pickup_check.php" enctype="multipart/form-data">
                <table class="sp-table">
                    <tr>
                        <th>生体名<span>※必須</span></th>
                        <td><input name="lbn_name" type="text" placeholder="ヒョウモントカゲモドキ" class="sp-m" required></td>
                    </tr>

                    <tr>
                        <th>モルフ<span>※必須</span></th>
                        <td><input name="morph" type="text" placeholder="マックスノー" class="sp-m" required></td>
                    </tr>

                    <tr>
                        <th>入店日</th>
                        <td><input name="storein" type="date" placeholder="00/00/00" class="sp-s"></td>
                    </tr>

                    <tr>
                        <th>誕生日</th>
                        <td><input name="birth" type="date" placeholder="00/00/00" class="sp-s"></td>
                    </tr>

                    <tr>
                        <th>価格<span>※必須</span></th>
                        <td><input name="price" type="number" placeholder="7000" class="sp-s" required></td>
                    </tr>

                    <tr>
                        <th>慣れ度</th>
                        <td>
                            <select name="ac" class="sp-ss">
                                <option value="1">⭐️</option>
                                <option value="2">⭐️⭐️</option>
                                <option value="3">⭐️⭐️⭐️</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>WC(野生)/CB(繁殖)<span>※必須</span></th>
                        <td>
                            <select name="wccb" class="sp-ss">
                                <option value="WC">WC</option>
                                <option value="CB">CB</option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <th>写真<span>※必須</span></th>
                        <td><input type="file" name="lbn_pic" accept="image/*" class="sp_pic"></td>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    </tr>

                    <tr>
                        <th>コメント欄</th>
                        <td><textarea name="comment" rows="2" cols="58" maxlength="58" class="sp_l"></textarea></td>
                    </tr>
                        
                        <input type=hidden name="id" value="<?= $_SESSION['all']["id"] ;?>">        
                    <tr>
                        <td colspan="2">
                            <input type="reset" value="リセット" class="sp-re">
                            <input type="submit" value="送信" class="sp-sub">
                        </td>
                    </tr>
                </table>
    </form>
</div>

    <?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>