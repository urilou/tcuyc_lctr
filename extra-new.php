<?php
  date_default_timezone_set('Asia/Tokyo');
  include_once('simple_html_dom.php');
  $html = file_get_html('http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php' );
  $today = date('n/j');
  $tmrrw = date('n/j',strtotime('+1 day'));
  $tmrrwtweet = date('n月j日',strtotime('+1 day'));
  $sunday = date('w');
  $tweetfilepath = '/home/users/1/mods.jp-usi/web/lecturebot/extra-new.txt';
  $oldatfilepath = '/home/users/1/mods.jp-usi/web/lecturebot/extra-all.txt';

$itmnum = $html->find('body table',0)->find("table",3)->innertext;
preg_match_all('</tr>',$itmnum,$cmnum);
$cmcn = count($cmnum[0])-2;
echo 'すべての補講データ数: '.$cmcn.'<br>';

     for ($cm = 0; $cm < $cmcn; $cm++) {
       $icm0 = $html->find('body',0)->find('table',4)->find('td span.splz',0+$cm+($cm*5))->innertext;
       $icm1 = $html->find('body',0)->find('table',4)->find('td span.splz',1+$cm+($cm*5))->innertext;
       $icm1 = str_replace('月', '/', $icm1);
       $icm1 = str_replace('日', ' ', $icm1);
       $icm1 = str_replace('(日)', '', $icm1);
       $icm1 = str_replace('(/)', '', $icm1);
       $icm1 = str_replace('(火)', '', $icm1);
       $icm1 = str_replace('(水)', '', $icm1);
       $icm1 = str_replace('(木)', '', $icm1);
       $icm1 = str_replace('(金)', '', $icm1);
       $icm1 = str_replace('(土)', '', $icm1);
       $icm1day = str_replace(' ', '', $icm1);
         $icm2 = $html->find('body',0)->find('table',4)->find('td span.splz',2+$cm+($cm*5))->innertext;
         $icm3 = $html->find('body',0)->find('table',4)->find('td span.splz',3+$cm+($cm*5))->innertext;
         $icm4 = $html->find('body',0)->find('table',4)->find('td span.splz',4+$cm+($cm*5))->innertext;
         $icm4 = str_replace('　', '', $icm4);
         $icm5 = $html->find('body',0)->find('table',4)->find('td span.splz',5+$cm+($cm*5))->innertext;
         ${'lcm'.$cm} = "[新着]【".$icm0."】".$icm1.$icm2."　".$icm3."（".$icm4."　".$icm5."）"."\n";
         ${'lcm'.$cm} = mb_convert_kana(${'lcm'.$cm},'a','EUC-JP');
         ${'tcm'.$cm} = mb_convert_encoding(${'lcm'.$cm}, 'UTF-8', 'EUC-JP');
     }

//新休講情報を全件取得
$fruit = array($tcm0,$tcm1,$tcm2,$tcm3,$tcm4,$tcm5,$tcm6,$tcm7,$tcm8,$tcm9,$tcm10,$tcm11,$tcm12,$tcm13,$tcm14,$tcm15,$tcm16,$tcm17,$tcm18,$tcm19,$tcm20,$tcm21,$tcm22,$tcm23,$tcm24,$tcm25,$tcm26,$tcm27,$tcm28,$tcm29,$tcm30,$tcm31,$tcm32,$tcm33,$tcm34,$tcm35,$tcm36,$tcm37,$tcm38,$tcm39,$tcm40,$tcm41,$tcm42,$tcm43,$tcm44,$tcm45,$tcm46,$tcm47,$tcm48,$tcm49,$tcm50);

//旧休講情報を全件取得
$array = file($oldatfilepath);

//デバッグ表示用
print_r($fruit);
echo '<br>';
print_r($array);
echo '<br>';

$diff = array_diff($fruit,$array);
    while(list($key,$val) = each($diff)) {
    print $val. "<br>\n";
   }

//差分データの書き込み
$fpctm = fopen($tweetfilepath, 'w');
stream_set_write_buffer($fpctm,0);
 {
  foreach ($diff as $a){
  fputs($fpctm, $a);
  }}
fclose($fpctm);

//データ格納
$fpctm = fopen($oldatfilepath, 'w');
stream_set_write_buffer($fpctm,0);
 {
  foreach ($fruit as $a){
  fputs($fpctm, $a);
  }}
fclose($fpctm);

?>