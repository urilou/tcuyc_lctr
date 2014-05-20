<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("https://swan.yc.tcu.ac.jp/campusp/sservice/start.do");
  $tweetfilepath = '/home/users/1/mods.jp-usi/web/lecturebot/tcu-new.txt';
  $oldatfilepath = '/home/users/1/mods.jp-usi/web/lecturebot/tcu-all.txt';

$itynnum = $html->find('body form div',0)->find("table",4)->innertext;
preg_match_all('</tr>',$itynnum,$tynum);
$tyitm = count($tynum[0])-1;
echo 'すべてのお知らせデータ数: '.$tyitm.'<br>';

    for ($ty=1; $ty<$tyitm+1; $ty++) {
        $ityn0 = $html->find('body form div',0)->find('table',4)->find('tr',$ty)->find('td',0)->find('a',0)->innertext;
        $ityn1 = $html->find('body form div',0)->find('table',4)->find('tr',$ty)->find('td',0)->innertext;
        $ityn1 = mb_substr($ityn1, 9, 75);
        $ityn1 = str_replace('javascript:openKouhou(\'', 'https://swan.yc.tcu.ac.jp/campusp/sservice/', $ityn1);
        $ityn2 = $html->find('body form div',0)->find('table',4)->find('tr',$ty)->find('td',3)->innertext;
        for ($i=0; $i<3; $i++){
            ${'ityn'.$i} = mb_convert_encoding(${'ityn'.$i}, 'UTF-8', 'shift_jis');
        }
//        $ityn2 = str_replace('（横浜）', '横浜キャンパス', $ityn2);
//        $ityn2 = str_replace('（世田谷）', '世田谷キャンパス', $ityn2);
//        $ityn2 = str_replace('（等々力）', '等々力キャンパス', $ityn2);
//        $ityn2 = str_replace('(横浜)', '横浜キャンパス', $ityn2);
//        $ityn2 = str_replace('(世田谷)', '世田谷キャンパス', $ityn2);
//        $ityn2 = str_replace('(等々力)', '等々力キャンパス', $ityn2);
        ${'ttyn'.$ty} = "[新着]【ポータル】".$ityn0." ".$ityn1."（".$ityn2."）"."\n";
    }

// 新ポータルお知らせ情報を全件取得
$fruit = array($ttyn0,$ttyn1,$ttyn2,$ttyn3,$ttyn4,$ttyn5,$ttyn6,$ttyn7,$ttyn8,$ttyn9,$ttyn10,$ttyn11,$ttyn12,$ttyn13,$ttyn14,$ttyn15,$ttyn16,$ttyn17,$ttyn18,$ttyn19,$ttyn20,$ttyn21,$ttyn22,$ttyn23,$ttyn24,$ttyn25,$ttyn26,$ttyn27,$ttyn28,$ttyn29,$ttyn30,$ttyn31,$ttyn32,$ttyn33,$ttyn34,$ttyn35,$ttyn36,$ttyn37,$ttyn38,$ttyn39,$ttyn40,$ttyn41,$ttyn42,$ttyn43,$ttyn44,$ttyn45,$ttyn46,$ttyn47,$ttyn48,$ttyn49,$ttyn50);

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
$fptyn = fopen($tweetfilepath, 'w');
stream_set_write_buffer($fptyn,0);
 {
  foreach ($diff as $a){
  fputs($fptyn, $a);
  }}
fclose($fptyn);

//データ格納
$fptyn = fopen($oldatfilepath, 'w');
stream_set_write_buffer($fptyn,0);
 {
  foreach ($fruit as $a){
  fputs($fptyn, $a);
  }}
fclose($fptyn);

?>