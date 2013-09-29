<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $tmrrwtweet = date("n月j日",strtotime("+1 day"));
  $sunday = date("w");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/extra.txt";

$extraitm = $html->find("body table",0)->find("table",3)->innertext;

preg_match_all("</tr>",$extraitm,$emnum);
$emitm = count($emnum[0])-2;
echo "すべての補講データ数: ".$emitm."<br>";

     for ($em = 0; $em < $emitm; $em++) {
       $iem0 = $html->find("body",0)->find("table",4)->find("td span.splz",0+$em+($em*5))->innertext;
       $iem1 = $html->find("body",0)->find("table",4)->find("td  span.splz",1+$em+($em*5))->innertext;
       $iem1 = str_replace("月", "/", $iem1);
       $iem1 = str_replace("日", " ", $iem1);
       $iem1 = str_replace("(日)", "", $iem1);
       $iem1 = str_replace("(/)", "", $iem1);
       $iem1 = str_replace("(火)", "", $iem1);
       $iem1 = str_replace("(水)", "", $iem1);
       $iem1 = str_replace("(木)", "", $iem1);
       $iem1 = str_replace("(金)", "", $iem1);
       $iem1 = str_replace("(土)", "", $iem1);
       $iem1day = str_replace(" ", "", $iem1);
       if (!strcmp($iem1day,$tmrrw)) {
         $iem2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$em+($em*5))->innertext;
         $iem3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$em+($em*5))->innertext;
         $iem4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$em+($em*5))->innertext;
         $iem4 = str_replace("　", "", $iem4);
         $iem5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$em+($em*5))->innertext;
         ${"lem".$em} = "【".$iem0."】".$iem1.$iem2."　".$iem3."（".$iem4."　".$iem5."）"."\n";
         ${"lem".$em} = mb_convert_kana(${"lem".$em},"a","EUC-JP");
       echo ("${'lem'.$em}<br />\n");
       } else {}
     }

$lemhead = "明日、".$tmrrwtweet."の補講情報（最新の情報は http://bit.ly/tcuyclctr で確認してください。）";
$lenth_l1 = strlen($lem0) + strlen($lem1) + strlen($lem2) + strlen($lem3) + strlen($lem4) + strlen($lem5) + strlen($lem6) + strlen($lem7) + strlen($lem8) + strlen($lem9);

 if ($lenth_l1 == 0) {
  $lem0 = "明日の補講情報はありません。（".$tmrrwtweet."）";
  echo $lem0."<br/>\n";
 } else {
 }

$temhead = mb_convert_encoding($lemhead, "UTF-8", "EUC-JP");
for ($em = 0; $em < $emitm; $em++) {
${"tem".$em} = mb_convert_encoding(${"lem".$em}, "UTF-8", "EUC-JP");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
 $suncheck = strpos("6", $sunday);
  if ($suncheck !== false) {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, "");
  } else {
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $temhead."\n".$tem0.$tem1.$tem2.$tem3.$tem4.$tem5.$tem6.$tem7.$tem8.$tem9.$tem10.$tem11.$tem12.$tem13.$tem14.$tem15.$tem16.$tem17.$tem18.$tem19.$tem20.$tem21.$tem22.$tem23.$tem24.$tem25.$tem26.$tem27.$tem28.$tem29.$tem30.$tem31.$tem32.$tem33.$tem34.$tem35.$tem36.$tem37.$tem38.$tem39.$tem40.$tem41.$tem42.$tem43.$tem44.$tem45.$tem46.$tem47.$tem48.$tem49.$tem50);
  }
fclose($fpctm);
?>