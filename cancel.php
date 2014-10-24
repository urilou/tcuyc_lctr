<?php
  //include("simple_html_dom.php");

  $cancel_routine_file = 'cancel.txt';
  $cancel_next_file = 'cancel_next.txt';
  $cancel_new_file = 'cancel_new.txt';
  $cancel_data_file = 'cancel_all.txt';
  $cancel_api_v3_all_file = 'cancel_api_v3_all.txt';
  $cancel_api_v4_all_file = 'cancel_api_v4_all.txt';

  $cancel_data_html = file_get_html('http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php');
  $cancel_data_html = str_replace('euc', 'utf-8', $cancel_data_html);
  $cancel_data_html = mb_convert_encoding($cancel_data_html, 'utf-8', 'euc-jp');
  $cancel_data_html = mb_convert_kana($cancel_data_html,"a","utf-8");
  $cancel_data_html = str_get_html($cancel_data_html);
  
  $cancel_data = $cancel_data_html->find('body table',0)->find('tr',3)->find('table',0)->innertext;
  preg_match_all('</tr>',$cancel_data, $cancel_data_length);
  $cancel_data_length = count($cancel_data_length[0])-2;
  echo '<div>すべての休講データ数: '.$cancel_data_length.'</div>';

  function cancel_today(){
    global $cancel_data_html, $cancel_data_length, $cancel_routine_file;
    $today= date('n/j');

    for ($run_length = 0; $run_length < $cancel_data_length; $run_length++) {
      $data_item0 = $cancel_data_html->find('tr',3)->find('td td span.splz',0+$run_length+($run_length*5))->innertext;
      $data_item1 = $cancel_data_html->find('tr',3)->find('td td span.splz',1+$run_length+($run_length*5))->innertext;

      $data_item1_replace = array('(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replace, '', $data_item1);
      $data_item1 = str_replace('月', '/', $data_item1);

      if (!strcmp($data_item1,$today)) {
        $data_item2 = $cancel_data_html->find('tr',3)->find('td td span.splz',2+$run_length+($run_length*5))->innertext;
        $data_item3 = $cancel_data_html->find('tr',3)->find('td td span.splz',3+$run_length+($run_length*5))->innertext;
        $data_item4 = $cancel_data_html->find('tr',3)->find('td td span.splz',4+$run_length+($run_length*5))->innertext;
        $data_item4 = str_replace('　', '', $data_item4);
        $data_item5 = $cancel_data_html->find('tr',3)->find('td td span.splz',5+$run_length+($run_length*5))->innertext;
        $cancel_data[] = '【'.$data_item0.'】今日 >> '.$data_item2.'　'.$data_item3.'（'.$data_item4.'　'.$data_item5.'）'."\n";
      }
    }

    if (empty($cancel_data[0])) {
      $cancel_data[0] = '今日の休講情報はありません。（'.date('n月j日').'）';
    }

    echo '<div><b>休講</b></div>';
    array_unshift($cancel_data,'今日、'.date('n月j日').'の休講情報（最新の情報は http://bit.ly/tcuyclctr で確認してください。）'."\n");

    if (strstr($warning_text, '暴風')) {
      array_unshift($cancel_data,'現在暴風警報が発表されており、休講などの授業措置が行われることがあります。授業措置による講義情報はこのボットでは配信されません。今日の授業措置についてはポータルサイト（https://swan.yc.tcu.ac.jp/campusp/sservice/start.do …）などで確認してください。'."\n");
    }

    foreach ($cancel_data as $key => $value){
      echo $value.'<br>';
    }
    write_array($cancel_routine_file,$cancel_data);
    tweet($cancel_routine_file);
  }

  function cancel_tomorrow(){
    global $cancel_data_html, $cancel_data_length, $cancel_routine_file;
    $tomorrow = date('n/j',strtotime("+1 day"));

    for ($run_length = 0; $run_length < $cancel_data_length; $run_length++) {
      $data_item0 = $cancel_data_html->find('tr',3)->find('td td span.splz',0+$run_length+($run_length*5))->innertext;
      $data_item1 = $cancel_data_html->find('tr',3)->find('td td span.splz',1+$run_length+($run_length*5))->innertext;

      $data_item1_replace = array('(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replace, '', $data_item1);
      $data_item1 = str_replace("月", "/", $data_item1);

      if (!strcmp($data_item1,$tomorrow)) {
        $data_item2 = $cancel_data_html->find('tr',3)->find('td td span.splz',2+$run_length+($run_length*5))->innertext;
        $data_item3 = $cancel_data_html->find('tr',3)->find('td td span.splz',3+$run_length+($run_length*5))->innertext;
        $data_item4 = $cancel_data_html->find('tr',3)->find('td td span.splz',4+$run_length+($run_length*5))->innertext;
        $data_item4 = str_replace('　', '', $data_item4);
        $data_item5 = $cancel_data_html->find('tr',3)->find('td td span.splz',5+$run_length+($run_length*5))->innertext;
        $cancel_data[] = '【'.$data_item0.'】'.$data_item1.' '.$data_item2.'　'.$data_item3.'（'.$data_item4.'　'.$data_item5.'）'."\n";
      }
    }

    if (empty($cancel_data[0])) {
      $cancel_data[0] = '明日の休講情報はありません。（'.date('n月j日',strtotime('+1 day')).'）';
    }

    echo '<div><b>休講</b></div>';
    array_unshift($cancel_data,'明日、'.date('n月j日',strtotime('+1 day')).'の休講情報（最新の情報は http://bit.ly/tcuyclctr で確認してください。）'."\n");
    foreach ($cancel_data as $key => $value){
      echo $value.'<br>';
    }
    write_array($cancel_routine_file,$cancel_data);
    tweet($cancel_routine_file);
  }

  function cancel_next($period){
    global $cancel_data_html, $cancel_data_length, $cancel_next_file;
    $today= date('n/j');

    for ($run_length = 0; $run_length < $cancel_data_length; $run_length++) {
      $data_item0 = $cancel_data_html->find('tr',3)->find('td td span.splz',0+$run_length+($run_length*5))->innertext;
      $data_item1 = $cancel_data_html->find('tr',3)->find('td td span.splz',1+$run_length+($run_length*5))->innertext;

      $data_item1_replace = array('(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replace, '', $data_item1);
      $data_item1 = str_replace("月", "/", $data_item1);
      $data_item2 = $cancel_data_html->find('tr',3)->find('td td span.splz',2+$run_length+($run_length*5))->innertext;

      if (!strcmp($data_item1,$today) && strpos($data_item2, $period) !== false) {
        $data_item3 = $cancel_data_html->find('tr',3)->find('td td span.splz',3+$run_length+($run_length*5))->innertext;
        $data_item4 = $cancel_data_html->find('tr',3)->find('td td span.splz',4+$run_length+($run_length*5))->innertext;
        $data_item4 = str_replace('　', '', $data_item4);
        $data_item5 = $cancel_data_html->find('tr',3)->find('td td span.splz',5+$run_length+($run_length*5))->innertext;
        $cancel_data_next[] = '【'.$data_item0.'】つぎ >> '.$data_item2.'　'.$data_item3.'（'.$data_item4.'　'.$data_item5.'）'."\n";
      }
    }

    echo '<div><b>休講</b></div>';
    foreach ($cancel_data_next as $key => $value){
      echo $value.'<br>';
    }
    write_array($cancel_next_file, $cancel_data_next);
    tweet($cancel_next_file);
  }

  function cancel_new(){
    global $cancel_data_html, $cancel_data_length, $cancel_new_file, $cancel_data_file, $cancel_api_v3_all_file, $cancel_api_v4_all_file;
    
    for ($run_length = 0; $run_length < $cancel_data_length; $run_length++) {
      $data_item0 = $cancel_data_html->find('tr',3)->find('td td span.splz',0+$run_length+($run_length*5))->innertext;
      $data_item1 = $cancel_data_html->find('tr',3)->find('td td span.splz',1+$run_length+($run_length*5))->innertext;

      $data_item1_replace = array('(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)', '日');
      $data_item1 = str_replace($data_item1_replace, '', $data_item1);
      $data_item1 = str_replace("月", "/", $data_item1);

      $data_item2 = $cancel_data_html->find('tr',3)->find('td td span.splz',2+$run_length+($run_length*5))->innertext;
      $data_item3 = $cancel_data_html->find('tr',3)->find('td td span.splz',3+$run_length+($run_length*5))->innertext;
      $data_item4 = $cancel_data_html->find('tr',3)->find('td td span.splz',4+$run_length+($run_length*5))->innertext;
      $data_item4 = str_replace('　', '', $data_item4);
      $data_item5 = $cancel_data_html->find('tr',3)->find('td td span.splz',5+$run_length+($run_length*5))->innertext;
      $cancel_data_new[] = '[新着]【'.$data_item0.'】'.$data_item1.' '.$data_item2.'　'.$data_item3.'（'.$data_item4.'　'.$data_item5.'）'."\n";
      $cancel_api_v3[] = "{\"day\":\"".$data_item1."\",\"period\":\"".$data_item2."\",\"subject\":\"".$data_item3."\",\"lecturer\":\"".$data_item4."\",\"room\":\"".$data_item5."\"}";
    }

    $cancel_data_old = file($cancel_data_file);
    if (empty($cancel_data_old)) {
      $cancel_data_old = array();
    }

    $diff = array_diff($cancel_data_new, $cancel_data_old);
    echo '<div><b>新着休講データ</b></div>';
    while(list($key, $val) = each($diff)) {
      echo $val.'<br>';
    }

    $cancel_api_v3 = implode(",\n", $cancel_api_v3);
    $cancel_api_v3 = "{\"name\":\"都市大YC休講情報(全件)\",\n\"ver\":{\"this\":\"3\",\"last\":\"3\"},\n\"update\":\"".date('Y/n/j H:i:s')."\",\n\"inserted\":\"".count($diff)."\",\n\"data\":[\n".$cancel_api_v3."\n]}";

    write_array($cancel_new_file, $diff);
    write_array($cancel_data_file, $cancel_data_new);
    write($cancel_api_v3_all_file,$cancel_api_v3);
    write($cancel_api_v4_all_file,$cancel_api_v3);
    tweet($cancel_new_file);
    ftp_upload($cancel_api_v3_all_file);
    ftp_upload($cancel_api_v4_all_file);
  }

?>