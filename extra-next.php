<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n月j日");
  $sunday = date("w");
  $time = date("H:i");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/extra.txt";

$extraitm = $html->find("body table",0)->find("table",3)->innertext;
preg_match_all("</tr>",$extraitm,$ennum);
$enitm = count($ennum[0])-2;
echo "すべての補講データ数: ".$enitm."<br>";

     for ($en = 0; $en < $enitm; $en++) {
       $ien0 = $html->find("body",0)->find("table",4)->find("td span.splz",0+$en+($en*5))->innertext;
       $ien1 = $html->find("body",0)->find("table",4)->find("td  span.splz",1+$en+($en*5))->innertext;
       $ien1 = str_replace("月", "/", $ien1);
       $ien1 = str_replace("日", " ", $ien1);
       $ien1 = str_replace("(日)", "", $ien1);
       $ien1 = str_replace("(/)", "", $ien1);
       $ien1 = str_replace("(火)", "", $ien1);
       $ien1 = str_replace("(水)", "", $ien1);
       $ien1 = str_replace("(木)", "", $ien1);
       $ien1 = str_replace("(金)", "", $ien1);
       $ien1 = str_replace("(土)", "", $ien1);
       $ien1day = str_replace(" ", "", $ien1);
//今日で実行を絞る
       if (!strcmp($ien1day,$today)) {

//2-限で実行を絞る
           if (!strcmp("10:30",$time)) {
               echo "2限の補講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"2-限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//2限で実行を絞る
           if (!strcmp("10:35",$time)) {
               echo "2限の補講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"2限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//3-限で実行を絞る
           if (!strcmp("12:50",$time)) {
               echo "3限の補講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"3-限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//3限で実行を絞る
           if (!strcmp("12:55",$time)) {
               echo "3限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"3限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//4-限で実行を絞る
           if (!strcmp("14:35",$time)) {
               echo "4限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"4-限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//4限で実行を絞る
           if (!strcmp("14:40",$time)) {
               echo "4限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"4限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//5-限で実行を絞る
           if (!strcmp("16:20",$time)) {
               echo "5限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"5-限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//5限で実行を絞る
           if (!strcmp("16:25",$time)) {
               echo "5限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"5限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//6-限で実行を絞る
           if (!strcmp("18:05",$time)) {
               echo "6限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"6-限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//6限で実行を絞る
           if (!strcmp("18:10",$time)) {
               echo "6限の休講情報を取得します";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //パース結果を時間で分岐
               if (!strcmp($ien2,"6限")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("　", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "【".$ien0."】つぎ >> ".$ien2."　".$ien3."（".$ien4."　".$ien5."）"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

       } else {}
     }

$tenhead = mb_convert_encoding($lenhead, "UTF-8", "EUC-JP");
for ($en = 0; $en < $enitm; $en++) {
${"ten".$en} = mb_convert_encoding(${"len".$en}, "UTF-8", "EUC-JP");
}

$fpctm = fopen($filepath, "w");
stream_set_write_buffer($fpctm,0);
  flock($fpctm, LOCK_EX);
  fwrite($fpctm, $ten0.$ten1.$ten2.$ten3.$tenyy4.$ten5.$ten6.$ten7.$ten8.$ten9.$ten10.$ten11.$ten12.$ten13.$ten14.$ten15.$ten16.$ten17.$ten18.$ten19.$ten20.$ten21.$ten22.$ten23.$ten24.$ten25.$ten26.$ten27.$ten28.$ten29.$ten30.$ten31.$ten32.$ten33.$ten34.$ten35.$ten36.$ten37.$ten38.$ten39.$ten40.$ten41.$ten42.$ten43.$ten44.$ten45.$ten46.$ten47.$ten48.$ten49.$ten50);
fclose($fpctm);
?>