<!doctype html>
<html><head><meta charset='utf-8'>
<title>YC休講情報ボット</title>
</head>
<body>
<?php

  // 全体制御用プログラム
  // ヘッダー
  date_default_timezone_set('Asia/Tokyo');
  include('simple_html_dom.php');
  include('writer.php');
  include('tweet.php');
  include('setting.php');
  include('uploader.php');

  $time = date('Hi');
  $today = date("m-d");
  $calendar = @file_get_contents('calendar.txt');

  $svrclock = date("Y-m-d H:i:s");
  echo '<div>'.$svrclock.'</div>';
  echo '<div><br></div>';

// ツイートデータの生成
  // 講義情報ではない実行
  include('manual.php');
  include('weather.php');
  echo '<div><br></div>';
  include('train_info.php');
  echo '<div><br></div>';
    // 講義関連の実行
  include('portal.php');
  include('cancel.php');
  include('extra.php');
  include('change.php');

  echo '<div><br></div>';

  cancel_new();
  extra_new();

  //大学設定の休校日を判定する
  if (preg_match("/$today/", $calendar)) {
    echo '大学設定の休校日です';
  } else{
    // 講義関連の時間指定情報・外部か
    if ($time == 2000) {
      cancel_tomorrow();
      extra_tomorrow();
    } elseif ($time == 800) {
      cancel_today();
      extra_today();
    } elseif ($time == 830) {
      change_next('1');
    } elseif ($time == 1030) {
      cancel_next('2');
      extra_next('2');
      change_next('2');
    } elseif ($time == 1255) {
      cancel_next('3');
      extra_next('3');
      change_next('3');
    } elseif ($time == 1440) {
      cancel_next('4');
      extra_next('4');
      change_next('4');
    } elseif ($time == 1625) {
      cancel_next('5');
      extra_next('5');
      change_next('5');
    } elseif ($time == 1810) {
      cancel_next('6');
      extra_next('6');
      change_next('6');
    }
  }
?>