<?php
  //include("simple_html_dom.php");

  $change_next_file = 'change_next.txt';

  //$change_data_html = file_get_html('http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php');
  //$change_data_html = str_replace('euc', 'utf-8', $change_data_html);
  //$change_data_html = mb_convert_encoding($change_data_html, 'utf-8', 'euc-jp');
  //$change_data_html = mb_convert_kana($change_data_html,"a","utf-8");
  //$change_data_html = str_get_html($change_data_html);
  $change_data_html = $cancel_data_html;
  
  $change_data = $change_data_html->find('body table',0)->find("table",4)->innertext;
  preg_match_all('</tr>',$change_data, $change_data_length);
  $change_data_length = count($change_data_length[0])-2;
  echo '<div>すべての変更データ数: '.$change_data_length.'</div>';

  //change_next();

  function change_next($period){
    global $change_data_html, $change_data_length, $change_next_file;
    $today = date('m/d');
    
    for ($run_length = 0; $run_length < $change_data_length; $run_length++) {
      $data_item1 = $change_data_html->find("table",5)->find('td span.splz',1+$run_length+($run_length*6))->innertext;
      $data_item2 = $change_data_html->find("table",5)->find('td span.splz',3+$run_length+($run_length*6))->innertext;
      $data_item1 = substr($data_item1, 5, 5);

      if (!strcmp($data_item1, $today) && strpos($data_item2, $period) !== FALSE) {
        $data_item3 = $change_data_html->find("table",5)->find('td span.splz',4+$run_length+($run_length*6))->innertext;
        $data_item4 = $change_data_html->find("table",5)->find('td span.splz',5+$run_length+($run_length*6))->innertext;
        $data_item4 = str_replace('　', '', $data_item4);
        $data_item5 = $change_data_html->find("table",5)->find('td span.splz',6+$run_length+($run_length*6))->innertext;
        $change_data_new[] = '【時間割変更】つぎ >> '.$data_item2.' '.$data_item3.'（'.$data_item4.'）　'.$data_item5.''."\n";
      }
    }

    echo '<div><b>変更</b></div>';
    foreach ($change_data_new as $key => $value){
      echo $value.'<br>';
    }

    write_array($change_next_file, $change_data_new);
    tweet($change_next_file);
  }

?>