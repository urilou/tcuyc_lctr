<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n月j日");
  $sunday = date("w");
  $time = date("H:i");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/cancel.txt";

$citem = $html->find("body table",0)->find("tr",3)->find("table",0)->innertext;
preg_match_all("</tr>",$citem,$cnnum);
$cnitm = count($cnnum[0])-2;
echo "すべての休講データ数: ".$cnitm."<br>";

     for ($cn = 0; $cn < $cnitm; $cn++) {
       $icn0 = $html->find("tr",3)->find("td td span.splz",0+$cn+($cn*5))->innertext;
       $icn1 = $html->find("tr",3)->find("td td span.splz",1+$cn+($cn*5))->innertext;
       $icn1 = str_replace("月", "/", $icn1);
       $icn1 = str_replace("日", " ", $icn1);
       $icn1 = str_replace("(日)", "", $icn1);
       $icn1 = str_replace("(/)", "", $icn1);
       $icn1 = str_replace("(火)", "", $icn1);
       $icn1 = str_replace("(水)", "", $icn1);
       $icn1 = str_replace("(木)", "", $icn1);
       $icn1 = str_replace("(金)", "", $icn1);
       $icn1 = str_replace("(土)", "", $icn1);
       $icn1day = str_replace(" ", "", $icn1);
//今日で実行を絞る
       if (!strcmp($icn1day,$today)) {

//2限で実行を絞る
           if (!strcmp("10:35",$time)) {
               echo "2限の休講情報を取得します";
               $icn2 = $html->find("tr",3)->find("td td span.splz",2+$cn+($cn*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($icn2,"2限")) {
                   $icn3 = $html->find("tr",3)->find("td td span.splz",3+$cn+($cn*5))->innertext;
                   $icn4 = $html->find("tr",3)->find("td td span.splz",4+$cn+($cn*5))->innertext;
                   $icn4 = str_replace("　", "", $icn4);
                   $icn5 = $html->find("tr",3)->find("td td span.splz",5+$cn+($cn*5))->innertext;
                   ${"lcn".$cn} = "【".$icn0."】つぎ >> ".$icn2."　".$icn3."（".$icn4."　".$icn5."）"."\n";
                   ${"lcn".$cn} = mb_convert_kana(${"lcn".$cn},"a","EUC-JP");
                 echo ("${'lcn'.$cn}<br />\n");
               } else {}
            } else {}

//3限で実行を絞る
           if (!strcmp("12:55",$time)) {
               echo "3限の休講情報を取得します";
               $icn2 = $html->find("tr",3)->find("td td span.splz",2+$cn+($cn*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($icn2,"3限")) {
                   $icn3 = $html->find("tr",3)->find("td td span.splz",3+$cn+($cn*5))->innertext;
                   $icn4 = $html->find("tr",3)->find("td td span.splz",4+$cn+($cn*5))->innertext;
                   $icn4 = str_replace("　", "", $icn4);
                   $icn5 = $html->find("tr",3)->find("td td span.splz",5+$cn+($cn*5))->innertext;
                   ${"lcn".$cn} = "【".$icn0."】つぎ >> ".$icn2."　".$icn3."（".$icn4."　".$icn5."）"."\n";
                   ${"lcn".$cn} = mb_convert_kana(${"lcn".$cn},"a","EUC-JP");
                 echo ("${'lcn'.$cn}<br />\n");
               } else {}
            } else {}

//4限で実行を絞る
           if (!strcmp("14:40",$time)) {
               echo "4限の休講情報を取得します";
               $icn2 = $html->find("tr",3)->find("td td span.splz",2+$cn+($cn*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($icn2,"4限")) {
                   $icn3 = $html->find("tr",3)->find("td td span.splz",3+$cn+($cn*5))->innertext;
                   $icn4 = $html->find("tr",3)->find("td td span.splz",4+$cn+($cn*5))->innertext;
                   $icn4 = str_replace("　", "", $icn4);
                   $icn5 = $html->find("tr",3)->find("td td span.splz",5+$cn+($cn*5))->innertext;
                   ${"lcn".$cn} = "【".$icn0."】つぎ >> ".$icn2."　".$icn3."（".$icn4."　".$icn5."）"."\n";
                   ${"lcn".$cn} = mb_convert_kana(${"lcn".$cn},"a","EUC-JP");
                 echo ("${'lcn'.$cn}<br />\n");
               } else {}
            } else {}

//5限で実行を絞る
           if (!strcmp("16:25",$time)) {
               echo "5限の休講情報を取得します";
               $icn2 = $html->find("tr",3)->find("td td span.splz",2+$cn+($cn*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($icn2,"5限")) {
                   $icn3 = $html->find("tr",3)->find("td td span.splz",3+$cn+($cn*5))->innertext;
                   $icn4 = $html->find("tr",3)->find("td td span.splz",4+$cn+($cn*5))->innertext;
                   $icn4 = str_replace("　", "", $icn4);
                   $icn5 = $html->find("tr",3)->find("td td span.splz",5+$cn+($cn*5))->innertext;
                   ${"lcn".$cn} = "【".$icn0."】つぎ >> ".$icn2."　".$icn3."（".$icn4."　".$icn5."）"."\n";
                   ${"lcn".$cn} = mb_convert_kana(${"lcn".$cn},"a","EUC-JP");
                 echo ("${'lcn'.$cn}<br />\n");
               } else {}
            } else {}

//6限で実行を絞る
           if (!strcmp("18:10",$time)) {
               echo "6限の休講情報を取得します";
               $icn2 = $html->find("tr",3)->find("td td span.splz",2+$cn+($cn*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($icn2,"6限")) {
                   $icn3 = $html->find("tr",3)->find("td td span.splz",3+$cn+($cn*5))->innertext;
                   $icn4 = $html->find("tr",3)->find("td td span.splz",4+$cn+($cn*5))->innertext;
                   $icn4 = str_replace("　", "", $icn4);
                   $icn5 = $html->find("tr",3)->find("td td span.splz",5+$cn+($cn*5))->innertext;
                   ${"lcn".$cn} = "【".$icn0."】つぎ >> ".$icn2."　".$icn3."（".$icn4."　".$icn5."）"."\n";
                   ${"lcn".$cn} = mb_convert_kana(${"lcn".$cn},"a","EUC-JP");
                 echo ("${'lcn'.$cn}<br />\n");
               } else {}
            } else {}

       } else {}
     }

for ($cn = 0; $cn < $cnitm; $cn++) {
${"tcn".$cn} = mb_convert_encoding(${"lcn".$cn}, "UTF-8", "EUC-JP");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $tcn0.$tcn1.$tcn2.$tcn3.$tcn4.$tcn5.$tcn6.$tcn7.$tcn8.$tcn9.$tcn10.$tcn11.$tcn12.$tcn13.$tcn14.$tcn15.$tcn16.$tcn17.$tcn18.$tcn19.$tcn20.$tcn21.$tcn22.$tcn23.$tcn24.$tcn25.$tcn26.$tcn27.$tcn28.$tcn29.$tcn30.$tcn31.$tcn32.$tcn33.$tcn34.$tcn35.$tcn36.$tcn37.$tcn38.$tcn39.$tcn40.$tcn41.$tcn42.$tcn43.$tcn44.$tcn45.$tcn46.$tcn47.$tcn48.$tcn49.$tcn50);
fclose($fpctm);
?>