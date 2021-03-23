<?php include ( dirname(__FILE__) . '/../seller_parts/seller_header.php' ); ?>

<?php

require_once '../../../app/data_function/Getdata.php' ;

$seller_id = $_SESSION['all']["id"];
$tweets= tweetGet($seller_id);
?>

<div class="stt-wrapper">
    <div class="stt-main">
        <div class="stt-send">
        <?php foreach($tweets as $tweet): ?>
          <div class="stt_content">
            <div class="stt_header">
              <form action="seller_tweet_delete.php" method="post"  class="stt_delete">
                <input type=hidden name="tweet_id" value="<?= $tweet['tweet_id']?>">
                <input type=submit value="&#xf2ed;" class="far" id="delete">
            </form>
              <span><img src ="<?= $tweet['prof_file_path']; ?>" ,alt= "" class="tweet_pic"></span>
              <div class="stt_right">
                <p class="stt_corp_name"><?= $_SESSION['all']["corp"] ?></p> 
                <p class="s_time"><?= $tweet['send_time']?></p>
              </div>
            </div>
            <div class="stt_footer">
              <p class="st"><?= $tweet['seller_tweet']?></p>
            </div>
          </div>
        <?php endforeach ?>
        </div>
    </div>
</div>

<form action="seller_tweet_check.php" method="post" class="stt-send1">
    <input name="seller_tweet" type="text" class="stt-send2">
    <input name="seller_id" type="hidden" value="<?= $seller_id ?>">
    <input type="submit" value="送信" class="stt-send3">
</form>

<?php include ( dirname(__FILE__) . '/../seller_parts/seller_footer.php' ); ?>