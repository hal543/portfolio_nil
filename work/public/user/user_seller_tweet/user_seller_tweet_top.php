<?php include ( dirname(__FILE__) . '/../user_parts/user_header.php' ); ?>

<?php

require_once '../../../app/data_function/Getdata.php' ;

$seller_id = $_GET['seller_id'];
$tweets= tweetGet($seller_id);
?>

<div class="stt-wrapper">
    <div class="stt-main">
        <div class="stt-send">
        <?php foreach($tweets as $tweet): ?>
          <div class="stt_content">
            <div class="stt_header">
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

<?php include ( dirname(__FILE__) . '/../user_parts/user_footer.php' ); ?>