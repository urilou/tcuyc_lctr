<?php
  include('parse_train_status.php');

  $time = date('Hi');
  $today = date('md');
  $train_info_file = 'train_info.txt';

  echo '<div><b>各路線の運行情報</b></div>';

  $dent_name = '田園都市線';
  $dent_info = file_get_html('http://transit.loco.yahoo.co.jp/traininfo/detail/114/0/');
  $dent_info = $dent_info->find('div#mdServiceStatus',0)->find('li',0)->innertext;

  // データがある場合
  $dent_info = train_info_parse($dent_name, $dent_info);
  echo '<div>田園都市線の運行情報：'.$dent_info.'</div>';
  $train_info = $train_info."\n".$dent_info;
  
  $blue_name = 'ブルーライン';
  $blue_info = file_get_html('http://transit.loco.yahoo.co.jp/traininfo/detail/140/0/');
  $blue_info = $blue_info->find('div#mdServiceStatus',0)->find('li',0)->innertext;
  // データがある場合
  $blue_info = train_info_parse($blue_name, $blue_info);
  echo '<div>ブルーラインの運行情報：'.$blue_info.'</div>';
  $train_info = $train_info."\n".$blue_info;

  $train_info = (ltrim($train_info, "\n"));
  
  if (!empty($train_info)) {
    write($train_info_file, $train_info);
    tweet($train_info_file);
  }
?>