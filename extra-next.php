<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://www.ipc.tcu.ac.jp/~yc/info/s_lecture.php" );
  $today = date("n/j");
  $tmrrw = date("n/j",strtotime("+1 day"));
  $todaytweet = date("n��j��");
  $sunday = date("w");
  $time = date("H:i");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/extra.txt";

$extraitm = $html->find("body table",0)->find("table",3)->innertext;
preg_match_all("</tr>",$extraitm,$ennum);
$enitm = count($ennum[0])-2;
echo "���٤Ƥ���֥ǡ�����: ".$enitm."<br>";

     for ($en = 0; $en < $enitm; $en++) {
       $ien0 = $html->find("body",0)->find("table",4)->find("td span.splz",0+$en+($en*5))->innertext;
       $ien1 = $html->find("body",0)->find("table",4)->find("td  span.splz",1+$en+($en*5))->innertext;
       $ien1 = str_replace("��", "/", $ien1);
       $ien1 = str_replace("��", " ", $ien1);
       $ien1 = str_replace("(��)", "", $ien1);
       $ien1 = str_replace("(/)", "", $ien1);
       $ien1 = str_replace("(��)", "", $ien1);
       $ien1 = str_replace("(��)", "", $ien1);
       $ien1 = str_replace("(��)", "", $ien1);
       $ien1 = str_replace("(��)", "", $ien1);
       $ien1 = str_replace("(��)", "", $ien1);
       $ien1day = str_replace(" ", "", $ien1);
//�����Ǽ¹Ԥ�ʤ�
       if (!strcmp($ien1day,$today)) {

//2-�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("10:30",$time)) {
               echo "2�¤���־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"2-��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//2�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("10:35",$time)) {
               echo "2�¤���־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"2��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//3-�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("12:50",$time)) {
               echo "3�¤���־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"3-��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//3�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("12:55",$time)) {
               echo "3�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"3��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//4-�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("14:35",$time)) {
               echo "4�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"4-��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//4�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("14:40",$time)) {
               echo "4�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"4��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//5-�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("16:20",$time)) {
               echo "5�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"5-��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//5�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("16:25",$time)) {
               echo "5�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"5��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//6-�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("18:05",$time)) {
               echo "6�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"6-��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
                   ${"len".$en} = mb_convert_kana(${"len".$en},"a","EUC-JP");
               echo ("${'len'.$en}<br />\n");
               } else {}
            } else {}

//6�¤Ǽ¹Ԥ�ʤ�
           if (!strcmp("18:10",$time)) {
               echo "6�¤εٹ־����������ޤ�";
               $ien2 = $html->find("body",0)->find("table",4)->find("td span.splz",2+$en+($en*5))->innertext;
               //�ѡ�����̤���֤�ʬ��
               if (!strcmp($ien2,"6��")) {
                   $ien3 = $html->find("body",0)->find("table",4)->find("td span.splz",3+$en+($en*5))->innertext;
                   $ien4 = $html->find("body",0)->find("table",4)->find("td span.splz",4+$en+($en*5))->innertext;
                   $ien4 = str_replace("��", "", $ien4);
                   $ien5 = $html->find("body",0)->find("table",4)->find("td span.splz",5+$en+($en*5))->innertext;
                   ${"len".$en} = "��".$ien0."�ۤĤ� >> ".$ien2."��".$ien3."��".$ien4."��".$ien5."��"."\n";
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