<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n月j日");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/cancel.txt";

$cancelitm = $html->find("body table",0)->find("tr",3)->find("table",0)->innertext;
preg_match_all("</tr>",$cancelitm,$conum);
$coitm = count($conum[0])-2;
echo "すべての休講データ数: ".$coitm."<br>";

     for ($co = 0; $co < $coitm; $co++) {
       $ico0 = $html->find("tr",3)->find("td td span.splz",0+$co+($co*5))->innertext;
       $ico1 = $html->find("tr",3)->find("td td span.splz",1+$co+($co*5))->innertext;
       $ico1 = str_replace("月", "/", $ico1);
       $ico1 = str_replace("日", " ", $ico1);
       $ico1 = str_replace("(日)", "", $ico1);
       $ico1 = str_replace("(/)", "", $ico1);
       $ico1 = str_replace("(火)", "", $ico1);
       $ico1 = str_replace("(水)", "", $ico1);
       $ico1 = str_replace("(木)", "", $ico1);
       $ico1 = str_replace("(金)", "", $ico1);
       $ico1 = str_replace("(土)", "", $ico1);
       $ico1day = str_replace(" ", "", $ico1);
       if (!strcmp($ico1day,$today)) {
         $ico2 = $html->find("tr",3)->find("td td span.splz",2+$co+($co*5))->innertext;
         $ico3 = $html->find("tr",3)->find("td td span.splz",3+$co+($co*5))->innertext;
         $ico4 = $html->find("tr",3)->find("td td span.splz",4+$co+($co*5))->innertext;
         $ico4 = str_replace("　", "", $ico4);
         $ico5 = $html->find("tr",3)->find("td td span.splz",5+$co+($co*5))->innertext;
         ${"lco".$co} = "【".$ico0."】今日 >> ".$ico2."　".$ico3."（".$ico4."　".$ico5."）"."\n";
         ${"lco".$co} = mb_convert_kana(${"lco".$co},"a","EUC-JP");
       echo ("${'lco'.$co}<br />\n");
       } else {}
     }

$lcohead = "今日、".$todaytweet."の休講情報（最新の情報は http://bit.ly/tcuyclctr で確認してください。）";
$lenth_l1 = strlen($lco0) + strlen($lco1) + strlen($lco2) + strlen($lco3) + strlen($lco4) + strlen($lco5) + strlen($lco6) + strlen($lco7) + strlen($lco8) + strlen($lco9);

 if ($lenth_l1 == 0) {
  $lco0 = "今日の休講情報はありません。（".$todaytweet."）";
  echo $lco0."<br/>\n";
 } else {
 }

$tcohead = mb_convert_encoding($lcohead, "UTF-8", "EUC-JP");
for ($co = 0; $co < $coitm; $co++) {
${"tco".$co} = mb_convert_encoding(${"lco".$co}, "UTF-8", "EUC-JP");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("0", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tcohead."\n".$tco0.$tco1.$tco2.$tco3.$tco4.$tco5.$tco6.$tco7.$tco8.$tco9.$tco10.$tco11.$tco12.$tco13.$tco14.$tco15.$tco16.$tco17.$tco18.$tco19.$tco20.$tco21.$tco22.$tco23.$tco24.$tco25.$tco26.$tco27.$tco28.$tco29.$tco30.$tco31.$tco32.$tco33.$tco34.$tco35.$tco36.$tco37.$tco38.$tco39.$tco40.$tco41.$tco42.$tco43.$tco44.$tco45.$tco46.$tco47.$tco48.$tco49.$tco50);
  }
fclose($fpctm);
?>