<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>


<script type="text/javascript"> 
<!-- 
function check(){
	var flag = 0;
	// 設定開始（チェックする項目を設定してください）
	if(document.form1.select1.options[document.form1.select1.selectedIndex].value == ""){
		flag = 1;
	}
	// 設定終了
	if(flag){
		window.alert('選択されていません'); // 選択されていない場合は警告ダイアログを表示
		return false; // 送信を中止
	}
	else{
		return true; // 送信を実行
	}
}
// -->
</script>

<div class="sp-main">
    <div class=sp-title>
        <p class="sp-title1">生体投稿ページ</p>
        <p class="sp-title2">内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
    </div>
   <form method="post" action="testpost_check.php" enctype="multipart/form-data">
                <table class="sp-table">
                    <tr>
                        <th>生体名<span>※必須</span></th>
                        <td><input name="lbn_name" type="text" placeholder="ヒョウモントカゲモドキ" class="sp-m" required></td>
                    </tr>

                    <tr>
                        <th>分類<span>※必須</span></th>
                        <td>
                            <select name="type" class="sp-s">
                                <option value="">選択してください
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
                        <th>モルフ<span>※必須</span></th>
                        <td><input name="morph" type="text" placeholder="マックスノー" class="sp-m" required></td>
                    </tr>


                    <tr>
                        <th>性別<span>※必須</span></th>
                        <td>
                            <select name="lbn_gender" class="sp-s">
                                <option value="">選択してください
                                <option value="オス">オス</option>
                                <option value="メス">メス</option>
                                <option value="不明">不明</option>
                            </select>
                        </td>
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