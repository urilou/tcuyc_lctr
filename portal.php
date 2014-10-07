<?php
//include("simple_html_dom.php");
  $portal_html = file_get_html("https://swan.yc.tcu.ac.jp/campusp/sservice/start.do");
  $portal_html = mb_convert_encoding($portal_html, 'utf-8', 'shift_jis');
  $portal_html = mb_convert_kana($portal_html,"a","utf-8");
  $portal_html = str_get_html($portal_html);
  $portal_new_file = 'portal.txt';
  $portal_data_file = 'portal_all.txt';
  $portal_api_v3_all_file = 'portal_api_v3_all.txt';
  $portal_api_v4_all_file = 'portal_api_v4_all.txt';

  $portal_data = $portal_html->find('body form div',0)->find("table",4)->innertext;

  preg_match_all('</tr>',$portal_data,$portal_data);
  $portal_data_length = count($portal_data[0])-1;
  echo '<div><b>すべてのお知らせデータ数: '.$portal_data_length.'</b></div>';

  for ($run_length=1; $run_length<$portal_data_length + 1; $run_length++) {
    $data_item0 = $portal_html->find('body form div',0)->find('table',4)->find('tr',$run_length)->find('td',0)->find('a',0)->innertext;
    $data_item1 = $portal_html->find('body form div',0)->find('table',4)->find('tr',$run_length)->find('td',0)->innertext;
    $data_item1 = mb_substr($data_item1, 9, 75);
    $data_item1 = str_replace('javascript:openKouhou(\'', 'https://swan.yc.tcu.ac.jp/campusp/sservice/', $data_item1);
    $data_item2 = $portal_html->find('body form div',0)->find('table',4)->find('tr',$run_length)->find('td',3)->innertext;
    $data_item2 = str_replace('（横浜）', 'YC', $data_item2);
    $data_item2 = str_replace('（世田谷）', 'SC', $data_item2);
    $data_item2 = str_replace('（等々力）', 'TC', $data_item2);
    $data_item2 = str_replace('(横浜)', 'YC', $data_item2);
    $data_item2 = str_replace('(世田谷)', 'SC', $data_item2);
    $data_item2 = str_replace('(等々力)', 'TC', $data_item2);
    $portal_data_new[] = "[新着]【ポータル】".$data_item0." ".$data_item1."（".$data_item2."）"."\n";
    $portal_api_v3[] = "{\"title\":\"".$data_item0."\",\"url\":\"".$data_item1."\",\"publisher\":\"".$data_item2."\"}";
  }

  $portal_data_old = file($portal_data_file);
  if (empty($portal_data_old)) {
    $portal_data_old = array();
  }

  $diff = array_diff($portal_data_new, $portal_data_old);
  echo '<div>新着データ一覧:</div>';
  while(list($key, $val) = each($diff)) {
    echo $val.'<br>';
  }

  $portal_api_v3 = implode(",\n", $portal_api_v3);
  $portal_api_v3 = "{\"name\":\"都市大YCポータル情報(全件)\",\n\"ver\":{\"this\":\"3\",\"last\":\"3\"},\n\"update\":\"".date('Y/n/j H:i:s')."\",\n\"inserted\":\"".count($diff)."\",\n\"data\":[\n".$portal_api_v3."\n]}";


  write_array($portal_new_file, $diff);
  write_array($portal_data_file, $portal_data_new);
  write($portal_api_v3_all_file,$portal_api_v3);
  write($portal_api_v4_all_file,$portal_api_v3);
  tweet($portal_new_file);
  ftp_upload($portal_api_v3_all_file);
  ftp_upload($portal_api_v4_all_file);
?>