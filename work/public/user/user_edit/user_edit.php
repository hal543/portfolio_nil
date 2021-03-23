<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' ); ?>
<?php $user_addresses = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','新潟県','富山県','石川県','福井県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');?>


<div class="ue-wrapper">
    <span class="ue-title">プロフ情報修正</span>
    <div class="ue-conntents">
        
        <form method="post" action="user_edit_check.php">
            <table class="ue-table">
                <tr>
                    <th class="ue-th">ニックネーム<span>※必須</span></th>
                    <td><input name="user_name" type="text" value="<?= ($_SESSION['user_all']["user_name"]); ?>" class="ue-s" required></td>
                </tr>

                <tr>
                    <th class="ue-th">メールアドレス<span>※必須</span></th>
                    <td><input name="user_mail" type="text" value="<?= ($_SESSION['user_all']["user_mail"]); ?>" class="ue-m" required></td>
                </tr>

                <tr>
                    <th class="ue-th">年齢<span></span></th>
                    <td><input name="age" type="number" value="<?= ($_SESSION['user_all']["age"]); ?>" class="ue-ss"></td>
                </tr>
                
                <tr>
                    <th class="ue-th">性別</th>
                    <td>
                        <select name="gender" option value="<?= ($_SESSION['user_all']["gender"]); ?>">
                            <option value="<?= ($_SESSION['user_all']["gender"]);?>">
                                <?= ($_SESSION['user_all']["gender"]); ?>
                            </option>
                            <option value="男性">男性</option>
                            <option value="女性">女性</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th class="ue-th">住所</th>
                    <td>
                    <select name="user_address" class="ue_m">
                        <?php foreach($user_addresses as $user_address) :?>
                            <option value="<?php echo $user_address;?>"><?php echo $user_address; ?></option>
                        <?php endforeach ;?>    
                    </select>
                    </td>
                </tr>

                <tr>
                    <th class="ue-th">お探しの生体（種類）</th>
                    <td>
                        <select name="w_lbn">
                            <option value="トカゲ">トカゲ</option>
                            <option value="ヤモリ">ヤモリ</option>
                            <option value="ナミヘビ">ナミヘビ</option>
                            <option value="ボアパイソン">ボアパイソン</option>
                            <option value="リクガメ">リクガメ</option>
                            <option value="ミズガメ">ミズガメ</option>
                            <option value="カメレオン">カメレオン</option>
                            <option value="両生類">両生類</option>
                            <option value="小動物">小動物</option>
                            <option value="その他">その他</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th class="ue-th">生体名</th>
                    <td><input name="w_morph" type="text"　placeholder="ヒョウモントカゲモドキ" class="ue-m"></td>
                </tr>

                <tr>
                    <th class="ue-th">パスワード<span>※必須</span></th>
                    <td><input name="user_pass" type="password" placeholder="" class="ue-m" required></td>
                </tr>

                <tr>
                    <th class="ue-th">パスワード（確認用）<span>※必須</span></th>
                    <td><input name="user_passag" type="password" placeholder="" class="ue-m" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="reset" value="リセッﾄ" class="ue-re">
                        <input type="submit" value="送信" class="ue-sub">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>
                  