<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://cgi.city.yokohama.lg.jp/koutuu/kinkyu2/iframe_blue.html");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/blueline.txt";

$bluelineinfo = $html->find("div#iframe-blue",0)->find("a",0)->innertext;
echo "�u���[���C���̉^�]��: ".$bluelineinfo."<br>";

$lbi = $bluelineinfo;
$lbi = str_replace(" ", "", $lbi);
$lbi = str_replace("�u���[���C����", "", $lbi);
$lbi = str_replace("�u���[���C���@", "", $lbi);
$lbi = "�y�^�s���z�s�c�n���S�u���[���C�� >> ".$lbi;

    if ($lbi == "�y�^�s���z�s�c�n���S�u���[���C�� >> ����ʂ�^�]���Ă��܂��B") {
        $lbi = "";
    } else {}

    if ($lbi == "�y�^�s���z�s�c�n���S�u���[���C�� >> ") {
        $lbi = "";
    } else {}

$lbi = mb_convert_kana($lbi,"a","SJIS");
$lbi = mb_convert_encoding($lbi, "UTF-8", "SJIS");

$fpbli = fopen($filepath, "w");
stream_set_write_buffer($fpbli,0);
  flock($fpbli, LOCK_EX);
  fwrite($fpbli, $lbi);
fclose($fpbli);
?>