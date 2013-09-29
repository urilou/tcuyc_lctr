<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n月j日");
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/extra.txt";

$extraitm = $html->find("body table",0)->find("table",3)->innertext;

preg_match_all("</tr>",$extraitm,$eonum);
$eoitm = count($eonum[0])-2;
echo "すべての補講データ数: ".$eoitm."<br>";

     for ($eo = 0; $eo < $eoitm; $eo++) {
       $ieo0 = $html->find("body",0)->find("table",4)->find("td span.splz",0+$eo+($eo*5))->innertext;
       $ieo1 = $html->find("body",0)->find("table",4)->find("td  span.splz",1+$eo+($eo*5))->innertext;
       $ieo1 = str_replace("月", "/", $ieo1);
       $ieo1 = str_replace("日", " ", $ieo1);
       $ieo1 = str_replace("(日)", "", $ieo1);
       $ieo1 = str_replace("(/)", "", $ieo1);
       $ieo1 = str_replace("(火)", "", $ieo1);
       $ieo1 = str_replace("(水)", "", $ieo1);
       $ieo1 = str_replace("(木)", "", $ieo1);
       $ieo1 = str_replace("(金)", "", $ieo1);
       $ieo1 = str_replace("(土)", "", $ieo1);
       $ieo1day = str_replace(" ", "", $ieo1);
       if (!strcmp($ieo1day,$today)) {
         $ieo2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$eo+($eo*5))->innertext;
         $ieo3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$eo+($eo*5))->innertext;
         $ieo4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$eo+($eo*5))->innertext;
         $ieo4 = str_replace("　", "", $ieo4);
         $ieo5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$eo+($eo*5))->innertext;
         ${"leo".$eo} = "【".$ieo0."】今日 >> ".$ieo2."　".$ieo3."（".$ieo4."　".$ieo5."）"."\n";
         ${"leo".$eo} = mb_convert_kana(${"leo".$eo},"a","EUC-JP");
       echo ("${'leo'.$eo}<br />\n");
       } else {}
     }

$leohead = "今日、".$todaytweet."の補講情報（最新の情報は http://bit.ly/tcuyclctr で確認してください。）";
$lenth_l1 = strlen($leo0) + strlen($leo1) + strlen($leo2) + strlen($leo3) + strlen($leo4) + strlen($leo5) + strlen($leo6) + strlen($leo7) + strlen($leo8) + strlen($leo9);

 if ($lenth_l1 == 0) {
  $leo0 = "今日の補講情報はありません。（".$todaytweet."）";
  echo $leo0."<br/>\n";
 } else {
 }

$teohead = mb_convert_encoding($leohead, "UTF-8", "EUC-JP");
for ($eo = 0; $eo < $eoitm; $eo++) {
${"teo".$eo} = mb_convert_encoding(${"leo".$eo}, "UTF-8", "EUC-JP");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("0", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $teohead."\n".$teo0.$teo1.$teo2.$teo3.$teo4.$teo5.$teo6.$teo7.$teo8.$teo9.$teo10.$teo11.$teo12.$teo13.$teo14.$teo15.$teo16.$teo17.$teo18.$teo19.$teo20.$teo21.$teo22.$teo23.$teo24.$teo25.$teo26.$teo27.$teo28.$teo29.$teo30.$teo31.$teo32.$teo33.$teo34.$teo35.$teo36.$teo37.$teo38.$teo39.$teo40.$teo41.$teo42.$teo43.$teo44.$teo45.$teo46.$teo47.$teo48.$teo49.$teo50);
  }
fclose($fpctm);
?>