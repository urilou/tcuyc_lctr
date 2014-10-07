<?php

  $manual_tweet_file = 'manual_tweet.php';

  if ($_POST['psw_data_status'] == 'tweet') {
    $manual_tweet_data = "<?php\n\$data = array(\"".$_POST["manual_tweet_data"]."\",);";
    write($manual_tweet_file, $manual_tweet_data);
    tweet($manual_tweet_file);
    echo '<br><a href="run.php">画面の初期化</a>';
  } elseif ($_POST['psw_data'] == $manual_password) {
    echo '<form action="" method="POST">';
    echo '<div><b>手動投稿データの生成</b></div>';
    echo '<textarea id="text_form" name="manual_tweet_data" cols=40 rows=4></textarea><br>';
    echo '<a onclick="document.getElementById(\'text_form\').value=\'【休講】'.date("m/d").' 0限　講義名（講師名　教室名）\'">明日の休講</a>　'.
    '<a onclick="document.getElementById(\'text_form\').value=\'【休講】今日 >> 0限　講義名（講師名　教室名）\'">きょうの休講</a>　'.
    '<a onclick="document.getElementById(\'text_form\').value=\'【休講】つぎ >> 0限　講義名（講師名　教室名）\'">次の休講</a>　'.
    '<a onclick="document.getElementById(\'text_form\').value=\'【時間割変更】つぎ >> 講義名（講師名）　変更内容\'">次の変更</a>　'.
    '<a onclick="document.getElementById(\'text_form\').value=\'【運行情報】線 >> 原因線での原因のため事象しています\'">運行情報</a>　<br>';
    echo '<input type="submit" value="ツイート" text="">';
    echo '<input type="hidden" name="psw_data_status" value="tweet">';
    echo '</form>';
  } else {
    echo '<form action="" method="POST">';
    echo '<div><b>手動投稿データの生成</b></div>';
    echo '<input type="password" name="psw_data" value="">';
    echo '<input type="submit" value="送信"><br>';
    echo '</form>';
  }
  echo '<div><br></div>';

?>